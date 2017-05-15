<?php
/**
 * Created by PhpStorm.
 * User: Surangi
 * Date: 6/19/2016
 * Time: 2:15 AM
 */
require_once ("conection.php");
//mysql_select_db("asm",$conn);

$userID=$_GET["user_id"];

$query="DELETE FROM user WHERE user_id='$userID'";
mysqli_query($conn, $query);
if(!$query){
    echo "Failed to delete";
}
else{
    header('location:userDetails.php');
}

mysqli_close($conn);
?>
