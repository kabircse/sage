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

// user controller resources
$router->map('GET','/user/index', 'UserController@index');
$router->map('GET','/user/create', 'UserController@create');
$router->map('POST','/user/save', 'UserController@store');
$router->map('GET','/user/edit/[i:id]', 'UserController@edit');
$router->map('PATCH|PUT|POST','/user/update/[i:id]', 'UserController@update');
$router->map('DELETE|POST','/user/delete/[i:id]', 'UserController@destroy');

