<?php

class DB {

    public $connect;
    public $host = '127.0.0.1';
    public $user = 'root';
    public $pass = '';
    public $db = 'crud';

     public function __construct()

     {
        $this->connect = new mysqli($this->host,$this->user,$this->pass,$this->db);
     }
   

     public function getConnect(){

         if($this->connect->connect_error){
             die('Connection failed: ' .$this->connect->connect_error);
          
         }else return $this->connect;
     }
      




}
