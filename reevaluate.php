<?php
require_once("function.php");
$log = new FAssetClerk();

$user_details = $_SESSION['user_details']; $level = $log->retrieve_user_level_name($user_details['user_level']);
$first_name = $user_details['first_name'];
$last_name = $user_details['last_name'];

if ($user_details['user_level'] != "system_admin"){
    header("location:login.php");
    
}
$asset_id = $_GET['id'];
$year = $_GET['year'];

$details = $log->view_asset($asset_id);
$asset_data = $details->fetch_assoc();  
$barcode = $asset_data['Barcode_No'];
$asset_Name = $asset_data['Asset_Name'];
$asset_room = $asset_data['Current_Room'];
$asset_cat = $asset_data['Asset_Category'];
$asset_type = $asset_data['Asset_type'];




$deprec = $log->retrieve_depreciation($barcode, $year);

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



                    <li><a href="diviassetclerck.php"><i class="fa fa-home"></i> Home </span></a></li>
                    <li><a href="createuser.php"><i class="fa fa-building"></i> Create User</span></a></li>



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
                                        add a asset to the system
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
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Re-evaluate Assets</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                    <thead>  
                    </thead>
                    <tbody>
                        
                        
                        <tr id="singleView">
                            <td align="style="justify><strong>&nbsp;&nbsp; Asset Name </strong></td>
                            <td><p><?php echo $asset_Name ;?></p></td>
                        </tr>
                        
                        <tr>
                            <td align="style="justify><strong >&nbsp;&nbsp;Room  </strong></td>
                            <td><p><?php echo $asset_room;?></p></td>
                        </tr>
                        <tr>
                            <td align="style="justify><strong >&nbsp;&nbsp;Asset Type</strong></td>
                            <td><p><?php echo $asset_type;?></p></td>
                        </tr>
                        <tr>
                            <td align="style="justify><strong >&nbsp;&nbsp;Asset Category </strong></td>
                            <td><p><?php echo $asset_cat; ?></p></td>
                        </tr>
                        
                        
                      	
                    </tbody>
                  </table>
                        <br>
                        
                    </div>
                    <div class="x_title" >
                        <h2>Depreciation</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div  class="x_content" > 
                        <table id="datatable2" class="table table-striped table-bordered" >
                            <thead>
                                
                                 <th>Previous Value</th>
                                 <th>New Value</th>
                                 <th>Date</th>  
                            </thead>
                            <tbody>
                                <?php
                                 while ($row = $deprec->fetch_assoc()){
                                     echo "<tr>
                                    
                                        <td>Rs. ".$row['Previous_Value']."</td>
                                        <td>Rs. ".$row['New_Value']."</td>
                                        <td>".$row['date(Date)']."</td>
                                    </tr>";
                                 }
                                ?>
                                
                                
                            </tbody>
                        </table>
                        
                        
                        
                        <form class="form-group" action="evalaction.php" method="post" >
                            <table class="table table-striped table-bordered" >
                                <thead></thead>
                                <tbody>
                                    <tr ><td><label>Re-Evaluate?</label></td><td><input id="eval" type="checkbox" onclick="view_change();" required ></td></tr>
                                <input hidden name="id" value="<?php echo $asset_id; ?>">
                                    <tr id="row1" style="display: none"><td><label>New Value</label></td><td><input type="number" min="0" name="newval"></td></tr>
                                    <tr id="row2" style="display: none"><td><label>Depreciation</label></td><td><input type="number" min="0" step="any" max="1" name="depre"></td></tr>
                                </tbody>
                            </table>
                            <input type="submit">
                            <script>
                                function view_change(){
                                    var check = document.getElementById("eval").checked;
                                    var view1 = document.getElementById("row1");
                                    var view2 = document.getElementById("row2");
                                    
                                    if (check == true){
                                        view1.style.display = "table-row";
                                        view2.style.display = "table-row";
                                    }
                                    else{
                                        view1.style.display = "none";
                                        view2.style.display = "none";}
                                }
                            </script>
                        </form>
                    </div>
                        
                        
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->

        <!-- /footer content -->
        

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <footer>
            <div class="pull-right">
                UCSC Asset Management System
            </div>
            <div class="clearfix"></div>
        </footer>
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