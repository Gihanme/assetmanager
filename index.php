<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
     include "function.php"; if (!isset($_SESSION['user_details'])){     header("location:login.php");     exit(); }
    
    if (isset($_SESSION['login_user'])){
        header("location:login.php");
    }
    else{
        
    }

?>
