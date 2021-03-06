<?php
require_once("function.php");
$log = new FAssetClerk();
require_once 'conection.php';
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
               <li><a href="sysadmin.php"><i class="fa fa-home"></i>  Home </span></a></li>		
                <li><a href="createuser.php"><i class="fa fa-user-plus"></i> Create User </span></a></li>
                <li><a href="userDetails.php"><i class="fa fa-user"></i> View Users </span></a></li>
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
                        <h2> User Details</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    </div>
                    <form name="editDivision" method="POST" action="editDivision.php">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Email Address</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Division</th>
                                <th>Role</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                            </thead>


                            <tbody>


                            <?php
                            mysqli_select_db($conn, "ams");
                            $sql = "SELECT `user_id`,`user_email`,`first_name`, `last_name`, `division`, user_level FROM `user` ";
                            $result= $conn->query($sql);

                            //47
                            //\1 1echo implode($data);
                            ?>
                            <tr class="success">
                                <?php
                                if($result->num_rows > 0){
                                    $i = 1;
                                    while($row= $result->fetch_assoc()){
                                        echo "<tr><td>".$row["user_email"]."</td>"."<td>".$row["first_name"]."</td>"."<td>".$row["last_name"]."</td>"."<td>".$row["division"]."</td><td>".$row['user_level']."</td>";
                                        echo ("<td><a class='btn btn-primary' href='editUser.php?user_id=".$row['user_id']."'><i class='icon-ok'></i>Edit</a></td>");
                                        // echo "<td><a href='editDivision.php?Division_Code=".$row['Division_Code']."'>Edit</a></td>";
                                        echo ("<td><button class='btn btn-danger' data-toggle='modal' data-target='#myModal$i'><i class='icon-warning-sign'></i>
                                             Delete</a></button></td> </tr>");
                                        echo "<div class='modal fade' id='myModal$i' role='dialog'>
                            <div class='modal-dialog modal-m'>
                            <div class='modal-content'>
                            <div class='modal-body' style='background-color:black'>
                            <p align='center'> <font size='6' color='white' >  Are you sure to delete this user?</font></p>
                            </div>
                            <div class='modal-footer' style='background-color:black'>
                            <button type='button' class='btn btn-info btn-lg' id='fire'><a href='deleteUser.php?user_id=".$row['user_id']."'>  Ok </a></button>
                            <button type='button' class='btn btn-danger btn-lg' data-dismiss='modal'>Cancel</button>
                            </div>
                            </div>
                            </div>
                            </div>" ;
                                        $i++;
                                    }
                                }else{
                                    echo "0 results";
                                }
                                ?>
                            </tbody>

                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->

        <!-- /footer content -->
        </table>
                        </div>
      </div>
    </div>
  </div>
</div>
<footer>
            <div class="pull-right">
                UCSC Asset Management System
            </div>
            <div class="clearfix"></div>
        </footer>
</div></div>
        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        
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