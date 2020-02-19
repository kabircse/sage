<?php
//include_once(View . '/errors/form-validation.php');
require_once('template/header.php');
require_once('template/sidebar.php');
if(isset($page) && is_readable(View.$page.'.php')){
   require_once($page.'.php');
}
else{
  echo $page.'.php not found';//require('welcome.php');
  exit;
}
require_once('template/footer.php');
