<?php
    
namespace App\Controllers;
use LessQL\Database;
class Controller {
    //public $input;
    public function __construct() {
        if (!auth()) {
            redirect('auth/login');
        }
        $this->verifyCSRFToken();
    }
    
    private function verifyCSRFToken()
    {
        //dd($_REQUEST);
        if(isset($_REQUEST['token'])) {
            if($_REQUEST['token'] != session('token') ) {
                show_error("The page has expired, due to inactivity.");
            }
        }
    }

    public function setJson($data){
        return json_encode($data);
    }
}
