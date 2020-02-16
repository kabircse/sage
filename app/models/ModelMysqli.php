<?php

namespace App\Models;
    
class ModelMysqli {
    public $result;
    protected $mysqli;
    public function __construct() {
        $this->mysqli = new \mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if(mysqli_connect_errno()){
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
    }
    public function query($sql){
    $this->result = $this->mysqli->query($sql);
    return $this;
  }
    public function rows(){
    return $this->result->fetch_object();
  }
    public function rowsArray(){
    return $this->result->fetch_array(MYSQLI_NUM);
  }
    public function result(){
    $result = [];
    while($row = $this->rows()){
      $result[] = $row;
    }
    return $result;
  }
    public function resultArray(){
    $result = [];
    while($row = $this->rowsArray()){
      $result[] = $row;
    }
    return $result;
  }
    public function status(){
    return $this->mysqli->affected_rows;
  }
}