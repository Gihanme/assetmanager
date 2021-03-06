<?php
include "function.php";
if (!isset($_SESSION['user_details'])){
    header("location:login.php");
    exit();
}

$log = new FAssetClerk();
$user_details = $_SESSION['user_details'];
$level = $log->retrieve_user_level_name($user_details['user_level']);
$first_name = $user_details['first_name'];
$last_name = $user_details['last_name'];
$division = $user_details['division'];
$level = $user_details['user_level'];




$res = $log->retrieve_deniedAssets();

$log->refresh_assets();


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


                            <?php if (($user_details['user_level'] == 'asset_clerk')){
                                echo '<li><a href="assetclerk.php"><i class="fa fa-home"></i> Home </span></a></li>';
                            }
                            else{
                                if (($user_details['user_level'] == 'bursar')){
                                    echo '<li><a href="bursar.php"><i class="fa fa-home"></i> Home </span></a></li>';
                                }
                                else{
                                    echo '<li><a href="diviassetclerk.php"><i class="fa fa-home"></i> Home </span></a></li>';

                                }
                            }
                            ?>
                            <?php if (($user_details['user_level'] == 'asset_clerk')){
                                echo '<li><a href="addasset.php"><i class="fa fa-desktop"></i> Add Asset </span></a></li>';
                            }?>
                            <li><a href="viewasset.php"><i class="fa fa-eye"></i> View Asset </span></a></li>
                            <li><a href="deniedAssets.php"><i class="fa fa-check-square-o"></i> Denied Assets </span></a></li>
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
                                <!--img src="images/img.jpg" alt=""--><?php echo "$first_name $last_name";?>
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
                <div class="clearfix"></div>

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2> View Denied Assets </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="" method="post" name="">
                                    <table id="datatable" class="table table-striped table-bordered">

                                        <thead>
                                        <?php
                                        if (($user_details['user_level'] !== 'asset_clerk')){
                                            echo '<th align="style="justify"></th>';
                                        }
                                        ?>

                                        <th align="style="justify"><strong >&nbsp;&nbsp;Asset Name </strong></th>
                                        <th align="style="justify"><strong >&nbsp;&nbsp;Barcode No </strong></th>
                                        <th align="style="justify"><strong >&nbsp;&nbsp;Serial No </strong></th>
                                        <th align="style="justify"><strong >&nbsp;&nbsp;Asset Code </strong></th>
                                        <th align="style="justify"><strong >&nbsp;&nbsp;Division </strong></th>
                                        <th align="style="justify"><strong >&nbsp;&nbsp;Room </strong></th>
                                        <th align="style="justify"><strong >&nbsp;&nbsp;Reason for Denial </strong></th>
                                        <th align="style="justify"><strong >&nbsp;&nbsp;  </strong></th>

                                        </thead>


                                        <tbody>

                                        <?php
                                        while ($array = $res->fetch_assoc()){
                                            $str = "";
                                            if (($user_details['user_level'] != 'asset_clerk')){
                                                $str = '<td><input type="checkbox" name="assets[]" class="check" id="assets[]" value="'.$array['Asset_ID'].'"></td>';
                                            }
                                            echo '<tr>'. $str
                                                . '<td><label>'.$array['Asset_Name'].'</label></td>'
                                                . '<td><label>'.$array['Barcode_No'].'</label></td>'
                                                . '<td><label>'.$array['Serial_No'].'</label></td>'
                                                . '<td><label>'.$array['Asset_Code'].'</label></td>'
                                                . '<td><label>'.$array['Current_Division'].'</label></td>'
                                                . '<td><label>'.$array['Current_Room'].'</label></td>'
                                                . '<td><label>'.$array['Deny_message'].'</label></td>'
                                                . '<td><a href="asset_details.php?id='.$array['Asset_ID'].'">View</a></td>'
                                                . '';
                                        }
                                        ?>


                                        </tbody>
                                    </table>
                                    <script>
                                        $('#checkall').click(function (){
                                            $(".check").prop('checked', $(this).prop('checked'));
                                        })
                                    </script>

                                    <?php
                                    if ($level == 'div_asset_clerk' ){
                                        echo '<button type="submit" formaction="move_asset.php">Move</button>';}
                                    if($level == 'dp_registrar'){
                                        echo'<button type="submit"  formaction="delete_asset.php">Remove</button>';

                                    }
                                    ?>

                                </form>
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
<script>
    $("#checkAll").click(function () {
        $(".check").prop('checked', $(this).prop('checked'));
    });
</script>
</body>

</html>
