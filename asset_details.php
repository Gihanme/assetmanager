<?php 
 include "function.php"; 
 if (!isset($_SESSION['user_details'])){     header("location:login.php");     exit(); }
$log = new FAssetClerk();
//check asset clerk has login

$user_details = $_SESSION['user_details']; $level = $log->retrieve_user_level_name($user_details['user_level']);
$first_name = $user_details['first_name'];
$last_name = $user_details['last_name'];


if (isset($_GET['id'])){
  
    $asset = $log->view_asset($_GET['id']);
    $asset_data = $asset->fetch_assoc();    
}   
else{
    header("Location:viewasset.php");
    exit();
}


$divisions = $log->retrieve_division();
$rooms = $log->retrieve_room();
$types = $log->retrieve_assettypes();
$cats = $log->retrieve_assetcats();
$pics = $log->retrieve_assetpics($_GET['id']);

//check if post request sent to page
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    
    $filepath = 'asset_images';
    if (!file_exists($filepath)){
        mkdir($filepath);
    }
    $filepath = $filepath."/$id";
    if (!file_exists($filepath)){
        mkdir($filepath);
    }
    if (!empty($_FILES)){
        foreach ($_FILES['photo']['tmp_name'] as $key=>$tmp_name){
            $photo_name = $_FILES['photo']['name'][$key];
            $photo = $_FILES['photo']['tmp_name'][$key];
            $target = $filepath."/".$photo_name;
            move_uploaded_file($_FILES['photo']['tmp_name'][$key], $target);
            $log->add_photo($id, $photo_name, $target);
        } 
    }
    
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
                    <script src="galleria/galleria-1.4.2.min.js"></script>
  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="styleshewt">

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
                                <?php if (($user_details['user_level'] == 'div_asset_clerk')){
                                    echo '<li><a href="verify_asset.php"><i class="fa fa-eye"></i> Verify Asset </span></a></li>';
                                }?>
				
				
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
                  <img src="images/img.jpg" alt=""><?php echo "$first_name $last_name";?>
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
                  <h2>View Asset </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      
                    </thead>


                    <tbody>
                    
                <tr>
                    <input hidden name="id" value="<?php echo $asset_data['Asset_ID']?>" >
                    <td align="style="justify"><strong >&nbsp;&nbsp;Asset name </strong></td>
                    <td><input disabled type="text" class="form-control" value="<?php echo $asset_data['Asset_Name']?>" name="name"/></td>
                    
                    <td align="style="justify"><strong >&nbsp;&nbsp;Asset Type </strong></td>
                    <td><select disabled class="form-control" name="type">
                            <option value="NULL"></option>
                            <?php 
                                while($typ = $types->fetch_assoc()){
                                    if ($asset_data['Asset_type'] == $typ['asset_type_id']){
                                        echo "<option value='".$typ['asset_type_id']."' selected='selected'>".$typ['asset_type']."</option>";                                
                                    }
                                    else{
                                         echo "<option value='".$typ['asset_type_id']."'>".$typ['asset_type']."</option>";
                                    }
                                }?>
                        </select></td>   
                </tr>
				
				<tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Model Number </strong></td>
                    <td><input disabled type="text" class="form-control" value="<?php echo $asset_data['Model_No']?>" name="model"/></td>
                    
                    <td align="style="justify"><strong >&nbsp;&nbsp;Item Category </strong></td>
                    <td>
                        <select disabled class="form-control" name="category">
                            <option value="NULL"></option>
                            <?php 
                                while($cate = $cats->fetch_assoc()){
                                    if ($asset_data['Asset_Category'] == $cate['asset_category_id']){
                                        echo "<option value='".$cate['asset_category_id']."' selected='selected'>".$cate['asset_category']."</option>";                                
                                    }
                                    
                                    else{
                                         echo "<option value='".$cate['asset_category_id']."'>".$cate['asset_category']."</option>";
                                    }
                                }?>
                        </select>
                    </td>  
                </tr>
				
				<tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Barcode No </strong></td>
                    <td><input disabled type="text" class="form-control" value="<?php echo $asset_data['Barcode_No']?>" name="barcode"/></td>
                   <!-- 
                    <td align="style="justify"><strong >&nbsp;&nbsp;Asset Code</strong></td>
                    <td><input type="text" class="form-control" value="" disabled="true"/></td>   
                </tr>
			-->	
				<tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Serial No </strong></td>
                    <td><input disabled type="text" class="form-control" value="<?php echo $asset_data['Serial_No']?>" name="serial"/></td>
                    
                    <td align="style="justify"><strong >&nbsp;&nbsp;Brand </strong></td>
                    <td><input disabled type="text" class="form-control" value="<?php echo $asset_data['Brand']?>" name="brand"/></td>   
                </tr>
				
				<tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Vendor </strong></td>
                    <td><input disabled type="text" class="form-control" value="<?php echo $asset_data['Vendor']?>" name="vendor"/></td>
                    
                    <td align="style="justify"><strong >&nbsp;&nbsp;Vendor Address</strong></td>
                    <td><input disabled type="text" class="form-control" value="<?php echo $asset_data['Vendor_Address']?>" name="vendor_add"/></td>
                    
                       
                </tr>
				
				<tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Division</strong></td>
                    <td><select disabled class="form-control" name="division" disabled>
                            <option value="NULL"></option>
                            <?php 
                                while($div = $divisions->fetch_assoc()){
                                    if ($asset_data['Current_Division'] == $div['Division_Code']){
                                        echo "<option value='".$div['Division_Code']."' selected='selected'>".$div['Division_Name']."</option>";                                
                                    }
                                    else{
                                         echo "<option value='".$div['Division_Code']."'>".$div['Division_Name']."</option>";
                                    }
                                }?>
                        </select></td> 
                    
                    <td align="style="justify"><strong >&nbsp;&nbsp;Room </strong></td>
                    <td><select disabled class="form-control" name="room" disabled>
                            <option value="NULL"></option>
                            <?php 
                                while($div = $rooms->fetch_assoc()){
                                    if ($asset_data['Current_Room'] == $div['Room_code']){
                                        echo "<option value='".$div['Room_code']."' selected='selected'>".$div['Room_name']."</option>";                                
                                    }
                                    else{
                                          echo "<option value='".$div['Room_code']."'>".$div['Room_name']."</option>";
                                    }
                                   
                                }?>
                        </select></td>   
                </tr>
				
				<tr>
                    
					
					<td align="style="justify"><strong >&nbsp;&nbsp; Cost </strong></td>
                    <td><input type="text" disabled class="form-control" value="<?php echo $asset_data['Price']?>" name="price"/></td>
                    
                      
                </tr>
				
								
				<tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp; Current Value </strong></td>
                    <td><input type="text" class="form-control" value="<?php echo $asset_data['Current_Value']?>" disabled/></td>
                    
                    <td align="style="justify"><strong >&nbsp;&nbsp;Depreciation </strong></td>
                    <td><input disabled type="text" class="form-control" value="<?php echo $asset_data['Depreciation']?>" name="deprec"/></td>
							
                
				</tr>
                                <tr><td align="style="justify"><strong >&nbsp;&nbsp;Warranty Period  </strong></td>
                    <td><input disabled type="text" class="form-control" value="<?php echo $asset_data['Purchase_Date']." - ".$asset_data['Warranty_End']?>" name="warranty"/></td></tr>
				
                    	
            </tbody>
                  </table>
                  
                    
                    
                </div>
                    
                    <style>
                        .galleria{ width: 700px; height: 400px; background: #000 }
                    </style>
                   <h2>Movement History</h2>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>Old Division</th>
                            <th>Old Room</th>
                            <th>New Division</th>
                            <th>New Room</th>
                            <th>Move Date</th>
                            <th>Verified Date</th>
                            </thead>
                            <tr>
                                <?php 
                                $move = $log->retrieve_asset_movement($_GET['id']);
                                while($mov = $move->fetch_assoc()){
                                    echo "<tr><td>".$mov['old_division']."</td>"
                                            . "<td>".$mov['old_room']."</td>"
                                            . "<td>".$mov['new_division']."</td>"
                                            . "<td>".$mov['new_room']."</td>"
                
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            . "<td>".$mov['move_date']."</td>"
                                            . "<td>".$mov['verify_date']."</td></tr>";
                                }
                                ?>
                            </tr>
                        </table>  
                  <div id="images">
                      <h2>Image Gallery</h2><br>
                      
                                 </div>
                                    <?php 

                                        while ($photo = $pics->fetch_assoc()){
                                            echo '<div class="col-lg-1 col-md-1 col-xs-1 ">
                                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="" data-caption="" data-image="'.$photo['photo_path'].'" data-target="#image-gallery">
                                                    <img  src="'.$photo['photo_path'].'" alt="Short alt text">
                                                </a>
                                            </div>';

                                            }
                                    ?>
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
                                    <br><br>
                                    <div>
                      <!--<form name="photo_upload" action="" method="post" enctype="multipart/form-data" >
                        <input type="file" accept="image/*" name="photo[]" multiple/><br>
                        <input hidden name="id" value="<?php echo $asset_data['Asset_ID']?>" >
                        <input type="submit">
                      </form>-->
                     
                                    
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
