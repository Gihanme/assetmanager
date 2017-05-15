<?php


/* To run this program, the csv file should be in the following format:- 
 * 
 * 
 */

require "function.php";

$barcode_list= array();


// check there are no errors

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
    
    
    if($_FILES['csv']['error'] == 0){
        $name = $_FILES['csv']['name'];
        $ext = strtolower(end(explode('.', $_FILES['csv']['name'])));
        $type = $_FILES['csv']['type'];
        $tmpName = $_FILES['csv']['tmp_name'];

        
        // check the file is a csv
        if($ext === 'csv'){
            if(($handle = fopen($tmpName, 'r')) !== FALSE) {
                // necessary if a large csv file
                set_time_limit(0);

                $row = 0;

                while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                    // number of fields in the csv
                    $col_count = count($data);
                    // get the values from the csv
                    $csv[$row] = $data;
                    // inc the row
                    if ($row != 0){
                        read_array($mode, $row);
                    }
                    $row++;
                }
                fclose($handle);
                
                
            }
        }
    }
}
?>
<input type="checkbox" id="check" onclick="changestate()"><label>Multiple Input?</label><br><br>
<div id="form"  style="display: none">
<form name="csv_up" action="" method="post" enctype="multipart/form-data" >
    
    <input type="number" name="quantity" placeholder="quantity" ><br>
    <input type="radio" name="option" id="item1" value="0" disabled="disabled">
    <label>Single division, Single Room</label><br>
    <input type="radio" name="option"   id="item2" value="1">
    <label>Single division, Multi Room</label><br>
    <input type="radio" name="option"  id="item3" value="2">
    <label>Multi division, Multi Room</label><br>
    <input type="file" name="csv"  /><br>
    
    <select id="selecting" onchange="trigger_shit()" >
        <option value="1">One</option>
        <option value="2">Two</option>
        
    </select>
    
    <input type="submit" name="submit" id="csvsub"   value="Save" />
</form>
</div>
<script src="js/jquery.min.js"></script>

<script>
function disableTxt() {
    document.getElementById("option").disabled = true;
}

function undisableTxt() {
    document.getElementById("option").disabled = false;
  }
  
  function changestate(){
      if (document.getElementById("check").checked === true){
          //change states
          document.getElementById("item1").disabled = false;
          document.getElementById("form").style.display = '';
      }
      else{
          document.getElementById("item1").disabled = true;
          document.getElementById("form").style.display = 'none';
      }
  }
  
  function trigger_shit(){
      
      var x = document.getElementById("selecting");
      var y = x.options[x.selectedIndex].value;
      alert(y);
  }
</script>