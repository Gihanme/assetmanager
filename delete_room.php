<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "function.php";

$delete = $_GET['id'];

$log = new FAssetClerk();

$log->remove_room($delete);

header("location:roomdetails.php");

exit();

?>