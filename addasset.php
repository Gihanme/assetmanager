<style> .error {color: #FF0000;} </style>
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

$item_name = $model = "";
$itemNameErr = $modelNoErr = $barcodeErr = $costErr = $vendorErr = $brandErr = $vendorAddErr ="";

if ($user_details['user_level'] != "asset_clerk"){
    header("location:login.php");
    
}

if ($_SERVER['REQUEST_METHOD']=='POST'){
    
    $error = 0;
    if(empty($_POST['name'])){
        $itemNameErr = "Name is required";
        $error += 1;
    } 
    else {
        $item_name = test_input($_POST['name']);
    }
    
if(empty($_POST['model'])){
        $modelNoErr = "Model no is required";
        $error += 1;
    }
    else{
        $model = test_input($_POST['model']);
    }    
    
if(empty($_POST['barcode'])){
        $barcodeErr = "Barcode no is required";
        $error +=1;
    }
    else{
        $barcode_no = test_input($_POST['barcode']);
        if (!preg_match("/^[0-9]*$/",$barcode_no)) {
            $barcodeErr= "Invalid data type"; 
                    $error += 1;

            
        }
    } 
    
if(empty($_POST['price'])){
        $costErr = "Cost is required";
        $error += 1;
    }
    else{
        $value= test_input($_POST['price']);
        if (!preg_match("/^[0-9]*$/",$value)) {
            $costErr= "Invalid data type"; 
            $error + 1;
        }
    }
    
if(empty($_POST['vendor'])){
        $vendorErr = "Vendor name is required";
        $error += 1;
    }
    else{
        $vendor= test_input($_POST['vendor']);
        if (!preg_match("/^[a-zA-Z]*$/",$vendor)) {
            $vendorErr= "Invalid data type";
            $error += 1;
            
        }
    } 
    
if(empty($_POST['vendor_add'])){
        $vendorAddErr = "Vendor address is required";
        $error += 1;
    }
    else{
        $vendor= test_input($_POST['vendor_add']);
        
    }
    
if(empty($_POST['brand'])){
        $brandErr = "Brand name is required";
        $error += 1;
    }
    else{
        $brand= test_input($_POST['brand']);
        
    }
    
    
    
    if ($error == 0 ){
    $item_name = $_POST['name'];
    $item_type = $_POST['type'];
    $vendor = $_POST['vendor'];
    $vendor_add = $_POST['vendor_add'];
    $period = $_POST['datefilter'];
    //$year = $_POST['year'];
    $dates = explode("-", $period);
    $p_date = $dates[0];
    $w_end = $dates[1];
    $mid = strtotime($p_date);
    $p_date = date("Y-m-d", $mid);
    $sid = strtotime($w_end);
    $w_end = date("Y-m-d", $sid);
    
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

 }

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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

  <title>AMS</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">

  <link href="css/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="css/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="css/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="css/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="css/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

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

  
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>AMS</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">

  <link href="css/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="css/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="css/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="css/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="css/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

  <script src="js/jquery.min.js"></script>

</head>


<body class="nav-md">
    <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          
          <div class="clearfix"></div>

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

           <br />
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
                  <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

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
                    
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <script type="text/javascript">

        function fetch_select(val)
        {
           $.ajax({
             type: 'post',
             url: 'fetch_data.php',
             data: {
               get_option:val
             },
             success: function (response) {
               document.getElementById("new_select").innerHTML=response; 
             }
           });
        }

    </script>
                <form name="createUserType" id="createUserType" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" data-toggle="validator">
                    <table id="datatable" class="table table-striped table-bordered">
                    <thead>                      
                    </thead>
                    <tbody>
                        <tr>
                            <td align="style="justify><strong >&nbsp;&nbsp;Asset name </strong></td>
                            <td><input type="text" class="form-control" value="" name="name" id="name"><span class="error"> <?php echo $itemNameErr;?></span>
  <br><br></td>
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
                            <td><input type="text" class="form-control" value="" name="model"/><span class="error"><?php echo $modelNoErr;?></span><br><br></td>
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
                            <td><input type="text" class="form-control" value="" name="barcode"/><span class="error"><?php echo $barcodeErr;?></span><br><br></td>
                            <td align="style="justify"><strong >&nbsp;&nbsp; Cost </strong></td>
                            <td><input type="text" class="form-control" value="" name="price"/><span class="error"><?php echo $costErr;?></span><br><br></td>      
                        <tr>
                            <td align="style="justify"><strong >&nbsp;&nbsp;Serial No </strong></td>
                            <td><input type="text" class="form-control" value="" name="serial"/></td>
                            <td align="style="justify"><strong >&nbsp;&nbsp;Brand </strong></td>
                            <td><input type="text" class="form-control" value="" name="brand"/><span class="error"><?php echo $brandErr;?></span><br><br></td>   
                        </tr>
        
        <tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Vendor </strong></td>
                    <td><input type="text" class="form-control" value="" name="vendor"/><span class="error"><?php echo $vendorErr;?></span><br><br></td>
                    
                    <td align="style="justify"><strong >&nbsp;&nbsp;Vendor Address</strong></td>
                    <td><input type="text" class="form-control" value="" name="vendor_add"/><span class="error"><?php echo $vendorAddErr;?></span><br><br></td>

                </tr>
        
        <tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Division</strong></td>
                    <td><select class="form-control" name="division"   onchange="fetch_select(this.value);">
                            <?php 
                                while($div = $divisions->fetch_assoc()){
                                    echo "<option value='".$div['Division_Code']."'>".$div['Division_Name']."</option>";
                                }?>
                        </select></td> 
                    
                    <td align="style="justify"><strong >&nbsp;&nbsp;Room</strong></td>
                    <td><select class="form-control" name="room"   onchange="fetch_select(this.value);">
                            <?php 
                                while($rom = $rooms->fetch_assoc()){
                                    echo "<option value='".$rom['Room_code']."'>".$rom['Room_name']."</option>";
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
                                

                      
            </tbody>
                  </table>
                    <div class="form-group">
    <div class="col-md-9 col-md-offset-3">
                    <div id="messages">
                        <font size="30"></font>
                    </div>              
                </div>              
        </div>
                    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Are you sure you want to continue?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-md" > Submit</button>
                </div>
            </div>
        </div>
    </div>
                    
        <div class="col-sm-offset-10 col-sm-3">
            <button class="btn btn-default" data-href="/delete.php?id=54" data-toggle="modal" data-target="#confirm-delete">
        Submit
    </button>
            
  </div>                       
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

        
  <!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />      
        
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
