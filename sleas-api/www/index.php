<?php	

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)). DS .'html'. DS );

$url = $_GET['url'];

require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');
