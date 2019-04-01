<?php
ob_start(); // Turn on output buffering

// Assign file paths to the PHP constants
// __FILE__ returns the path of current file
// dirname() returns the path to the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("SHARED_PATH", PRIVATE_PATH . "/shared");
define("PUBLIC_PATH", PROJECT_PATH . "/public");

// Assign the root URL to a PHP constant
// * Do not need to include the domain
// * Use same document root as webserver
// * Can set a hardcoded value:
// define("WWW_ROOT", '');
// * Can dynamically find everything in URL up to "/public"
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define('WWW_ROOT', $doc_root);

require_once "functions.php";
require_once('status_error_functions.php');
require_once "db_credentials.php";
require_once "database_functions.php";
require_once "validation_functions.php";

// Load all the classes in a directory
foreach (glob('classes/*.class.php') as $file) {
    require_once $file;
}

// Autoload class definition
function my_autoload($class){
    if(preg_match('/\A\w+\Z/', $class)){
        include "classes/" . $class . ".class.php";
    }
}

spl_autoload_register('my_autoload');

$database = db_connect();
DatabaseObject::set_database($database);

$session = new Session();
?>