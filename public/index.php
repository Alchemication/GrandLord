<?php

// =========================================
// Front controller,
// all requests need to go through this file
// =========================================

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

require_once ROOT . DS . 'application' . DS . 'config' . DS . 'config.php';
require_once ROOT . DS . 'library' . DS . 'bootstrap.php';

// get the URL
$urlArray   = explode("/", isset($_GET['path']) ? $_GET['path'] : '');

// figure out default controller and action
$defaultController = stristr(DEFAULT_CONTROLLER, 'controller') ? DEFAULT_CONTROLLER : DEFAULT_CONTROLLER . 'Controller';
$defaultAction     = stristr(DEFAULT_ACTION, 'action') ? DEFAULT_ACTION : DEFAULT_ACTION . 'Action';

// figure out the controller to use
if (!isset($urlArray[0]) || $urlArray[0] === '') {
    sendResponse($defaultController, $defaultAction);
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
    sendResponse($defaultController, $defaultAction);
}

// now figure out the action
$action = isset($urlArray[1]) ? $urlArray[1] . 'Action' : DEFAULT_ACTION;

// if method doesn't exist - send to defaults again
if (!method_exists($controller, $action)) {
    sendResponse($defaultController, $defaultAction);
}

// now we are all good to go
sendResponse($controller, $action);

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
