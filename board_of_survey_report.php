<?php

require_once("function.php");
$log = new FAssetClerk();
$user_details = $_SESSION['user_details']; $level = $log->retrieve_user_level_name($user_details['user_level']);
$first_name = $user_details['first_name'];
$last_name = $user_details['last_name'];

if ($user_details['user_level'] != "temp_user" and $user_details['user_level'] != "bursar" and $user_details['user_level'] != "dp_registrar"){
    header("location:login.php");
    exit();
    
}
$divisions = $log->retrieve_division();
$rooms = $log->retrieve_room();

$year = $division = $room = "";
if (isset($_POST['div']) and isset($_POST['room']) and isset($_POST['year'])){
    $division = $_POST['div'];
    $room = $_POST['room'];
    $year = $_POST['year'];
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
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
           <!--   <h3>General</h3> -->
              <ul class="nav side-menu">
			  
               
                
                                <li><a href="board_of_survey_report.php"><i class="fa fa-home"></i> Home </span></a></li>
				<li><a href="createuser.php"><i class="fa fa-user-plus"></i> Create User </span></a></li>
				
				
				
               </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

         
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
                 <?php echo "$first_name $last_name";?>
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
            
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <h1><link rel="stylesheet" type="text/css" media="print" href="print.css"></h1>
                       <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                                  <script>
                                      function myFunction() {
                                      window.print();}
                                  </script>
                  
                <div class="x_title">
                  <h2>Asset Report for Year <?php echo $year;?></h2> 
                  
                  <div class="clearfix"></div>
                </div>
                  <div>
                      <form name="divi_room_select" action="" method="post">
                      <div>
                          
                      <label>Division</label>
                      <select  name="div">
                          
                            <?php 
                                while($div = $divisions->fetch_assoc()){
                                    echo "<option value='".$div['Division_Code']."'>".$div['Division_Name']."</option>";
                                }?>
                      </select></div>
                      <div>
                      <label>Room</label>
                      <select  name="room">
                          <option value="">Select All</option>
                            <?php 
                                while($div = $rooms->fetch_assoc()){
                                    echo "<option value='".$div['Room_code']."'>".$div['Room_name']."</option>";
                                }?>
                      </select>
                      </div>
                          <div>
                              <label>Year</label>
                              <select name="year">
                                <script>
                                var myDate = new Date();
                                var year = myDate.getFullYear();
                                for(var i = year; i < year+10; i++){
                                        document.write('<option value="'+i+'">'+i+'</option>');
                                }
                                </script>
                              </select></div>
                      <input type="submit">
                      </form>
                      
                      <h2>Division:- <?php echo $division;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Room :- <?php echo $room;?></h2>
                      <br>
                      
                      </div>
                      <table class="table table-striped table-bordered">
                        <thead>
                            <th>Description of Articles</th>
                            <th>Barcode No</th>
                            <th>Balance as at earlier report</th>
                            <th>Balance as at current report</th>
                            <th>Quality of Goods</th>
                        </thead>
                        <tbody>
                            <?php 
                            if (isset($_POST['div']) and isset($_POST['room']) and isset($_POST['year'])){
                            
                            $data = $log->get_bos_query($division,$room ,$year);
                            while ($row = $data->fetch_assoc()){
                                $barcode = $row['new_barcode'];
                                $log->revalue_asset($barcode);
                                $dif = $log->get_last_bos_asset_available($division, $room, $year, $year-1, $barcode);
                                $nyear = 1;
                                $pyear = 1;
                                $def = 0;
                                $sur = 0;
                                if ($dif == 1){
                                    $nyear = 0;
                                    $def = 1;
                                }
                                else{
                                    if ($dif == -1){
                                        $pyear = 0;
                                        $sur = 1;
                                    }
                                }
                                $status = "G";
                                if($row['broken'] == 1){
                                    $status = "B";
                                }
                                echo "<tr>"
                                . "<td>".$row['Asset_Name']."</td>"
                                        . "<td>".$row['new_barcode']."</td>"
                                        . "<td>$pyear</td>"
                                        . "<td>$nyear</td>"
                                        . "<td>$status</td>";
                            }}
                            
                            ?>
                            
                        </tbody>
                      </table>
                  <br>
                  <h2>Assets Not Found: - </h2>
                  <table class="table table-striped table-bordered">
                      <thead>
                      <th>Asset Bar code</th>
                      <th>Description</th>
                      <th>Room</th>
                      <th>Current Asset Code</th>
                      
                      </thead>
                      <tbody>
                          <?php 
                            $data2 = $log->get_bos_not_found($division, $room, $year);
                            while ($row = $data2->fetch_assoc()){
                                echo "<tr>"
                                        . "<td>".$row['Barcode_No']."</td>"
                                        . "<td>".$row['Asset_Name']."</td>"
                                        . "<td>".$row['Current_Room']."</td>"
                                        . "<td>".$row['Asset_Code']."</td>"
                                        . "</tr>";
                            }
                          ?>
                      </tbody>
                  </table>
                   <br>
                  <h2>Assets Needed to be checked for re-valuation: - </h2>
                  <table class="table table-striped table-bordered">
                      <thead>
                      <th>Asset Bar code</th>
                      <th>Description</th>
                      <th>Room</th>
                      <th>Current Asset Code</th>
                      <th>Current Value</th>
                      <th>Original Value</th>
                      
                      </thead>
                      <tbody>
                          <?php 
                            $data2 = $log->get_full_depr_asset($division, $room);
                            while ($row = $data2->fetch_assoc()){
                                echo "<tr>"
                                        . "<td>".$row['Barcode_No']."</td>"
                                        . "<td>".$row['Asset_Name']."</td>"
                                        . "<td>".$row['Current_Room']."</td>"
                                        . "<td>".$row['Asset_Code']."</td>"
                                        . "<td>".$row['Current_Value']."</td>"
                                        . "<td>".$row['Price']."</td>"
                                        . "</tr>";
                            }
                          ?>
                      </tbody>
                  </table>
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


        <!-- Datatables -->
        <!-- <script src="js/datatables/js/jquery.dataTables.js"></script>
  <script src="js/datatables/tools/js/dataTables.tableTools.js"></script> -->

        <!-- Datatables-->
        <script src="js/datatables/jquery.dataTables.min.js"></script>
        <script src="js/datatables/dataTables.bootstrap.js"></script>
        <script src="js/datatables/dataTables.buttons.min.js"></script>
        <script src="js/datatables/buttons.bootstrap.min.js"></script>
        <script src="js/datatables/jszip.min.js"></script>
        <script src="js/datatables/pdfmake.min.js"></script>
        <script src="js/datatables/vfs_fonts.js"></script>
        <script src="js/datatables/buttons.html5.min.js"></script>
        <script src="js/datatables/buttons.print.min.js"></script>
        <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="js/datatables/dataTables.keyTable.min.js"></script>
        <script src="js/datatables/dataTables.responsive.min.js"></script>
        <script src="js/datatables/responsive.bootstrap.min.js"></script>
        <script src="js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>
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
<?php

?>