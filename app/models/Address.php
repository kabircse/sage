<?php

namespace App\Models;

class Address extends Model {
     public $_table = 'address_book';
     protected $primary = "tst_id";
     protected $pdo;
     public function __construct()
     {
        parent::__construct();
        //$this->primary[$_table] = 'tst_id';
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