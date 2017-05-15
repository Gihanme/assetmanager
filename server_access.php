<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "config.php";

class dbConnect
{
    //Implement the singleton design pattern.
    private static $instance = NULL;
    
    private function __construct(){
        $this->dbh=new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        return $this->dbh;
        if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(), E_USER_ERROR);
		}
    }
    private function __clone(){}
    
    private function __wakeup(){}
    
    public static function connect(){
        if (self::$instance == NULL){
            self::$instance = new dbConnect();
        }
        return self::$instance;
    }
    
    public function getConnection(){
        return $this->dbh;
    }
}


