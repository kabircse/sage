<?php
namespace App\Models;

class User extends Model {
     public $_table = 'users';
     protected $primary = "id";
     protected $pdo;
     public function __construct()
     {
        parent::__construct();
        //$this->primary[$this->_table] = 'id';
        //$this->setPrimary($this->_table,'id');
     }
	//private static $instances = [];
	//protected function __construct() { }
}
