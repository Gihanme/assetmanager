<?php
/**
 * Created by PhpStorm.
 * User: Surangi
 * Date: 6/19/2016
 * Time: 12:56 AM
 */

require_once ("conection.php");

$email=$_POST['email'];
$pass=$_POST['password'];
$userType=$_POST['user_type'];
$division=$_POST['user_division'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$gender=$_POST['gender'];
$contacts=$_POST['contact'];
$hash_pass = password_hash($pass, PASSWORD_BCRYPT);

$sql="INSERT INTO `user`(`user_email`, `user_password`, `first_name`, `last_name`, `user_level`, `division`, `gender`, `Contact_Number`)
        VALUES ('{$email}', '{$hash_pass}', '{$first_name}', '{$last_name}', '{$userType}', '{$division}', '{$gender}', '{$contacts}')";

$result=mysqli_query($conn,$sql);

if(!$result){
    echo "Failed to insert";
}
else{
    header('location:createuser.php');
}

mysqli_close($conn);
?>