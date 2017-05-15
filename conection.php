<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assetmanager";

//Create connection
    $conn = mysqli_connect($servername,$username,$password,$dbname);
   // $conn=mysqli_connect($hostname,$username,$password,$db)

//Chech connections
if(!$conn){
    die("Connection failed: " . mysqli_error());
}

?>
