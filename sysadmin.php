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
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png " alt="logo" style="width: 100px;"></a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" class="img-circle profile_img" alt=""></br>
                  <div class="profile_info">
                    <h2><?php echo "$first_name $last_name";?></h2>               <span>(<?php echo "$level";?>)</span>
                </div>
                </a>
              </li>

                    <ul class="nav navbar-nav">
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </div>
                
                       
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
                        <a href="divisionDetails.php"><div class="feature-wrap">
                            <i class="fa fa-building-o fa-fw"></i>
                            <h2>Manage Divisions</h2>
                            <h3>Add, view update and delete the divisions </h3>
                        </div>
                        </a>
                    </div><!--/.col-md-4-->
                
                    
                                    
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <a href="roomdetails.php"><div class="feature-wrap">
                            <i class="fa fa-square"></i>
                            <h2>Manage Rooms</h2>
                            <h3>Add, view update and delete the rooms</h3>
                        </div>
                        </a>
                    </div><!--/.col-md-4-->
            
                    
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                            <a href="userDetails.php"><div class="feature-wrap">
                            <i class="fa fa-user"></i>
                            <h2>Manage Users</h2>
                            <h3>Add, view update and delete the users </h3>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                            <a href="itemcategorydetails.php"><div class="feature-wrap">
                            <i class="fa fa-tasks"></i>
                            <h2>Manage Asset Category</h2>
                            <h3>Add, view update and delete the asset category</h3>
                        </div>
                        </a>
                    </div><!--/.col-md-4--><div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                            <a href="assettypedetails.php"><div class="feature-wrap">
                            <i class="fa fa-bars"></i>
                            <h2>Manage Asset Types</h2>
                            <h3>Add, view update and delete the Asset Types</h3>
                        </div>
                        </a>
                    </div><!--/.col-md-4-->
                
                    
                    
                        </a>
                    </div><!--/.col-md-4-->
                
                    
                    
                    
                <!--    <div class="col-md-4S col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
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
                    &copy; 2016 UCSC All Rights Reserved.
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