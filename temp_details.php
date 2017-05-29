<?php
require_once("function.php");
$log = new FAssetClerk();

$user_details = $_SESSION['user_details']; $level = $log->retrieve_user_level_name($user_details['user_level']);
$first_name = $user_details['first_name'];
$last_name = $user_details['last_name'];
/*
if ($user_details['user_level'] != "system_admin"){
    header("location:login.php");
    
}*/

$temp_id = $_GET['id'];

$temp_res= $log->retrieve_temp_asset($temp_id);
$temp_details= $temp_res->fetch_assoc();
$temp_name=$temp_details['Asset_Name'];
$Asset_type = $temp_details['Asset_type'];
$Asset_Cat = $temp_details['Asset_Category'];
$room = $temp_details['Room'];
$temp_search= $log->search_asset_temp($temp_name, $Asset_type, $Asset_Cat);
$types = $log->retrieve_assettypes();
$cats = $log->retrieve_assetcats();
$resolved = $temp_details['Asset_Resolved'];
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
                    <div class="x_title">
                        <h2>Temporary Asset Details</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                    <thead>  
                    </thead>
                    <tbody>
                        
                        
                        <tr id="singleView">
                            <td align="style="justify><strong>&nbsp;&nbsp; Asset Name </strong></td>
                            <td><p><?php echo $temp_name;?></p></td>
                        </tr>
                        
                        <tr>
                            <td align="style="justify><strong >&nbsp;&nbsp;Room  </strong></td>
                            <td><p><?php echo $room;?></p></td>
                        </tr>
                        <tr>
                            <td align="style="justify><strong >&nbsp;&nbsp;Asset Type</strong></td>
                            <td><p><?php while($typ = $types->fetch_assoc()){
                                    if ($Asset_type == $typ['asset_type_id']){
                                        echo $typ['asset_type'];                                
                                    }
                                    else{
                                         echo "<option value='".$typ['asset_type_id']."'>".$typ['asset_type']."</option>";
                                    }
                                }?></p></td>
                        </tr>
                        <tr>
                            <td align="style="justify><strong >&nbsp;&nbsp;Asset Category </strong></td>
                            <td><p><?php
                                while($cate = $cats->fetch_assoc()){
                                    if ($Asset_Cat== $cate['asset_category_id']){
                                        echo $cate['asset_category'];                                
                                    }
                                    
                                    else{
                                         
                                    }
                                }?></p></td>
                        </tr>
                        
                        
                      	
                    </tbody>
                  </table>
                        <br>
                        
                    </div>
                    <div class="x_title" <?php if($resolved == 1){ echo "style='display: none'"; }?>>
                        <h2>Matched Assets</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div  class="x_content" <?php if($resolved == 1){ echo "style='display: none'"; }?>> 
                        <table id="datatable2" class="table table-striped table-bordered" >
                            <thead>
                            <th>Asset Code</th>
                            <th>Division</th>
                            <th>Room</th>
                            <th>Model No</th>
                            <th>Image</th>
                            <th>Check</th>
                            </thead>
                            <tbody>
                                <?php 
                                while ($row = $temp_search->fetch_assoc()){
                                    $str = "";
                                    $photo_list = $log->get_photo($row['Asset_ID']);
                                    if ($photo_list->num_rows > 0){
                                        $photo = $photo_list->fetch_assoc();
                                        
                                        
                                    }
                                    
                                    
                                    echo "<tr>
                                    <td>".$row['Asset_Code']."</td>
                                    <td>".$row['Current_Division']."</td>
                                    <td>".$row['Current_Room']."</td>
                                    <td>".$row['Model_No']."</td>
                                    <td>$str</td>
                                    <td><a href='temp_resolve.php?temp=$temp_id&real=".$row['Asset_ID']."'>Accept</button></td>
                                </tr>";
                                }
                                
                                ?>
                                
                            </tbody>
                        </table>
                        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="image-gallery-title"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <img id="image-gallery-image" class="img-responsive" src="">
                                        </div>
                                        <div class="modal-footer">

                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-primary" id="show-previous-image">Previous</button>
                                            </div>

                                            <div class="col-md-8 text-justify" id="image-gallery-caption">
                                                This text will be overwritten by jQuery
                                            </div>

                                            <div class="col-md-2">
                                                <button type="button" id="show-next-image" class="btn btn-default">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <script>
                                    $(document).ready(function(){

                                loadGallery(true, 'a.thumbnail');

                                //This function disables buttons when needed
                                function disableButtons(counter_max, counter_current){
                                    $('#show-previous-image, #show-next-image').show();
                                    if(counter_max == counter_current){
                                        $('#show-next-image').hide();
                                    } else if (counter_current == 1){
                                        $('#show-previous-image').hide();
                                    }
                                }

                                /**
                                 *
                                 * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
                                 * @param setClickAttr  Sets the attribute for the click handler.
                                 */

                                function loadGallery(setIDs, setClickAttr){
                                    var current_image,
                                        selector,
                                        counter = 0;

                                    $('#show-next-image, #show-previous-image').click(function(){
                                        if($(this).attr('id') == 'show-previous-image'){
                                            current_image--;
                                        } else {
                                            current_image++;
                                        }

                                        selector = $('[data-image-id="' + current_image + '"]');
                                        updateGallery(selector);
                                    });

                                    function updateGallery(selector) {
                                        var $sel = selector;
                                        current_image = $sel.data('image-id');
                                        $('#image-gallery-caption').text($sel.data('caption'));
                                        $('#image-gallery-title').text($sel.data('title'));
                                        $('#image-gallery-image').attr('src', $sel.data('image'));
                                        disableButtons(counter, $sel.data('image-id'));
                                    }

                                    if(setIDs == true){
                                        $('[data-image-id]').each(function(){
                                            counter++;
                                            $(this).attr('data-image-id',counter);
                                        });
                                    }
                                    $(setClickAttr).on('click',function(){
                                        updateGallery($(this));
                                    });
                                }
                            });
                                    </script>
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