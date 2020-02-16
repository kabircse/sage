<?php

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */

define('ENVIRONMENT','development');

if(ENVIRONMENT=='development' || ENVIRONMENT=='dev') {
    error_reporting(E_ALL);
    ini_set('display_errors',1);
}

//session file path
ini_set('session.save_path', Root.'storage/sessions');

// Error logging engine
ini_set('log_errors', TRUE);
// Logging file path
ini_set('error_log', Root.'storage/logs/'.date('d-m-Y').'.log');
//Return the last error that occurred
error_get_last();

// set your default time-zone
date_default_timezone_set('Asia/Dhaka');

//session generating
if(!isset($_SESSION)) {
    session_start();
}

$csrf_length = 32;
