<?php
   if(isset($_POST['get_option']))
   {

     $host = 'localhost';
     $user = 'root';
     $pass = '';
           
     mysql_connect($host, $user, $pass);

     mysql_select_db('assetmanager');
      

     $state = $_POST['get_option'];
     $find=mysql_query("select Room_code,Room_name from room where Division='$state'");
     while($row=mysql_fetch_array($find))
     {
       echo "<option value='".$row['Room_code']."'>".$row['Room_name']."</option>";
     }
   
     exit;
   }

?>