<?php

/** Configuration Variables **/

define ('DEVELOPMENT_ENVIRONMENT',true);

define('DB_NAME', 'sleas_db');
define('DB_USER', 'devuser');
define('DB_PASSWORD', 'devpass');
define('DB_HOST', 'db');


//JWT Variables
define('IIS', $_SERVER['REMOTE_ADDR']);
define('AUD', $_SERVER['HTTP_HOST']);
