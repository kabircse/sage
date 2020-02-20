<?php
/**
 * HL-HR - A Sage PHP Framework
 *
 * @package  HL-HR
 */

/**
 * Define required directory names and url for this application
 */

define('Root',__DIR__.DIRECTORY_SEPARATOR);
define('App',Root.'app'.DIRECTORY_SEPARATOR);
define('View',Root.'resources/views'.DIRECTORY_SEPARATOR);
define('UploadPath',Root.'public/assets/uploads'.DIRECTORY_SEPARATOR);

define('Host',$_SERVER['HTTP_HOST']); //.DIRECTORY_SEPARATOR
$url_sub_folder = str_replace('public','',dirname($_SERVER['SCRIPT_NAME']));
// /HL-HR/pulic to /HL-HR
define('URL','//'.Host.$url_sub_folder.'/');
define('PublicURL',URL.'public'.DIRECTORY_SEPARATOR);
define('AssetURL',PublicURL.'assets'.DIRECTORY_SEPARATOR);

/**
 * Autoload class
 */
require_once Root.'vendor/autoload.php';

/** @var Base URL $base_path */
$base_path = $url_sub_folder; //'/HL-HR' fixed;

/** @var Application $app */
@require ('app.php');