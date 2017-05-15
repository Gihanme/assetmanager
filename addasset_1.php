<?php 
 include "function.php"; if (!isset($_SESSION['user_details'])){     header("location:login.php");     exit(); }

//check asset clerk has login

$log = new FAssetClerk();

$divisions = $log->retrieve_division();
$rooms = $log->retrieve_room();
$types = $log->retrieve_assettypes();
$cats = $log->retrieve_assetcats();
$user_details = $_SESSION['user_details']; $level = $log->retrieve_user_level_name($user_details['user_level']);
$first_name = $user_details['first_name'];
$last_name = $user_details['last_name'];
$division = $user_details['division'];
$level = $user_details['user_level'];
//check if post request sent to page
if ($user_details['user_level'] != "asset_clerk"){
    header("location:login.php");
    
}

if ($_SERVER['REQUEST_METHOD']=='POST'){
    
    
    $multi = '0';
    $multi = $_POST['multi_input'];
    if (!isset( $_POST['multi_input'])){
        
    $error = 0;
    $item_name = $_POST['name'];
    $item_type = $_POST['type'];
    $vendor = $_POST['vendor'];
    $vendor_add = $_POST['vendor_add'];
    $period = $_POST['datefilter'];
    //$year = $_POST['year'];
    $dates = explode("-", $period);
    $p_date = $dates[0];
    $w_end = $dates[1];
    $value = $_POST['price'];
    $model = $_POST['model'];
    $brand = $_POST['brand'];
    $serial_no = $_POST['serial'];
    $barcode_no=$_POST['barcode'];
    $deprec = $_POST['deprec'];
    $division = $_POST['division'];
    $room = $_POST['room'];
    $item_category = $_POST['category'];
    
    
    
        $log->add_asset($item_name, $item_type, $item_category, $vendor, $vendor_add, $p_date, $w_end, $serial_no, $value, $model, $brand, $barcode_no, $division, $room, $deprec );
    }

    else{
        echo "Multi Mode";
        $item_name = $_POST['name'];
        $item_type = $_POST['type'];
        $vendor = $_POST['vendor'];
        $vendor_add = $_POST['vendor_add'];
        $period = $_POST['datefilter'];
        //$year = $_POST['year'];
        $dates = explode("-", $period);
        $p_date = $dates[0];
        $w_end = $dates[1];
        $value = $_POST['price'];
        $model = $_POST['model'];
        $brand = $_POST['brand'];
        $serial_no = $_POST['serial'];
        $deprec = $_POST['deprec'];
        $item_category = $_POST['category'];
        
        $csv = array();
        
        //Reading file
        
         if($_FILES['csv']['error'] == 0){
        $name = $_FILES['csv']['name'];
        $ext = strtolower(end(explode('.', $_FILES['csv']['name'])));
        $type = $_FILES['csv']['type'];
        $tmpName = $_FILES['csv']['tmp_name'];

        // check the file is a csv
        if($ext === 'csv'){
            echo "CHeck";
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
                    
                    $row++;
                }
                fclose($handle);
                
                
            }
        }
    
        
        $mode = $_POST['mode'];
        
        $c = count($csv);

        for ($i = 1; $i < $c; $i++){
            if ($mode == 0){
                echo "<p>".$csv[$i][0]."</p><br>";
                $division = $_POST['division'];
                $room = $_POST['room'];
                $barcode_no = $csv[$i][0];
                $log->add_asset($item_name, $item_type, $item_category, $vendor, $vendor_add, $p_date, $w_end, $serial_no, $value, $model, $brand, $barcode_no, $division, $room, $deprec );
            }
            else{
                if ($mode == 1){
                    echo "<p>".$csv[$i][0]."</p>";
                    echo "<p>".$csv[$i][1]."</p><br>";
                    $division = $_POST['division'];
                    $barcode_no = $csv[$i][0];
                    $room = $csv[$i][1];
                    $log->add_asset($item_name, $item_type, $item_category, $vendor, $vendor_add, $p_date, $w_end, $serial_no, $value, $model, $brand, $barcode_no, $division, $room, $deprec );
                    
                }
                else{
                    echo "<p>".$csv[$i][0]."</p>";
                    echo "<p>".$csv[$i][1]."</p>";
                    echo "<p>".$csv[$i][2]."</p><br>";
                    $barcode_no = $csv[$i][0];
                    $division = $csv[$i][1];
                    $room = $csv[$i][2];
                    $log->add_asset($item_name, $item_type, $item_category, $vendor, $vendor_add, $p_date, $w_end, $serial_no, $value, $model, $brand, $barcode_no, $division, $room, $deprec );
                }
            }
        }
    }
}
}


function add_multi($mode, $csv){
    
    $array= array();
    $c = count($array);
    
    for ($i = 1; $i < c; $i++){
        if ($mode == 0){}
        else{
            if ($mode == 1){}
            else{}
        }
    }
    
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>  
	  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
	  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
	  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>

  <title>AMS</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="styleshewt">
  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">
  <link href="js/dxatatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <script src="js/jquery.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<script type="text/javascript">
$(function() {

  $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
      var startDate=$startDate.val();
      document.getElementById('demo').innerHTML='<p>'+startDate+'</p>';
      
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
</script>

  
</head>


<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">         
                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                          <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $first_name;?></h2>               <span>(<?php echo $level;?>)</span>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <!--   <h3>General</h3> -->
                            <ul class="nav side-menu">
                                <li><a href="assetclerk.php"><i class="fa fa-home"></i> Home </span></a></li>
                                <li><a href="addasset.php"><i class="fa fa-desktop"></i> Add Asset </span></a></li>
                                <li><a href="viewasset.php"><i class="fa fa-eye"></i> View Asset </span></a></li>
                                
                            </ul>
                        </div>    
                    </div>        
          <!-- /sidebar menu -->
          <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
      <!-- top navigation -->
            <div class="top_nav">
              <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="images/img.jpg" alt=""><?php echo "$first_name $last_name";?>
                            <span class=" fa fa-angle-down"></span>
                          </a>
                          <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="javascript:;">  Profile</a>
                            </li>
                          <!--  <li>
                              <a href="javascript:;">Help</a>
                            </li> -->
                            <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                            </li>
                          </ul>
                        </li>
                    <!--<li role="presentation" class="dropdown">
                      <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                      </a>
                      <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                            <li>
                                <a>
                                  <span class="image">
                                      <img src="images/img.jpg" alt="Profile Image" />
                                  </span>
                                  <span>
                                      <span>chathura</span>
                                      <span class="time">3 mins ago</span>
                                  </span>
                                  <span class="message">
                                      add a asset to the sysytem
                                  </span>
                                </a>
                            </li>   
                            <li>
                                <a>
                                    <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                    <span>
                                        <span>chathura</span>
                                        <span class="time">3 mins ago</span>
                                    </span>
                                    <span class="message">
                                        add a asset to the system
                                    </span>
                                </a>
                            </li>
                            <li>
                                <div class="text-center">
                                    <a>
                                      <strong>See All Alerts</strong>
                                      <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                      </ul>
                    </li>-->
                    </ul>
                </nav>
              </div>
            </div>
      <!-- /top navigation -->
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
            </div>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> Add Asset </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form name="createUserType" id="createUserType" method="post" action=""  data-toggle="validator"  enctype="multipart/form-data">
                    <table id="datatable" class="table table-striped table-bordered">
                    <thead>                      
                    </thead>
                    <tbody>
                        <tr>
                            <td align="style="justify><strong >&nbsp;&nbsp;Asset name </strong></td>
                            <td><input type="text" class="form-control" value="" name="name" id="name"/></td>
                            <td align="style="justify"><strong >&nbsp;&nbsp;Asset Type </strong></td>
                            <td>
                                <select class="form-control" name="type">
                                    <?php 
                                        while($div = $types->fetch_assoc()){
                                            echo "<option value='".$div['asset_type_id']."'>".$div['asset_type']."</option>";
                                        }?>
                                </select>
                            </td>   
                        </tr>	
                        <tr>
                            <td align="style="><strong >&nbsp;&nbsp;Model Number </strong></td>
                            <td><input type="text" class="form-control" value="" name="model"/></td>
                            <td align="style="><strong >&nbsp;&nbsp;Item Category </strong></td>
                            <td>
                                <select class="form-control" name="category">
                                    <?php 
                                        while($cate = $cats->fetch_assoc()){
                                            echo "<option value='".$cate['asset_category_id']."'>".$cate['asset_category']."</option>";
                                    }
                                    ?>
                                </select>
                            </td>  
                        </tr>
                        <tr>
                            <td align="style="justify"><strong >&nbsp;&nbsp;Barcode No </strong></td>
                            <td><input type="text" class="form-control" value="" name="barcode"/></td>
                            <td align="style="justify"><strong >&nbsp;&nbsp; Cost </strong></td>
                            <td><input type="text" class="form-control" value="" name="price"/></td>      
                        <tr>
                            <td align="style="justify"><strong >&nbsp;&nbsp;Serial No </strong></td>
                            <td><input type="text" class="form-control" value="" name="serial"/></td>
                            <td align="style="justify"><strong >&nbsp;&nbsp;Brand </strong></td>
                            <td><input type="text" class="form-control" value="" name="brand"/></td>   
                        </tr>
				
				<tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Vendor </strong></td>
                    <td><input type="text" class="form-control" value="" name="vendor"/></td>
                    
                    <td align="style="justify"><strong >&nbsp;&nbsp;Vendor Address</strong></td>
                    <td><input type="text" class="form-control" value="" name="vendor_add"/></td>

                </tr>
				
				<tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Division</strong></td>
                    <td><select class="form-control" name="division">
                            <?php 
                                while($div = $divisions->fetch_assoc()){
                                    echo "<option value='".$div['Division_Code']."'>".$div['Division_Name']."</option>";
                                }?>
                        </select></td> 
                    
                    <td align="style="justify"><strong >&nbsp;&nbsp;Room </strong></td>
                    <td><select class="form-control" name="room">
                            <?php 
                                while($div = $rooms->fetch_assoc()){
                                    echo "<option value='".$div['Room_code']."'>".$div['Room_name']."</option>";
                                }?>
                        </select></td>   
                </tr>				
				<tr>
                    
                    <td align="style="justify"><strong >&nbsp;&nbsp;Depreciation </strong></td>
                    <td><input type="text" class="form-control" value="" name="deprec"/></td>
		                                <td align="style="justify"><strong >&nbsp;&nbsp;Warranty Period  </strong></td>
                    <td>          
                
            <input type="text" name="datefilter" value="" class="form-control" required/>
        								
                
				</tr>
                                <tr>
                                    <td align="style="justify"><strong >&nbsp;&nbsp;Multiple Inputs </strong></td>
                    <td>          
                        <input type="checkbox"  name="multi_input" id="multi_input" onclick="hide_div()" value="1" /></td>
                    
                        <tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Quantity</strong></td>
                    <td><input type="number" class="form-control" min="0" name="quantity" ></td> 
                    
                    <td align="style="justify"><strong >&nbsp;&nbsp;Insert Mode </strong></td>
                    <td><select class="form-control" name="mode">
                            <option value="0">Single Division, Single Room</option>
                            <option value="1">Single Division, Multiple Rooms</option>
                            <option value="2">Multiple Divisions, Multiple Rooms</option>
                        </select></td>   
                </tr>				
				
                                <tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Select File</strong></td>
                    <td><input  type="file"  name="csv" > </td> 
                    
                       
                </tr>				
				<tr>
                    
            
                                    
                                </tr>
                                <tr>
                                    
                                </tr>

                    	
            </tbody>
                  </table>
                    <div class="form-group">
		<div class="col-md-9 col-md-offset-3">
                    <div id="messages">
                        <font size="30"></font>
                    </div>							
                </div>							
        </div>
        <div class="col-sm-offset-10 col-sm-3">
            <button type="submit" class="btn btn-success btn-md" > Submit</button>
	</div>       
                <script>
                function hide_div(){
                    if (document.getElementById("multi_input").checked === true){
                        document.getElementById("hider").style.display='';
                    }
                    else{
                        document.getElementById("hider").style.display='none';
                    }
                }
                
                function change_mode(){
                    
                }
                </script>
                    <script type="text/javascript">
			$(document).ready(function() {
				$('#createUserType').bootstrapValidator({
					container: '#messages',
					feedbackIcons: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
					},
					fields: {
						name: {
							validators: {
								notEmpty: {
									message: 'The room code is required and cannot be empty'
								}
							}
						},
                                                model: {
							validators: {
								notEmpty: {
									message: 'The room name is required and cannot be empty'
								}
							}
						},
                                                barcode: {
							validators: {
								notEmpty: {
									message: 'The room description is required and cannot be empty'
								}
							}
						}
						}})});
						
		</script>
                <div id="custom_notifications" class="custom-notifications dsp_none">
          <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
          </ul>
          <div class="clearfix"></div>
          <div id="notif-group" class="tabbed_notifications"></div>
        </div>
                        </form>
                        <script src="js/bootstrap.min.js"></script>

        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>

        <script src="js/custom.js"></script>

                </div>
              </div>
            </div>
                </div>
              </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
              <div class="pull-right">
                UCSC Asset Management System
              </div>
              <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
          </div>
  </div>
        </div>

        
        
        
        <script>
          var handleDataTableButtons = function() {
              "use strict";
              0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                  extend: "copy",
                  className: "btn-sm"
                }, {
                  extend: "csv",
                  className: "btn-sm"
                }, {
                  extend: "excel",
                  className: "btn-sm"
                }, {
                  extend: "pdf",
                  className: "btn-sm"
                }, {
                  extend: "print",
                  className: "btn-sm"
                }],
                responsive: !0
              })
            },
            TableManageButtons = function() {
              "use strict";
              return {
                init: function() {
                  handleDataTableButtons()
                }
              }
            }();
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          });
          TableManageButtons.init();
        </script>
        
</body>

</html>
