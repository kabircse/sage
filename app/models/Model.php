<?php

namespace App\Models;

use LessQL\Database;

class Model extends Database {
    //protected $db;
    protected $pdo;
    public function __construct() {
        $dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST;
        try {
            $this->pdo = new \PDO($dsn,DB_USER,DB_PASS);
            parent::__construct($this->pdo);
        } catch (\PDOException $e) {
            //throw new \PDOException($e->getMessage(), (int)$e->getCode());
            exit("Error:".$e->getMessage(). ". Code:".$e->getCode());
        }
    }
    /*public function fill() {
        return $this->fillable;
    }*/
}