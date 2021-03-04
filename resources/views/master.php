<?php
//include_once(View . '/errors/form-validation.php');
require_once('template/header.php');
require_once('template/sidebar.php');
if(isset($content) && is_readable(View.$content.'.php')){
    // for displaying form validation error and form values
    $errors = $errors ?? session('errors');
    $inputs = $inputs ?? session('inputs');

    require_once($content.'.php');
}
else{
    echo $content.'.php not found';//require('welcome.php');
    exit;
}
require_once('template/footer.php');
