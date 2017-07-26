<?php
    include "user.php";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $log = new User();
        $email = $_POST['form-email'];
        $password = $_POST['form-password'];
        $res = $log->login($email, $password);
        
        if ($res){
            $user = $_SESSION['user_details'];
            
            echo "<script>alert('".$user['first_name']." ".print_r($user)." has logged in.')</script>";
            
            $user_type = $user['user_level'];
            if ($user_type == 'asset_clerk'){
                header("Location:assetclerk.php");
                exit();
            } elseif ($user_type =='electrician'){
                header("Location:confirm_asset.php");
                exit();
            }
            else{
                if ($user_type== 'bursar'){
                    header("Location:bursar.php");
                    exit();
                }
                else{
                    if ($user_type== 'dp_registrar'){
                        header("Location:dp_registrar.php");
                        exit();
                    }
                    else{
                        if ($user_type== 'div_asset_clerk'){
                            header("Location:diviassetclerk.php");
                            exit();
                        }
                        else{
                            if ($user_type== 'system_admin'){
                                header("Location:sysadmin.php");
                                exit();
                            }
                            else{
                                if ($user_type== 'temp_user'){
                                    
                                    header("Location:board_of_survey_report_2.php");
                                    exit();
                                }
                                else{
                                    echo "<script>alert('Under Construction')</script>";

                                }
                             
                            }
                        }
                    }
                }
            }
        }
        else{
            echo "<script>alert('fail')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AMS</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

    

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Asset Management System</strong></h1>
                            <div class="description">
							<h4><strong>University Of Colombo School Of Computing </strong></h4>
                            	
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login</h3>
                            		
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Email</label>
			                        	<input type="text" name="form-email" placeholder="Email..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" class="btn">Sign in!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>