<?php
session_start();
// =========================================
// Front controller,
// all requests need to go through this file
// =========================================

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

require_once ROOT . DS . 'application' . DS . 'config' . DS . 'config.php';
require_once ROOT . DS . 'library' . DS . 'bootstrap.php';

// get the URL
$urlArray = explode("/", isset($_GET['path']) ? $_GET['path'] : '');
unset($_GET['path']);

// figure out the controller to use
if (!isset($urlArray[0]) || $urlArray[0] === '') {
    redirect(NOT_FOUND_DEFAULT_ROUTE);
} else {
    // here we need to replace something like:
    // veggie-sandwich into VeggieSandwichController
    $controller  = strtolower($urlArray[0]); // replace to all lower case
    $controller  = str_replace('-', ' ', $controller); // replace all '-'s into spaces
    $controller  = ucwords($controller); // make first char all words upper case
    $controller  = str_replace(' ', '', $controller); // remove all spaces now
    $controller .= 'Controller'; // add Controller to it
}

// now if class doesn't exist - use the defaults again
if (!class_exists($controller)) {
    redirect(NOT_FOUND_DEFAULT_ROUTE);
}

// now figure out the action
$action  = isset($urlArray[1]) ? $urlArray[1] : 'index';
$action .= 'Action';

// if method doesn't exist - send to defaults again
if (!method_exists($controller, $action)) {
    redirect(NOT_FOUND_DEFAULT_ROUTE);
}

// now we are all good to go
sendResponse($controller, $action);

/**
 * @param string $location
 */
function redirect($location)
{
    $hs = headers_sent();

    if (!$hs) {
        header("301 Moved Permanently HTTP/1.1", true, 301);
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header("Location:" . BASE_URL . "/$location");
    }

    die();
}

/**
 * @param string $controller
 * @param string $action
 */
function sendResponse($controller, $action)
{
    $controller = new $controller();
    $controller->$action();
    exit();
}
