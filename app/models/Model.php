<?php

namespace App\Models;

use Vendor\LessQL\Database;

class Model extends Database {

    protected $pdo;
    public static $pdo_instance;
    public function __construct() {
        $db = require App.'config/database.php';
        $dsn = $db['DB_TYPE'].':dbname='.$db['DB_NAME'].'; host='.$db['DB_HOST'].'; charset='.$db['DB_CHARSET'];
        try {
            if (!isset(self::$pdo_instance)) {
                self::$pdo_instance = new \PDO($dsn, $db['DB_USER'], $db['DB_PASS'], $db['DB_PERSISTENT']);
            }
            $this->pdo = self::$pdo_instance;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
            exit("Error:".$e->getMessage(). ". Code:".$e->getCode());
        }
    }
}