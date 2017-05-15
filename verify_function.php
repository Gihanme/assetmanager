<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 include "function.php"; if (!isset($_SESSION['user_details'])){     header("location:login.php");     exit(); }
$user_details = $_SESSION['user_details']; 
$u_ID = $user_details['user_ID'];
if (isset($_GET['id'])){
    $asset_id = $_GET['id'];
    $log = new FAssetClerk();
    
    $log->verify_asset($asset_id, "yes", $u_ID );
    header("location:verify_asset.php");
}
