<?php
    $router = new AltoRouter();
    $router->setBasePath($base_path);
    @require_once 'routes/web.php';
    
    $match = $router->match();
    if( is_array($match)) { // && is_callable( $match['target'] ) ) {
        // Load vendor after route confirmation
        @require App . 'config/config.php';
        @require_once App . 'config/database.php';

        // Get controller and action from router url
        list( $controller, $action ) = explode( '@', $match['target'] );
        //App\Controllers\DemoController;
        $controller = "App\Controllers".'\\'.$controller;
        $controller = new $controller();
        if(method_exists($controller,$action)) {
            if(!empty($match['params'])){
                call_user_func_array([$controller,$action],$match['params']);
            }
            else {
                $controller->{$action}();
            }
            exit();
        }
    }

    // no route was matched or method missing
    $errors = [
    //'title' => 'URL not found.',
    //'message' => 'Please go back and try again.'
    ];
    return view('errors/404',$errors,false);