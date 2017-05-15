<?php
require_once 'conection.php';

//Delete function
echo 'hello';
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    //echo "delete from itemcategory where itemid='$id'";
    $query1=mysqli_query($conn, "delete from asset_type where asset_type_id='$id'");
     echo '$query1'; 
    if($query1)
        echo 'Successfully Removed'; 
            {
           header('location:assettypedetails.php');
        }
}

?>