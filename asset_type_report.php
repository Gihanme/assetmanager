<?php
require 'function.php';

require_once("conection.php");
$log = new FAssetClerk();
$user_details = $_SESSION['user_details']; $level = $log->retrieve_user_level_name($user_details['user_level']);
$first_name = $user_details['first_name'];
$last_name = $user_details['last_name'];
$division = $user_details['division'];
if ($user_details['user_level'] != "div_asset_clerk" and $user_details['user_level'] != "asset_clerk" and $user_details['user_level'] != "bursar"){
    header("location:login.php");
    
}

if ($user_details['user_level'] == "div_asset_clerk"){
    $divs = $log->retrieve_division($user_details['division']);
    $typecount = $log->get_asset_type_count($user_details['division']);
    $catcount = $log->get_asset_category_count($user_details['division']);

}
else{
$divs = $log->retrieve_division();
$typecount = $log->get_asset_type_count();
$catcount = $log->get_asset_category_count();
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $Division = $_POST['division'];
    //echo $Division;
    $typecount = $log->get_asset_type_count($Division);
    $catcount = $log->get_asset_category_count($Division);

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
			  
                  <br><br><br><br><br>
                
                  <li><a href="<?php if ($user_details['user_level'] === "div_asset_clerk"){echo 'diviassetclerk.php';}
                  else{if ($user_details['user_level'] === "bursar"){echo 'bursar.php';}
                  else{echo 'assetclerk.php';}}?>"><i class="fa fa-home"></i> Home </span></a></li>
                  <li><a href="asset_movement_report.php"><i class="fa fa-exchange"></i> Asset Movement </span></a></li>
                  <li><a href="asset_type_report.php"><i class="fa fa-bars"></i> Asset Types </span></a></li>

                  <!--?php if (($user_details['user_level'] == 'div_asset_clerk')){
                                    echo '<li><a href="revaluation_report.php"><i class="fa fa-book"></i> Revaluation </span></a></li>';
                                }?-->
				
				
				
				
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
                  <h1>Asset Classification</h1>
                  <br>
                  
                  <div class="clearfix"></div>
                  <div>
                      <form action="" method="post" <?php if($user_details['user_level'] == "div_asset_clerk"){echo "style='display:none'"; }?>>
                      <select name="division"  >
                          <option value=""></option>
                          <?php 
                          
                                while ($div = $divs->fetch_assoc()){
                                    echo "<option value='".$div['Division_Code']."'>".$div['Division_Name']."</option>";
                                }
                          ?>
                      </select>
                          
                          <input type="submit">
                      </form>
                  </div>
                </div>
                  <script src="https://code.highcharts.com"></script>
                  <div>
                      <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script src="https://code.highcharts.com/modules/exporting.js"></script>
                        <div class="row">
                        <div id="container" class="col-lg-6 col-md-3" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                     <script>
                        $(function () {
                            $('#container').highcharts({
                                chart: {
                                    plotBackgroundColor: null,
                                    plotBorderWidth: null,
                                    plotShadow: false,
                                    type: 'pie'
                                },
                                title: {
                                    text: 'Asset Type Classification'
                                },
                                tooltip: {
                                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                },
                                plotOptions: {
                                    pie: {
                                        allowPointSelect: true,
                                        cursor: 'pointer',
                                        dataLabels: {
                                            enabled: true,
                                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                            style: {
                                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                            }
                                        }
                                    }
                                },
                                series: [{
                                    name: 'Types',
                                    colorByPoint: true,
                                    data: [
                                    <?php 
                                    
                                    $j = count($typecount);
                                    $i= 0;
                                    
                                    foreach ($typecount as $key=>$value){
                                        echo "{ name: '$key', y:$value  }";
                                        $i++;
                                        if ($i != $j){
                                            echo ",";
                                        }
                                    }
                                    
                                    ?>
                                    ]
                                }]
                            });
                        });
                     
                     </script>
                     <div id="container1" class="col-lg-6 col-md-3" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                     <script>
                        $(function () {
                            $('#container1').highcharts({
                                chart: {
                                    plotBackgroundColor: null,
                                    plotBorderWidth: null,
                                    plotShadow: false,
                                    type: 'pie'
                                },
                                title: {
                                    text: 'Asset Category Classification'
                                },
                                tooltip: {
                                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                },
                                plotOptions: {
                                    pie: {
                                        allowPointSelect: true,
                                        cursor: 'pointer',
                                        dataLabels: {
                                            enabled: true,
                                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                            style: {
                                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                            }
                                        }
                                    }
                                },
                                series: [{
                                    name: 'Types',
                                    colorByPoint: true,
                                    data: [
                                    <?php 
                                    
                                    $j = count($catcount);
                                    $i= 0;
                                    
                                    foreach ($catcount as $key=>$value){
                                        echo "{ name: '$key', y:$value  }";
                                        $i++;
                                        if ($i != $j){
                                            echo ",";
                                        }
                                    }
                                    
                                    ?>
                                    ]
                                }]
                            });
                        });
                     
                     </script> 
                        </div>                   
                  </div>
                  <div class="container ">
                      <table class="table">
                          <thead>
                              <tr><th>Asset Type</th><th>Count</th></tr>
                          </thead>
                          <tbody>
                              <?php 
                                    foreach($typecount as $type=>$count){
                                        echo "<tr><td>$type</td><td>$count</td></tr>";
                                    }
                              ?>
                          </tbody>
                          
                      </table>
                      
                  </div>
                  <div class="container ">
                      <table class="table">
                          <thead>
                              <tr><th>Asset Category</th><th>Count</th></tr>
                          </thead>
                          <tbody>
                              <?php 
                                    foreach($catcount as $cat=>$count){
                                        echo "<tr><td>$cat</td><td>$count</td></tr>";
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