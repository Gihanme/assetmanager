<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "function.php";


$type = $_POST['asset_type_name'];
$desc = $_POST['asset_type_description'];

$log = new FAssetClerk();

$log->add_asset_type($type, $desc);

header("location:assettypedetails.php");
exit();