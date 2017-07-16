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
 <div class="top-bar">
            <div class="container">
             
            </div><!--/.container-->
        </div><!--/.top-bar-->       

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo" width="100" height="100"></a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <button class="btn btn-default btn-lg btn-link" style="font-size:36px;"  onclick="window.location.href='inbox.php'">
                        <span class="glyphicon glyphicon-comment"></span>
                        </button>
                        <span class="badge badge-notify"><?php echo $log->count_message($division);?></span>
                        <style>
                                      /* CSS used here will be applied after bootstrap.css */
                                .badge-notify{
                                   background:red;
                                   position:relative;
                                   top: -20px;
                                   left: -35px;
                                  }
                        </style>
                       <!-- <li class="active"><a href="services.html">Services</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-item.html">Blog Single</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="shortcodes.html">Shortcodes</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">Blog</a></li> 
                        <li><a href="contact-us.html">Contact</a></li>   -->                     
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->

    <section id="feature" class="transparent-bg">
        <div class="container">
           <!-- <div class="center wow fadeInDown">
               <h2>University Of Colombo School Of Computing</h2>
                <p class="lead">Asset Management System</p> 
            </div>-->

            <div class="row">
                <div class="features">
                    
					
					<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <a href="viewasset.php"><div class="feature-wrap">
                            <i class="fa fa-eye"></i>
                            <h2>View Assets</h2>
                            <h3>view the status of assets </h3>
                        </div>
						</a>
                    </div><!--/.col-md-4-->
				
					
									
					<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <a href="reports.php"><div class="feature-wrap">
                            <i class="fa fa-book"></i>
                            <h2>View Reports</h2>
                            <h3>view reports with regard to assets</h3>
                        </div>
						</a>
                    </div><!--/.col-md-4-->
			
					
					<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                            <a href="confirm_asset.php"><div class="feature-wrap">
                            <i class="fa fa-check-square-o"></i>
                            <h2>Confirm Assets</h2>
                            <h3>Confirm new assets which are taken into the division </h3>
                        </div>
						</a>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                            <a href="inbox.php"><div class="feature-wrap">
                            <i class="fa fa-envelope-o"></i>
                            <h2>Check Inbox</h2>
                            <h3>Send messages to another division</h3>
                        </div>
						</a>
                    </div><!--/.col-md-4-->
				
					
					
						</a>
                    </div><!--/.col-md-4-->
			    
					
					
					
				<!--	<div class="col-md-4S col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                            <a href="viewasset.php"><div class="feature-wrap">
                            <i class="fa fa-exchange"></i>
                            <h2>Transfer sset</h2>
                            <h3>Transfer the assets from  department to another.</h3>
                        </div>
						</a>
                    </div><!--/.col-md-4-->
					
					<br><br><br><br><br><br><br><br><br><br><br><br>
                   
					
					
                </div><!--/.services-->
            </div><!--/.row--> 


                   

        </div><!--/.container-->
    </section><!--/#feature-->


   

    <footer id="footer" class="midnight-blue">
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