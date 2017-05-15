<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$extarray = array("jpeg", "jpg", "png", "gif");

$filepath = 'test_images';
if (!file_exists($filepath)){
    mkdir($filepath);
}

if (!empty($_FILES)){
    echo "Files found";
    foreach ($_FILES['photo']['tmp_name'] as $key=>$tmp_name){
        $photo_name = $_FILES['photo']['name'][$key];
        $photo = $_FILES['photo']['tmp_name'][$key];
        $target = $filepath."/".$photo_name;
        echo $target;
        
        move_uploaded_file($_FILES['photo']['tmp_name'][$key], $target);
        
    }
}

?>

<html>
    <body>
        <form name="upload" method="post" action="" enctype="multipart/form-data">
            <input type="file" accept="image/*" name="photo[]" multiple/><br>
            <input type="submit">
        </form>
    </body>
</html>