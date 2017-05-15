<?php
require_once ("conection.php");
//mysql_select_db("asm",$conn);

$Division_Code=$_GET["Division_Code"];

$query="DELETE FROM division WHERE Division_Code='$Division_Code'";
mysqli_query($conn, $query);
if(!$query){
    echo "Failed to delete";
}
else{
    header('location:divisionDetails.php');
}

mysqli_close($conn);
?>
