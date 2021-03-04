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
            @require_once App.'config/config.php';
            //@require_once App.'config/database.php';

            // Get controller and action from router url
            list( $this->controller, $this->action ) = explode( '@', $match['target'] );
            //App\Controllers\BookController;
            $this->controller = "App\Controllers".'\\'.$this->controller;
            $this->controller = new $this->controller();
            //myLog(json_encode($this->controller));
			$this->url_params = $match['params'];
            if(method_exists($this->controller,$this->action)) {
                if(!empty($this->url_params)){
                    call_user_func_array([$this->controller,$this->action],$this->url_params);
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
