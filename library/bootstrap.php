<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 07/02/15
 * Time: 21:13
 */

// ================================
// Autoload un-found classes
// ================================

spl_autoload_register(function ($className) {
    if (file_exists(ROOT . DS . 'library' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'library' . DS . $className . '.php');
    } else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . $className . '.php');
    } else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'application' . DS . 'models' . DS . $className . '.php');
    }
});

// =====================================
// Autoload vendors (3rd party libraries
// =====================================

require_once(ROOT . DS . 'vendor/autoload.php');

// ================================
// Global helper functions
// ================================

/**
 * Escape value before dumping on the screen,
 * this prevents XSS attacks.
 * @see http://www.sitepoint.com/php-security-cross-site-scripting-attacks-xss/
 * @param string $string
 */
function escape($string)
{
    echo htmlspecialchars($string, ENT_QUOTES, 'utf-8');
}

// ================================
// Error displaying section
// ================================

if (DEVELOPMENT_ENVIRONMENT == true) {
    error_reporting(E_ALL);
    ini_set('display_errors','On');
} else {
    error_reporting(E_ALL);
    ini_set('display_errors','Off');
    ini_set('log_errors', 'On');
    ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
}
