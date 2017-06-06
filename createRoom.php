<?php
 include "function.php"; if (!isset($_SESSION['user_details'])){     header("location:login.php");     exit(); }
 
 
 $log = new FAssetClerk();
 $user_details = $_SESSION['user_details']; $level = $log->retrieve_user_level_name($user_details['user_level']);
$first_name = $user_details['first_name'];
$last_name = $user_details['last_name'];
/*
if ($user_details['user_level'] != "system_admin"){
    header("location:login.php");
    
}*/


$divisions = $log->retrieve_division();
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $deprec = $_POST['division'];
    $error = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
     <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>  
	  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
	  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
	  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>


<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
 
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
                  <h2><?php echo $first_name;?></h2><span>(<?php echo $level;?>)</span>
                </div>
            </div>
          <!-- /menu prile quick info -->
          <br><br><br><br><br>
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
                 <?php echo $first_name;?>
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
                                        add an asset type to the system
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
           <div class="page-title">
			
          </div>
        <form name="createUserType" id="createUserType" method="post" data-toggle="validator"  action="roomsubmit.php">  
            <div class="clearfix"></div>
            <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> Create Room</h2>
                  <div class="clearfix"></div>
                </div>
                  <div class="x_content">
                      <script>
                          function view_change(){
                          var multiView = document.getElementById("multiple").checked;
                          var multi = document.getElementById("multiView");
                          var single = document.getElementById("singleView");
                          var singleIn = document.getElementById("room_code");
                          var multiIn = document.getElementById("room_codes");
                          if (multiView){
                              multi.style.display="table-row";
                              single.style.display="none";
                              singleIn.required = false;
                              multiIn.required = true;
                          }
                          else{
                              multi.style.display="none";
                              single.style.display="table-row";
                              singleIn.required = true;
                              multiIn.required = false;
                          }
                      }
                          
                      </script>
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>  
                    </thead>
                    <tbody>
                        <tr>
                            <td align="style="justify><strong>&nbsp;&nbsp;Division </strong></td>
                            <td><select class="form-control" name="division">
                                    <?php 
                                        while($div = $divisions->fetch_assoc()){
                                            echo "<option value='".$div['Division_Code']."'>".$div['Division_Name']."</option>";
                                        }?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="style="justify><strong>&nbsp;&nbsp;Multiple Rooms?</strong></td>
                            <td><input id="multiple" class="form-control" name="multiple" type="checkbox" onclick="view_change()"></td>
                        </tr>
                        <tr style="display: none;" id="multiView">
                            <td align="style="justify ><strong>Room Codes</strong></td>
                            <td><textarea  id="room_codes" name="multinput" class="form-control" placeholder="Type the room codes separated by commas"></textarea></td>
                        </tr>
                        <tr id="singleView">
                            <td align="style="justify><strong>&nbsp;&nbsp; Room Code </strong></td>
                            <td><input type="text" placeholder="W003"  name="room_code" id="room_code" class="form-control" value="" required/></td>
                        </tr>
                        
                        <tr>
                            <td align="style="justify><strong >&nbsp;&nbsp;Room Name </strong></td>
                            <td><input type="text" name="room_name" placeholder="LAB A" id="room_name" class="form-control" value="" required/></td>
                        </tr>
                        <tr>
                            <td align="style="justify><strong >&nbsp;&nbsp;Wing </strong></td>
                            <td><select name="wing" class="form-control">
                                    <option value="East">East Wing</option>
                                    <option value="West">West Wing</option>
                                    <option value="South">South Wing</option>
                                    <option value="North">North Wing</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td align="style="justify><strong >&nbsp;&nbsp;Floor </strong></td>
                            <td><select name="floor" class="form-control">
                                    <option value="Ground">Ground Floor</option>
                                    <option value="First">First Floor</option>
                                    <option value="Second">Second Floor</option>
                                    <option value="Third">Third Floor</option>
                                    <option value="Fourth">Fourth Floor</option>
                                    <option value="Fifth">Fifth Floor</option>
                                </select>
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td align="style="justify><strong >&nbsp;&nbsp;Room Description </strong></td>
                            <td><input type="text" name="room_description" id="room_description" class="form-control" value=""/></td>
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
            </div>        <!-- footer content -->
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
