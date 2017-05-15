<?php
require_once 'conection.php';

//Delete function
echo 'hello';
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    //echo "delete from itemcategory where itemid='$id'";
    $query1=mysqli_query($conn, "delete from asset_category where  asset_category_id='$id'");
     echo '$query1'; 
    if($query1) 
            {
           header('location:itemcategorydetails.php');
        }
}

?>