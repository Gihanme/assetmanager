<!DOCTYPE html>
<?php include 'function.php';
$log = new FAssetClerk();
$user_details = $_SESSION['user_details']; $level = $log->retrieve_user_level_name($user_details['user_level']);
$first_name = $user_details['first_name'];
$last_name = $user_details['last_name'];
$division = $user_details['division'];
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AMS</title>
    
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

<header id="header">
        <div class="top-bar" style="padding-top: 0px;">
            <div class="container">
             
            </div><!--/.container-->
        </div><!--/.top-bar-->
        
        <nav class="navbar navbar-inverse" role="banner" style="padding-top: 8px; height: 80px">
            <div class="container" style="height: 60px;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png " alt="logo" style="width: 50px;"></a>
                </div>

                <div class="collapse navbar-collapse navbar-right" style="padding-right: 0px;">
                   <!-- <li style="height: 30px;">-->
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <!-- <img src="images/img.jpg" class="img-circle profile_img" alt="" style="width: 50px;"></br> -->
                  <div class="profile_info">
                    <h style="height: 10px;"><?php echo "$first_name $last_name";?></h>               <span>(<?php echo "$level";?>)</span>
                </div>
                </a>
              </li>

                    <ul class="nav navbar-nav">
                        <li><a href="logout.php"  class="btn btn-success btn-md" style="padding-top: 3px; padding-bottom: 3px;">Log Out</a></li>
                    </ul>
                </div>
                
                       
                       </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->

    <section id="feature" class="transparent-bg" style="padding-bottom: 127px; padding-top: 80px;">
        <div class="container">
           <!-- <div class="center wow fadeInDown">
               <h2>University Of Colombo School Of Computing</h2>
                <p class="lead">Asset Management System</p> 
            </div>-->

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <a href="addasset.php"><div class="feature-wrap">
                            <i class="fa fa-desktop"></i>
                            <h2>Add Asset</h2>
                            <h3>Add New asset to the system</h3>
                        </div>
                         </a>
                    </div><!--/.col-md-4-->
                    
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <a href="viewasset.php"><div class="feature-wrap">
                            <i class="fa fa-eye"></i>
                            <h2>View Assets</h2>
                            <h3>view the status of assets </h3>
                        </div>
                        </a>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <a href="deniedAssets.php"><div class="feature-wrap">
                                <i class="fa fa-check-square-o"></i>
                                <h2>Denied Assets</h2>
                                <h3>view denied assets</h3>
                            </div>
                        </a>
                    </div><!--/.col-md-4-->
                    
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" style="padding-top: 20px;">
                        <a href="reports.php"><div class="feature-wrap">
                            <i class="fa fa-book"></i>
                            <h2>View Reports</h2>
                            <h3>view reports with regard to assets</h3>
                        </div>
                        </a>
                    </div><!--/.col-md-4-->
                    
                    <br><br><br><br><br><br><br><br><br><br><br><br>
                   
                    
                    
                </div><!--/.services-->
            </div><!--/.row--> 


                   

        </div><!--/.container-->
    </section><!--/#feature-->


   

    <footer id="footer" class="midnight-blue" style=" padding-top: 15px;  padding-bottom: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2017 UCSC All Rights Reserved.
                </div>
                
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>