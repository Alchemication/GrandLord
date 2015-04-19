<?php

// =======================
// Configure app.
// =======================

// change for displaying errors on/off
define('DEVELOPMENT_ENVIRONMENT', true);

// change if your default url is NOT localhost/grandlord
define('BASE_URL', 'http://localhost/grandlord');

// change if you would like to use separate 404 page
define('NOT_FOUND_DEFAULT_ROUTE', 'home/index');

// change db params
define('DB_NAME', 'grandlord');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', '127.0.0.1');

// add app global constants here
define('MYSQL_DATE_TIME_FORMAT', 'Y-m-d H:i:s');
define('MYSQL_DATE_FORMAT', 'Y-m-d');
define('MYSQL_TIME_FORMAT', 'H:i:s');

// highly recommended to set to true,
// global input sanitizing method
define('GLOBAL_XSS_PROTECTION', true);
