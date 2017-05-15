<?php
require_once("conection.php");

$Division_Code = $_POST['Division_Code'];
$Division_Name = $_POST['Division_Name'];
$Description = $_POST['Description'];

//mysql_select_db("asm",$conn);

$query="INSERT INTO `assetmanager`.`division`(`Division_Code`, `Division_Name`, `Description`)Values('{$Division_Code}', '{$Division_Name}', '{$Description}')";
$result=mysqli_query($conn,$query);

if(!$result){
    echo "Faild to insert";
}
else{
    header('location:divisionDetails.php');
}

mysqli_close($conn);
?>
