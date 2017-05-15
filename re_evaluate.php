<?php

require_once("function.php");
$log = new FAssetClerk();
$user_details = $_SESSION['user_details']; $level = $log->retrieve_user_level_name($user_details['user_level']);
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
else{
    header("location:board_of_survey_report_2.php");
    exit();
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

</head>

<body class="nav-md">
    <div class="x_panel">
        <div class="main_container">
      <!-- top navigation -->
        <div class="">  
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                  <h1><link rel="stylesheet" type="text/css" media="print" href="print.css"></h1>  
                <div class="col-md-12">
                <h2>Assets Needed to be checked for re-valuation </h2>
                </div>
                  <div class="col-md-2">
                  <h2>Division Name:<?php echo $division;?></h2>
                  <div class="clearfix"></div>
                </div>
                  <div class="col-md-4">
                  <h2>Room Name:<?php echo $room;?></h2>
                  <div class="clearfix"></div>
                </div>
                  <br>
                  <div class="col-md-12">
                  <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print Report</button>
                                  <script>
                                      function myFunction() {
                                      window.print();}
                                  </script>
                  </div>
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
                            $data2 = $log->get_full_depr_asset($division, $room, $year);
                            while ($row = $data2->fetch_assoc()){
                                echo "<tr>"
                                        . "<td>".$row['Barcode_No']."</td>"
                                        . "<td>".$row['Asset_Name']."</td>"
                                        . "<td>".$row['Current_Room']."</td>"
                                        . "<td>".$row['Asset_Code']."</td>"
                                        . "<td>".$row['Current_Value']."</td>"
                                        . "<td>".$row['Price']."</td>"
                                        . "<td><a href='reevaluate.php?id=".$row['Asset_ID']."&year=$year'>Re-Value</a></td>"
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
            <!-- /page content -->

            <!-- footer content -->
            
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

