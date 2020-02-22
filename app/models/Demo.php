<?php

namespace App\Models;

class Demo extends Model {
     protected $_table = 'demo_book';
     public function __construct()
     {
        parent::__construct();

        // when id is not primary key then define another column as primary key
        //$this->primary[$this->_table] = 'your_primary_key_column';
     }
     public function get_by_pdo_query() {  //good without param
         return $this->pdo->query("SELECT * FROM address_book");
     }
     public function get_by_pdo_prepare($param) { //good with param
         $rs = $this->pdo->prepare("SELECT * FROM address_book where id= ?");
         $rs->execute($param);
         return $rs->fetchAll();
     }
}