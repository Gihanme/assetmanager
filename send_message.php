<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "./function.php";




$log = new FAssetClerk();

$user_details = $_SESSION['user_details']; $level = $log->retrieve_user_level_name($user_details['user_level']);
$first_name = $user_details['first_name'];
$last_name = $user_details['last_name'];
$division = $user_details['division'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $send_division = $_POST['division'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    
    
    $log->send_mail($division, $send_division, $title, $message);
    
    header("location:outbox.php");
    exit();
}