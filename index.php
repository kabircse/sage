<?php
/**
 * HL-HR - A Sage PHP Framework
 *
 * @package  HL-HR
 */
define('SAGE_START', microtime(true));

/**
 * Define required directory names and url for this application
 */

define('Root',__DIR__.DIRECTORY_SEPARATOR);
define('App',Root.'app'.DIRECTORY_SEPARATOR);
define('View',Root.'resources/views'.DIRECTORY_SEPARATOR);
define('UploadPath',Root.'public/assets/uploads'.DIRECTORY_SEPARATOR);

define('Host',$_SERVER['HTTP_HOST']); //.DIRECTORY_SEPARATOR
$url_sub_folder = str_replace('public','',dirname($_SERVER['SCRIPT_NAME']));
// /ProjectFolder/public to /ProjectFolder
define('URL','//'.Host.$url_sub_folder.'/');
define('PublicURL',URL.'public'.DIRECTORY_SEPARATOR);
define('AssetURL',PublicURL.'assets'.DIRECTORY_SEPARATOR);

/**
 * Autoload classes using composer for first time
 */
require_once Root.'vendor/autoload.php';

/** @var Base URL $base_path */
$base_path = $url_sub_folder; //'/ProjectFolder' fixed;

//Load the classes by it's name, when composer not run
/*spl_autoload_register(function ($class_name) {
    include_once $class_name . '.php';
});
// When composer not run then manually load the helpers
include_once 'app/helpers/functions.php';
*/

// turn on buffering
ob_start();

/** @var Application $app */
$app = new Vendor\Application($base_path);
$app->run();

// send output buffer and turn off output buffering
ob_end_flush();