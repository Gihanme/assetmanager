<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 include "function.php"; if (!isset($_SESSION['user_details'])){     header("location:login.php");     exit(); }

if (isset($_GET['id'])){
    $asset_id = $_GET['id'];
    $log = new FAssetClerk();
    echo  $_SESSION['user_details']['user_ID'];
    $log->confirm_asset($asset_id);
    
}

header("Location:confirm_asset.php");