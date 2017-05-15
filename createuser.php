<?php
require "function.php";
require_once ("conection.php");

$log = new FAssetClerk();
$user_details = $_SESSION['user_details']; $level = $log->retrieve_user_level_name($user_details['user_level']);
$first_name = $user_details['first_name'];
$last_name = $user_details['last_name'];

if ($user_details['user_level'] != "system_admin"){
    header("location:login.php");
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

  <link href="js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

  <script src="js/jquery.min.js"></script>


  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

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
		<li><a href="createDivision.php"><i class="fa fa-building"></i> Create Division </span></a></li>
                <li><a href="divisionDetails.php"><i class="fa fa-building"></i> View Divisions </span></a></li>
                <li><a href="createRoom.php"><i class="fa fa-building"></i> Create Room </span></a></li>
                <li><a href="roomdetails.php"><i class="fa fa-building"></i> View Rooms </span></a></li>		
                <li><a href="createuser.php"><i class="fa fa-user"></i> Create User </span></a></li>
                <li><a href="userDetails.php"><i class="fa fa-user"></i> View Users </span></a></li>
                <li><a href="create_itemcategory.php"><i class="fa fa-user"></i> Create asset category</a></li>
                <li><a href="itemcategorydetails.php"><i class="fa fa-user"></i> View asset category</a></li>
                <li><a href="create_assettype.php"><i class="fa fa-user"></i> Create Asset Type</a></li>
                <li><a href="assettypedetails.php"><i class="fa fa-user"></i>View Asset Type</a></li>
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
		  <!--
            <div class="title_left">
             <h3>
                    Users
                    <small>
                        Some examples to get you started
                    </small>
                </h3>  
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                </div>
              </div>
            </div>
			-->
			
          </div>
            <form name="createUser" method="post" action="insertUser.php">
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> Create User</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <script>
                      function disable(){
                          
                          var e= document.getElementById("user_type");
                          var div = document.getElementById("user_division");
                          var row = document.getElementById("disappear_row");
                          var user= e.options[e.selectedIndex].value;
                          if (user == "div_asset_clerk"){
                              
                              div.disabled = false;
                          }
                          else{
                              row.style="display:none";
                              div.style= "display:none";
                              div.value = "FD";
                          }
                      }
                  </script>
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      
                    </thead>


                    <tbody>

                    <tr>
                        <td align="style="justify"><strong >&nbsp;&nbsp;Email Address </strong></td>
                        <td><input type="email" name="email" class="form-control" value="" required/></td>


                    </tr>

                    <tr>
                        <td align="style="justify"><strong >&nbsp;&nbsp;Password </strong></td>
                        <td><input type="password" name="password" class="form-control" value="" required/></td>


                    </tr>

                <tr >
                    <td align="style="justify "><strong >&nbsp;&nbsp;User Type </strong></td>
                    <td>
                        <select id="user_type" class="form-control" name="user_type" onchange="disable()">
                            <option value="div_asset_clerk">Divisional Asset Clerk</option>
                            <option value="bursar">Bursar</option>
                            <option value="dp_registrar">Dept. Registrar</option>
                            <option value="asset_clerk">Asset clerk</option>
                            <option value="system_admin">System Administrator</option>
                            <option value="temp_user">Temporary User</option>
                        </select>
                    </td>      
                </tr>
				
				<tr id="disappear_row">
                    <td align="style="justify"><strong >&nbsp;&nbsp;Division </strong></td>
                    <td>
                        <?php
                        $sql = "SELECT `Division_Code`,`Division_Name` FROM `division` ";
                        $query1=mysqli_query($conn,$sql);
                        //$query2=mysqli_fetch_assoc($query1);
                        ?>
                        <select id="user_division" name="user_division" class="form-control">
                            <?php
                            foreach($query1 as $i) {
                                echo "<option value=" . $i['Division_Code'] . ">" . $i['Division_Name'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>      
                </tr>
				
				<tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;First Name </strong></td>
                    <td><input type="text" pattern="[a-zA-Z]+" title="Enter a valid name" name="first_name"  class="form-control" value="" required/></td>
                </tr>
				
				<tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Last Name </strong></td>
                    <td><input type="text" pattern="[a-zA-Z]+" title="Enter a valid name"  name="last_name" class="form-control" value="" required/></td>
                            
                </tr>
				
<!--				<tr>-->
<!--                    <td align="style="justify"><strong >&nbsp;&nbsp;Date of birth</strong></td>-->
<!--                    <td>-->
<!--					<input type="date" class="form-control" name="dob" data-date-inline-picker="true" /></td>-->
<!--                            -->
<!--                </tr>-->
				
				<tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Gender</strong></td>
                    <td>
  <input type="radio" name="gender" value="male"> Male
  <input type="radio" name="gender" value="female"> Female<br>
</td>
                    </tr>
                <tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Contact Number</strong></td>
                    
					<td><input type="text" pattern="\d{10}" title="Enter a valid contact number" name="contact" class="form-control" value="" required/></td>
                            
                </tr>
            </tbody>
                  </table>
				  
                </div><div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Are you sure you want to continue?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-md" > OK</button>
                </div>
            </div>
        </div>
    </div>
        <button class="btn btn-default" data-href="/delete.php?id=54" data-toggle="modal" data-target="#confirm-delete">
        Submit
    </button>
                    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>
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