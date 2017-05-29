<?php

require_once("function.php");
include 'fetch_data.php';
$log = new FAssetClerk();
$user_details = $_SESSION['user_details'];$level = $log->retrieve_user_level_name($user_details['user_level']);
$first_name = $user_details['first_name'];
$last_name = $user_details['last_name'];
$log = new FAssetClerk();

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
              <h2><?php echo $first_name;?></h2>
              <span>(<?php echo $level;?>)</span>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br/><br><br><br> <br>

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
           <!--   <h3>General</h3> -->
              <ul class="nav side-menu">
			  
               
                
				<li><a href=""><i class="fa fa-home"></i> Home </span></a></li>
				
				
				
				
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
                       
                <div class="x_title">
                  <h2>Asset Report<?php echo $year;?></h2> 
                  
                  <div class="clearfix"></div>
                </div>
                  <div>
                      <form name="divi_room_select" id="divi_room_select" action="" method="post">
                      <div>
                          <script type="text/javascript" src="js/jquery.js"></script>

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
                      <label>Division</label>
                      <select onchange="fetch_select(this.value);" name="div">
           <option>
              Select state
           </option>
           
           <?php
             $host = 'localhost';
             $user = 'root';
             $pass = '';
           
             mysql_connect($host, $user, $pass);

             mysql_select_db('assetmanager');
           
             $select=mysql_query("select Division_Code, Division_Name from division group by Division_Code");
             while($row=mysql_fetch_array($select))
             {
                 
              echo "<option value='".$row['Division_Code']."'>".$row['Division_Name']."</option>";
             }
           ?>

         </select>
                      
                      <label>Room</label>
                      <select id="new_select" name="room">
         </select>
                      
                      <label>Year</label>
                              <select name="year">
                                <script>
                                var myDate = new Date();
                                var year = myDate.getFullYear();
                                for(var i = 2016; i < year+1; i++){
                                        document.write('<option value="'+i+'">'+i+'</option>');
                                }
                                </script>
                              </select>
                      </div>
                          <br><br>
                      <div class="col-md-4">
                          <a class="btn btn-primary btn-lg" button type="button"  onclick="found_direct()"role="button">Assets &nbsp;&nbsp; Found</a>
            </div>
            <div class="col-md-4">              
                <a class="btn btn-primary btn-lg" button type="button" onclick="not_found_direct()" role="button">Assets &nbsp; Not Found   &nbsp;</a>
            </div>
            <div class="col-md-4">              
                <a class="btn btn-primary btn-lg" button type="button" onclick="revalue_direct()"  role="button">Re-evaluate &nbsp; Assets &nbsp;</a>
            </div>
                      </form>
                      <script>
                          function found_direct(){
                                document.getElementById("divi_room_select").action="asset_found.php";
                                document.getElementById("divi_room_select").submit();
                          }
                          function not_found_direct(){
                                document.getElementById("divi_room_select").action="not_found.php";
                                document.getElementById("divi_room_select").submit();
                          }
                          function revalue_direct(){
                                document.getElementById("divi_room_select").action="reevaluate.php";
                                document.getElementById("divi_room_select").submit();
                              
                          }
                      </script>                      
                      </div>

                  
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