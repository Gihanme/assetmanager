<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "server_access.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class dbAsset{
    
    function __construct(){}
    
    public function create(){}
    
}


class FAssetClerk{
    private $db = NULL;
    function __construct(){
        $this->db = dbConnect::connect();
    }
    
    function query($query){
        return $this->db->dbh->query($query);
        
    }
    /**This is function for adding assets.  */
    
    function add_asset($item_name, $item_type, $item_category, $vendor, $vendor_add, $p_date, $w_end, $serial_no, $value, $model, $brand, $barcode_no, $division, $room, $deprec = 0.2){
        
        $que1 = "INSERT INTO asset(Asset_Name, Asset_type, Asset_Category, Model_No, Brand, Serial_No, Purchase_Date, Warranty_End, Price,Original_Value, Current_Value, Depreciation, Vendor, Vendor_Address,  Current_Division, Current_Room,Barcode_No) "
                . "VALUES ('$item_name','$item_type', '$item_category', '$model', '$brand', '$serial_no', '$p_date', '$w_end',$value ,$value ,$value , $deprec, '$vendor','$vendor_add', '$division','$room' ,'$barcode_no'); ";
        //try{
            $res = $this->db->dbh->query($que1);
            
            return $res;
        //}
        //catch(Exception $e){
            //$this->db->dbh->rollback();
            
            
        //}

    }

    function change_asset($array){
        $id=$array['id'];
        $name=$array['name'];
        $type=$array['type'];
        $category=$array['category'];
        $model_no=$array['model'];
        $brand=$array['brand'];
        $serial=$array['serial'];

        $date=$array['warranty'];

        $purchase_array=explode('-',$array['warranty']);
        $purchase_date=$purchase_array[0]."-".$purchase_array[1]."-".$purchase_array[2];
        $warranty_date=$purchase_array[3]."-".$purchase_array[4]."-".$purchase_array[5];


        $price=$array['price'];
        $original_value=$array['price'];
        $current_value=$array['price'];
        $depreciation=$array['deprec'];
        $vendor=$array['vendor'];
        $vendor_address=$array['vendor_add'];
        $current_division=$array['division'];
        $current_room=$array['room'];
        $barcode_no=$array['barcode'];



        $que = "UPDATE asset SET Asset_Name='$name', Asset_type='$type', Asset_Category='$category', Model_No='$model_no', Brand='$brand', Serial_No='$serial', Purchase_Date='$purchase_date', Warranty_End='$warranty_date', Price='$price',Original_Value='$original_value', Current_Value='$current_value', Depreciation='$depreciation', Vendor='$vendor', Vendor_Address='$vendor_address',  Current_Division='$current_division', Current_Room='$current_room',Barcode_No='$barcode_no' WHERE Asset_ID='$id'";

        $res = $this->db->dbh->query($que);
        return $res;
    }
    

    function approve_asset($asset_id, $approve, $user){
        $que1 = "SELECT * FROM asset WHERE Asset_ID='$asset_id'";
        $que2 = "UPDATE asset SET Asset_approved=$approve WHERE Asset_ID='$asset_id'";

        $res1= $this->db->dbh->query($que1);
        $res2 = $this->db->dbh->query($que2);
        if ($approve == 1){
            $array = $res1->fetch_assoc();
            $division= $array['Current_Division'];
            $room = $array['Current_Room'];

            $que3 = "INSERT INTO asset_movement (asset_id, old_division, old_room, new_division, new_room, move_date, moved_by) VALUES ('$asset_id', '+','+', '$division', '$room','".date("Y-m-d H:i:s")."', '$user')";
            //echo $que3;
            $resx = $this->db->dbh->query($que3);
        }
        else{
            if ($approve==0){
                
            }
            else{
                
            }
        }

    }
	function confirm_asset($asset_id) {
        $query = "UPDATE asset SET confirmed=1 WHERE Asset_ID=" . $asset_id . ";";
        $res = $this->db->dbh->query($query);
    }
	 function deny_asset($asset_id, $message) {
        $query = "UPDATE asset SET deny=1, deny_message='" . $message . "' WHERE Asset_ID='" . $asset_id . "';";
        echo $query;
        $res = $this->db->dbh->query($query);
    }


    function verify_asset($asset_id, $verify, $verify_user){
        /** $verify shound be denopted as yes or no */
        
        $que1 = "SELECT * FROM asset WHERE Asset_ID=$asset_id";
        echo $que1;
        $res1 = $this->db->dbh->query($que1);
        if ($res1->num_rows == 1){
            if ($verify=='yes'){
                $date = date('Y-m-d H:i:s');
                
                $que = "UPDATE asset_movement SET verified=1, verify_date='".$date."', approved_by='$verify_user' WHERE asset_id='$asset_id' AND verified IS NULL" ;
                
                $res = $this->db->dbh->query($que);
                $que2 = "SELECT * FROM asset_movement WHERE asset_id='$asset_id' ORDER BY YEAR(move_date) DESC, MONTH(move_date) DESC, DAY(move_date) DESC , HOUR(move_date) DESC,  MINUTE(move_date) DESC,  SECOND(move_date) DESC";
                $res2 = $this->db->dbh->query($que2);
                $data = $res2->fetch_assoc();
                $div = $data['new_division'];
                $room=$data['new_room'];
                $code = "UCSC/$div/$room/$asset_id";
                $que3 = "UPDATE asset SET Asset_Code = '$code', Current_Division='$div', Current_Room='$room' WHERE Asset_ID='$asset_id'";
                echo $que3;
                $res3 = $this->db->dbh->query($que3);
            }
            else{
                $que = "UPDATE asset_movement SET verified=-1 WHERE asset_id='$asset_id' AND verified IS NULL";
                $res= $this->db->dbh->query($que);
            }
            
        }

    }

    function retrieve_assets($div="", $valid="yes", $removed="no"){
        $append = array();
        if ($div!= ""){
            array_push($append, "Current_Division = '$div'");
            
        }
        
        if ($valid=="yes"){
            array_push($append, "Asset_approved = 1");
            
            
        }
        else{
            if ($valid == "no"){
                array_push($append, "Asset_approved = 0");
            }
            else{
               
            }
        }

        if ($removed=="yes"){
            array_push($append, "Asset_available = 0");
            
        }
        else{
            array_push($append, "Asset_available = 1");
        }
        
        $appix = implode(' AND ', $append);
        
        $que="SELECT * FROM asset WHERE $appix AND confirmed=1;" ;
        $res = $this->db->dbh->query($que);

        return $res;
    }

    function retrieve_deniedAssets(){
        $que="SELECT * FROM asset WHERE deny=1 AND confirmed=0;" ;
        $res = $this->db->dbh->query($que);

        return $res;
    }
	
	function getUnconfirmed() {
        $query = "SELECT * FROM asset WHERE confirmed='0' AND deny=0;";
        //$query = "SELECT * FROM asset WHERE asset_approved='0';";
        $res = $this->db->dbh->query($query);
        return $res;
    }
    
    function refresh_assets(){
        
        $query = "SELECT Asset_ID, Current_Division, Current_Room FROM asset WHERE Asset_Code IS NULL AND Asset_available=1 AND Asset_approved=1 ";
        $res = $this->db->dbh->query($query);
        while ($row = $res->fetch_assoc()){
            $id = $row['Asset_ID'];
            $div = $row['Current_Division'];
            $room = $row['Current_Room'];
            
            $code = "UCSC/$div/$room/$id";
            
            $rep_que = "UPDATE asset SET Asset_Code='$code' WHERE Asset_ID='$id'";
            $this->db->dbh->query($rep_que);
            
        }
    }

    function view_asset($asset_id){

        return $this->db->dbh->query("SELECT * FROM asset WHERE Asset_ID='$asset_id'");
    }
    
    function show_deny(){

        return $this->db->dbh->query("SELECT * FROM asset WHERE deny=1");
    }

    function move_asset($asset_id, $division, $room, $move_user){

       $que1 = "SELECT * FROM asset WHERE Asset_ID='$asset_id' AND Asset_approved=1 AND Asset_available=1";
       $res = NULL;
       //echo $que1;
       $resx = $this->db->dbh->query($que1);
       
       $que2 = "SELECT * FROM asset_movement WHERE asset_id='$asset_id' AND verify_date IS NULL";
       //echo $que2;
       $resx2 = $this->db->dbh->query($que2);
        $resx->num_rows;
        $resx2->num_rows;
       

       if ($resx->num_rows == 1 and $resx2->num_rows == 0){
           $array = $resx->fetch_assoc();
           $cur_division = $array['Current_Division'];
           $cur_room = $array['Current_Room'];
           $que2 = "INSERT INTO asset_movement (asset_id, old_division, old_room, new_division, new_room, move_date, moved_by) VALUES ('$asset_id', '$cur_division', '$cur_room', '$division', '$room', '".  date('Y-m-d H:i:s' )."', '$move_user')";
           
           try{
                $res = $this->db->dbh->query($que2);
           }
           catch(Exception $e){
                $this->db->dbh->rollback();
           }
       }
       else{
           
       }

    }
    
    
    function retrieve_new_assets($division=""){
        
        if ($division != ""){
            $que = "SELECT asset.Asset_ID, Asset_Name, asset.Barcode_No, asset.Serial_No, asset.Asset_Code, division.Division_Name, room.Room_name, user.first_name, user.last_name FROM asset INNER JOIN asset_movement on asset.Asset_ID=asset_movement.asset_id INNER JOIN division ON asset_movement.new_division=division.Division_Code INNER JOIN room ON asset_movement.new_room = room.Room_code INNER JOIN user ON user.user_ID = asset_movement.moved_by WHERE asset_movement.verified IS NULL AND new_division='$division'";
            
        }
        else{
            $que = "SELECT asset.Asset_ID, Asset_Name, asset.Barcode_No, asset.Serial_No, asset.Asset_Code, division.Division_Name, room.Room_name, user.first_name, user.last_name FROM asset INNER JOIN asset_movement on asset.Asset_ID=asset_movement.asset_id INNER JOIN division ON asset_movement.new_division=division.Division_Code INNER JOIN room ON asset_movement.new_room = room.Room_code INNER JOIN user ON user.user_ID = asset_movement.moved_by WHERE asset_movement.verified IS NULL  ";
            
        }
        // alternate query :- SELECT asset.Asset_ID, Asset_Name, asset.Barcode_No, asset.Serial_No, asset.Asset_Code, division.Division_Name, room.Room_name, user.first_name, user.last_name, approve.first_name, approve.last_name FROM asset INNER JOIN asset_movement on asset.Asset_ID=asset_movement.asset_id INNER JOIN division ON asset_movement.new_division=division.Division_Code INNER JOIN room ON asset_movement.new_room = room.Room_code INNER JOIN user ON user.user_ID = asset_movement.moved_by INNER JOIN user AS approve ON approve.user_ID = asset_movement.approved_by
        //echo $que;
        $res = $this->db->dbh->query($que);
        return $res;
    }

    function update_asset($asset_id, $item_name="", $item_type="", $item_category="",  $vendor="", $vendor_add="", $p_date="", $w_end="", $serial_no="", $deprec="", $value="", $model="", $brand=""){
        $cond = array();

        if ($item_name!=''){array_push($cond, "Asset_Name='$item_name'");}
        if ($item_type != ""){array_push($cond, "Asset_type='$item_type'");}
        if ($item_category != ""){array_push($cond, "Asset_Category='$item_category'");}
        if ($vendor!= ""){array_push($cond, "Vendor='$vendor'");}
        if ($vendor_add != "" ){array_push($cond, "Vendor_Address='$vendor_add'");}
        if ($p_date != ""){array_push($cond, "Purchase_Date='$p_date'");}
        if ($w_end != ""){array_push($cond, "Warranty_End='$w_end'");}
        if ($serial_no != ""){array_push($cond, "Serial_No='$serial_no'");}
        if ($deprec != ""){array_push($cond, "Depreciation='$deprec'");}
        if ($value != ""){array_push($cond, "Price='$value'");}
        if ($model != ""){array_push($cond, "Model_No='$model'");}
        if ($brand != ""){array_push($cond, "Brand='$brand'");}

        if (count($cond >= 1)){
            $que = "UPDATE asset SET ".implode(" , ", $cond)." WHERE Asset_ID='$asset_id'";
            //echo $que;
            $res = $this->db->dbh->query($que);
        }
        else{}

    }

    function edit_barcode($asset_id, $barcode){
        $que = "UPDATE asset SET Barcode_No=$barcode WHERE Asset_ID='$asset_id'";
        //
        $res = $this->db->dbh->query($que);
    }



    function add_asset_description($asset_id, $description){
        $que = 'UPDATE asset SET Description="'.$description.'" WHERE Asset_ID="'.$asset_id.'"';
        $res = $this->db->dbh->query($que);

    }

    function remove_asset($asset_id){
        $que = "UPDATE asset SET Asset_available=0 WHERE Asset_ID='$asset_id'";
       // echo $que;
        $res = $this->db->dbh->query($que);
    }

    function remove_room($room_code){
        $que = "DELETE  FROM room WHERE Room_code = '$room_code'";
        echo $que;
        $res = $this->db->dbh->query($que);
        
    }
    function retrieve_division(){
        $que = "SELECT * FROM division";
        $res = $this->db->dbh->query($que);
        return $res;
        
    }
    
    function retrieve_room(){
        $que = "SELECT * FROM room";
        $res = $this->db->dbh->query($que);
        return $res;
        
    }
    
    function retrieve_assettypes(){
        $que= "SELECT * FROM asset_type";
        $res = $this->db->dbh->query($que);
        return $res;
    }
    
    function retrieve_assetcats(){
        $que= "SELECT * FROM asset_category";
        $res = $this->db->dbh->query($que);
        return $res;
    }
    
    function add_photo($asset_id, $photo_name, $photo_path){
        $que = "INSERT INTO asset_photo(asset_id, asset_photo_id, photo_path) VALUES "
                . "('$asset_id', '$photo_name' , '$photo_path')";
        $res = $this->db->dbh->query($que);
    }
    
    function get_photo($asset_id){
        $que = "SELECT * FROM asset_photo WHERE asset_id='$asset_id'";
        
        $res = $this->db->dbh->query($que);
        return $res;
    }
    
    function delete_photo($asset_id,$photo_id){
        $que1 = "SELECT * FROM asset_photo WHERE asset_photo_id='$photo_id' AND asset_id='$asset_id'";
        $res1 = $this->db->dbh->query($que1);
        $que = "DELETE FROM asset_photo WHERE asset_photo_id = '$photo_id' AND asset_id='$asset_id'";
        $res = $this->db->dbh->query($que);
        
        $data = $res1->fetch_assoc();
        $path = $data['photo_path'];
        unlink($path);
        
        
        
    }
    
    function retrieve_assetpics($asset_id){
        $que = "SELECT * FROM asset_photo WHERE asset_id='$asset_id'";
        
        $res = $this->db->dbh->query($que);
        return $res;
    }
    
    
    function retrieve_asset_movement($asset_id){
        $QUE= "SELECT * FROM asset_movement WHERE asset_id='$asset_id' ORDER BY YEAR(move_date) , MONTH(move_date) , DAY(move_date)";
        $res = $this->db->dbh->query($QUE);
        return $res;
        
    }
    
    function retrieve_temp_assets(){
        return $this->db->dbh->query("SELECT * FROM temp_asset INNER JOIN asset_category ON asset_category.asset_category_id=temp_asset.Asset_Category INNER JOIN asset_type ON asset_type.asset_type_id=temp_asset.Asset_type");
    }
    
    function add_temp_asset($name, $desc, $div, $room, $type, $category, $barcode){
        $que = "INSERT INTO temp_asset (Asset_Name, Asset_Description, Division, Room, Asset_type, Asset_Category, Barcode) VALUES ('$name', '$desc', '$div', '$room', '$type','$category', '$barcode')";
        echo $que;
        $this->db->dbh->query($que);
        
    }
    
    function update_temp_asset($temp_id, $name, $desc, $type, $category){
        $que = "UPDATE temp_asset SET Asset_Name='$name', Asset_Description='$desc', Asset_type='$type', Asset_Category='$category', Barcode='' WHERE Temp_asset_id='$temp_id' ";
        $this->db->dbh->query($que);
    }
    
    
    
    function link_temp_asset($temp_id, $asset_id){
        $que = "UPDATE temp_asset SET Related_asset='$asset_id' WHERE Temp_asset_id='$temp_id'";
        $this->db->dbh->query($que);
    }
    
    function get_bos_query($division, $room, $year){
        
        $que = "SELECT * FROM bos LEFT JOIN asset ON asset.Barcode_No = bos.new_barcode WHERE bos.current_division='$division' AND bos.current_room='$room' AND year='$year'";
        if ($room == ""){
            $que = "SELECT * FROM bos LEFT JOIN asset ON asset.Barcode_No = bos.new_barcode WHERE bos.current_division='$division' AND year='$year'";
        }
        
        $res = $this->db->dbh->query($que);
        return $res;
    }
    
    
    function get_last_bos_asset_available($division, $room, $year1, $year2, $barcode){
        $que1 = "SELECT * FROM bos LEFT JOIN asset ON asset.Barcode_No = bos.new_barcode WHERE bos.new_barcode='$barcode' AND bos.current_division='$division' AND bos.current_room='$room' AND year='$year1'";
        $que2 = "SELECT * FROM bos LEFT JOIN asset ON asset.Barcode_No = bos.new_barcode WHERE bos.new_barcode='$barcode' AND bos.current_division='$division' AND bos.current_room='$room' AND year='$year2'";
        if ($room == ""){
            $que1 = "SELECT * FROM bos LEFT JOIN asset ON asset.Barcode_No = bos.new_barcode WHERE bos.new_barcode='$barcode' AND bos.current_division='$division' AND year='$year1'";
            $que2 = "SELECT * FROM bos LEFT JOIN asset ON asset.Barcode_No = bos.new_barcode WHERE bos.new_barcode='$barcode' AND bos.current_division='$division' AND year='$year2'";
        
        }
        
        $res1 = $this->db->dbh->query($que1);
        $res2 = $this->db->dbh->query($que2);
        $return = 0;
        if ($res1->num_rows == 0 && $res2->num_rows >= 1){
            $return = 1;
        }
        else{
            if ($res2->num_rows == 0 && $res1->num_rows >= 1){
                $return = -1;
            }
        }
        return $return;
    }
    
    function get_bos_not_found($division, $room, $year){
        $que = "SELECT DISTINCT Asset_ID, Barcode_No, Asset_Name, Asset_type, Asset_Category, Model_No, Brand, Serial_No, asset.Current_Division, asset.Current_Room, Asset_Code FROM asset LEFT JOIN bos ON asset.Barcode_No = bos.new_barcode WHERE  asset.Current_Division = '$division' AND asset.Current_Room = '$room' AND (NOT (bos.year= '$year') OR bos.new_barcode IS NULL )";
        if ($room == ""){
            $que = "SELECT DISTINCT Asset_ID, Barcode_No, Asset_Name, Asset_type, Asset_Category, Model_No, Brand, Serial_No, asset.Current_Division, asset.Current_Room, Asset_Code FROM asset LEFT JOIN bos ON asset.Barcode_No = bos.new_barcode WHERE  asset.Current_Division = '$division'  AND (NOT (bos.year= '$year') OR bos.new_barcode IS NULL )";
            
        }
        $res = $this->db->dbh->query($que);
        return $res;
    }
    
    
    function revalue_asset($barcode, $year_bos){
        $que = "SELECT * FROM asset WHERE Barcode_No= '$barcode'";
       
        $res = $this->db->dbh->query($que);
        if ($res->num_rows >= 1){
            $data = $res->fetch_assoc();
            $original = $data['Original_Value'];
            
            $current = $data['Current_Value'];
            $depr = $data['Depreciation'];
            $last_val_date = $data['Last_Value_date'];
            $year = date("Y");
            
            
            $time = strtotime($last_val_date);
            $last_year = date("Y", $time);
            
            if ($year_bos - $last_year > 0 and $current != 0){
                $new = $original * (1 - $depr);
                $date = date("Y-m-d H:i:s");
                $quex = "INSERT INTO depreciation VALUES ('$date', '$barcode', '$current', '$new' )";
                echo $quex;
                $que = "UPDATE asset SET Current_Value = '$new' , Last_Value_date = '$date' WHERE Barcode_No='$barcode'";
                $this->db->dbh->query($que);
                $this->db->dbh->query($quex);
            }
        }
        
    }
    
    function get_full_depr_asset($division, $room, $year){
        $que="SELECT * FROM asset INNER JOIN bos on bos.new_barcode=asset.Barcode_No WHERE bos.Current_Division='$division' AND bos.Current_Room='$room' AND  bos.year='$year' AND (Current_Value='0' OR re_valueable='1')";
        if ($room == ""){
            $que="SELECT * FROM asset INNER JOIN bos on bos.new_barcode=asset.Barcode_No WHERE bos.Current_Division='$division' AND bos.year='$year' AND (Current_Value='0' OR re_valueable='1')";
        }
        if ($division == ""){
            $que="SELECT * FROM asset INNER JOIN bos on bos.new_barcode=asset.Barcode_No WHERE bos.Current_Room='$room' AND bos.year='$year' AND  (Current_Value='0' OR re_valueable='1')";
        }
        $res = $this->db->dbh->query($que);
        return $res;
    }
    
    function asset_move_hist($Asset_ID, $start_Date, $end_Date){
        $que= "SELECT *   FROM asset_movement INNER JOIN asset on asset_movement.asset_id = asset.Asset_ID WHERE Asset_ID='$Asset_ID' AND verify_date>'$start_Date' AND verify_date<'$end_Date' ORDER BY verify_date ";
        $res = $this->db->dbh->query($que);
        return $res;
    }
     function asset_div_hist($Division,$year){
        $que="SELECT * FROM `asset_movement` WHERE YEAR(verify_date) =$year AND ";
        $res = $this->db->dbh->query($que);
        return $res;
    }
    
    function asset_div_out($Division,$year){
        $que= "SELECT * FROM asset_movement  INNER JOIN asset on asset_movement.asset_id = asset.Asset_ID WHERE old_division='$Division' AND  YEAR(verify_date) = $year";
        //echo $que;
        $res = $this->db->dbh->query($que);
        return $res;
    }
    
    function asset_div_in($Division,$year){
        $que= "SELECT * FROM asset_movement INNER JOIN asset on asset_movement.asset_id = asset.Asset_ID WHERE new_division='$Division' AND YEAR(verify_date) = $year";
        //echo $que;
        $res = $this->db->dbh->query($que);
        return $res;
    }
    
   function asset_count($division){
       $que = "SELECT * FROM asset WHERE division='$division'";
       $res = $this->db->dbh->query($que);
        return $res;
   }
   
   function get_asset_type_count($division=""){
       $typeque = "SELECT * FROM asset_type";
       $typeres = $this->db->dbh->query($typeque);
       
       
       
       $que = "SELECT * FROM asset";
       if ($division != ""){
           $que = "SELECT * FROM asset WHERE Current_Division='$division'";
       }
       $res = $this->db->dbh->query($que);
       
       $typearray = array();
       $typecount = array();
       
       while ($type = $typeres->fetch_assoc()){
           $typeID = $type['asset_type_id'];
           $typename = $type['asset_type'];
           $typearray[$typeID] = $typename;
       }
       //echo $que;
       while ($asset = $res->fetch_assoc()){
           $assettype = $asset['Asset_type']  ;
           if (array_key_exists($assettype, $typearray)){
               $typename = $typearray[$assettype];
               if (array_key_exists($typename, $typecount)){
                   $typecount[$typename] += 1;
               }
               else{
                   $typecount[$typename] = 1;
               }
               
           }
           else{
               echo "Error Type index : $assettype";
           }
       }
       
       return $typecount;
       
   }
   
      function get_asset_category_count($division=""){
       $catque = "SELECT * FROM asset_category";
       $catres = $this->db->dbh->query($catque);
       
       $que = "SELECT * FROM asset";
       if ($division != ""){
           $que = "SELECT * FROM asset WHERE Current_Division='$division'";
       }
       $res = $this->db->dbh->query($que);
       
       $catarray = array();
       $catcount = array();
       
       while ($cat = $catres->fetch_assoc()){
           $catID = $cat['asset_category_id'];
           $catname = $cat['asset_category'];
           $catarray[$catID] = $catname;
       }
       //echo $que;
       while ($asset = $res->fetch_assoc()){
           $assetcat = $asset['Asset_Category']  ;
           if (array_key_exists($assetcat, $catarray)){
               $catname = $catarray[$assetcat];
               if (array_key_exists($catname, $catcount)){
                   $catcount[$catname] += 1;
               }
               else{
                   $catcount[$catname] = 1;
               }
               
           }
           else{
               echo "Error Type index : $assetcat";
           }
       }
       
       return $catcount;
       
   }
   
   
   function retrieve_user_level_name($user_level){
       $level_array = array('asset_clerk' => "Asset Clerk", 'dp_registrar'=>'Deputy Registrar', 'div_asset_clerk' => "Divisional Asset Clerk", "bursar" => "Bursar Clerk", "system_admin" => "System Administrator", "temp_user" => "Temporary User");
       $level = $level_array[$user_level];
       return $level;
   }
   
   function search_asset_temp($name, $type, $cat){
       $query = "SELECT * FROM asset WHERE asset_name LIKE '$name' OR asset_name LIKE '%$name' OR asset_name LIKE '$name%' OR asset_name LIKE '%$name%' OR asset_type='$type' OR asset_category='$cat'";
       $res = $this->db->dbh->query($query);
       return $res;
   }
   
   function retrieve_temp_asset($id){
       $query = "SELECT * FROM temp_asset WHERE Temp_asset_id='$id'";
       $res = $this->db->dbh->query($query);
       
       return $res;
   }
   
   function resolve_temp_asset($temp, $real){
       $query = "UPDATE temp_asset SET Asset_Resolved=1, Related_Asset='$real' WHERE Temp_asset_id='$temp'";
       $res = $this->db->dbh->query($query);
       //echo $query;
       return $res;
   }
   
   function retrieve_depreciation($barcode, $year){
       $query= "SELECT Barcode, Previous_Value, New_Value, date(Date) FROM depreciation WHERE Barcode='$barcode' AND YEAR(Date) <= $year";
       $res = $this->db->dbh->query($query);
       //echo $query;
       return $res;
   }
   
   function update_value($asset_id, $val, $deprec){
       $query = "UPDATE asset SET Current_Value='$val',Original_Value='$val', Depreciation='$deprec', Last_Value_date='".date('Y-m-d H:i:s')."' WHERE Asset_ID='$asset_id'";
        echo $query;
        $res = $this->db->dbh->query($query);
        return $res;
   }
   
   
   function get_inbox($div){
       $que = "SELECT * FROM message WHERE To_Division='$div'";
       
       $res= $this->db->dbh->query($que);
       return $res;
   }
   
   function get_outbox($div){
       $que = "SELECT * FROM message WHERE From_Division='$div'";
      
       $res= $this->db->dbh->query($que);
       return $res;
   }
   
   function send_mail($divin, $divout, $title, $message){
       $que = "INSERT INTO message (From_Division, To_Division, Title, Message) VALUES ('$divin', '$divout', '$title', '$message')";
       $res= $this->db->dbh->query($que);
       return $res;
       
   }
   
   function read_mail($messageID){
       $que = "SELECT * FROM message WHERE Message_id='$messageID'";
       $res= $this->db->dbh->query($que);
       return $res;
   }
   
   function add_asset_type($asset_type, $desc){
       $que = "INSERT INTO `asset_type`( `asset_type`, `type_description`) VALUES ('$asset_type','$desc')";
       $res= $this->db->dbh->query($que);
       return $res;
   }
   
   function check_message($id){
       $que = "UPDATE message SET Message_read='1' WHERE Message_id='$id'";
       $res= $this->db->dbh->query($que);
       return $res;
   }
   
   function count_message($div){
       $que = "SELECT * FROM message WHERE To_Division='$div' AND Message_read='0'";
       $res= $this->db->dbh->query($que);
       return $res->num_rows;
   }

   
   
}

