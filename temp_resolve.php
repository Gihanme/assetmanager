<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'function.php';

$log= new FAssetClerk();
$temp = $_GET['temp'];
$real = $_GET['real'];

$log->resolve_temp_asset($temp, $real);

header("location:temp_asset.php");
exit();
