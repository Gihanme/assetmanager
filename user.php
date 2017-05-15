<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "server_access.php";
session_start();

class User{
    
    private $db = NULL;
    function __construct(){
        $this->db = dbConnect::connect();
    }
    
    function login($email, $password){
        $que = "SELECT * FROM user WHERE user_email='$email'";
        $res= $this->db->dbh->query($que);
        $data = $res->fetch_assoc();
        $hash = $data['user_password'];
        $verify = password_verify($password, $hash);
        if ($verify){
            $details = array('user_ID'=>$data['user_ID'],'email'=>$data['user_email'], 'first_name'=>$data['first_name'], 'last_name'=>$data['last_name'], 'user_level'=>$data['user_level'] ,'division'=>$data['division']);
            $_SESSION['login'] = TRUE;
            $_SESSION['user_details']= $details;
            $_SESSION['login_try'] = 0;
            return TRUE;
        }
        else{
            if (!isset($_SESSION['login_try'])){
                $_SESSION['login_try'] = 1;
            }
            else{
                $_SESSION['login_try'] += 1;
            }
            return FALSE;
        }
    }
    
    
    
    function logout(){
        session_destroy();
        header("Location:login.php");
    }
    
    
    function create_user($email, $password, $usertype, $division, $first_name, $last_name, $gender, $contact){
        $hash_pass = password_hash($password, PASSWORD_BCRYPT);
        $que= "INSERT INTO user(user_email, user_password, first_name, last_name, user_level, division, gender, Contact_Number) VALUES "
                . "('$email', '$hash_pass',  '$first_name', '$last_name','$usertype', '$division', '$gender', '$contact')";
        echo $que;
        $this->db->dbh->query($que);
    }   
    
    function update_user(){
        
    }
    
}

?>