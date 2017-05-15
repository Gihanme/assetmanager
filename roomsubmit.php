<?php
require_once("conection.php");

//$Division_Code = $_POST['Division_Code'];
$division = $_POST['division'];
$roomcode = $_POST['room_code'];
$roomname = $_POST['room_name'];
$roomdesc = $_POST['room_description'];
$roomfloor = $_POST['floor'];
$roomwing = $_POST['wing'];
$multi = $_POST['multiple'];

if ($multi){
    $multi_string = $_POST['multinput'];
    $multi_room = explode(',', $multi_string);
    foreach ($multi_room as $roomcode) {
        $roomcode = trim($roomcode);
        $query="INSERT INTO `assetmanager`.`room`(`Room_code`, `Room_name`, `Division`, `Description`, `Wing`, `Floor`)Values('{$roomcode}', '{$roomname}','{$division}', '{$roomdesc}', '{$roomwing}', '{$roomfloor}')";
        $result=mysqli_query($conn,$query);
        
    }
}
else{
$query="INSERT INTO `assetmanager`.`room`(`Room_code`, `Room_name`, `Division`, `Description`, `Wing`, `Floor`)Values('{$roomcode}', '{$roomname}','{$division}', '{$roomdesc}', '{$roomwing}', '{$roomfloor}')";
echo $query;
$result=mysqli_query($conn,$query);
}
if(!$result){
    echo "Failed to insert";
}
else{
    echo "pass";
}

mysqli_close($conn);
header("location:createRoom.php");
exit();
?>