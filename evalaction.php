<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$asset_id = $_POST['id'];
$val = $_POST['newval'];
$deprec = $_POST['depre'];

include "function.php";

$log = new FAssetClerk();

$log->update_value($asset_id, $val, $deprec);

header("location:re_evaluate.php");
exit();