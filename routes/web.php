<?php
$router = $this->router;

// Demo controller resources
$router->map('GET','/', 'DemoController@index');
$router->map('GET','/demo/demo-code', 'DemoController@demo');
$router->map('GET','/demo', 'DemoController@index');
$router->map('GET','/demo/add', 'DemoController@create');
$router->map('GET','/demo/edit/[i:id]', 'DemoController@edit');
$router->map('GET','/demo/show/[i:id]', 'DemoController@show');
$router->map('PATCH|PUT|POST','/demo/update/[i:id]', 'DemoController@update');
$router->map('POST','/demo/save', 'DemoController@store');
$router->map('DELETE|POST','/demo/delete/[i:id]', 'DemoController@destroy');
$router->map('GET','/demo/status/[i:id]/[a:type]', 'DemoController@status');

