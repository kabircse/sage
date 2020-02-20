<?php
namespace Vendor;

/**
 * Application class for startup the cms and load related classes
 * @package Vendor
 */
class Application {
    /**
     * Related controller class name
     * @var ClassName $controller
     */
    private $controller;

    /**
     * Related method name
     * @var MethodName $action
     */
    private $action;

    /**
     * Related parameter
     * @var array $url_params
     */
    private $url_params = [];

    /**
     * @var AltoRouter\AltoRouter
     */
    public $router;

    /**
     * Application constructor.
     * @param $base_path
     */
    public function __construct($base_path) {
        $this->router = new AltoRouter\AltoRouter();
        $this->router->setBasePath($base_path);
        @require_once 'routes/web.php';
    }

    /**
     *  Load the related classes for run the application
     */
    public function run() {
        $match = $this->router->match();
        if( is_array($match)) { // && is_callable( $match['target'] ) ) {
            // Load vendor after route confirmation
            @require App . 'config/config.php';
            @require_once App . 'config/database.php';

            // Get controller and action from router url
            list( $this->controller, $this->action ) = explode( '@', $match['target'] );
            //App\Controllers\DemoController;
            $this->controller = "App\Controllers".'\\'.$this->controller;
            $this->controller = new $this->controller();
            if(method_exists($this->controller,$this->action)) {
                if(!empty($match['params'])){
                    call_user_func_array([$this->controller,$this->action],$match['params']);
                }
                else {
                    $this->controller->{$this->action}();
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
    }
}
