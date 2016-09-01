<?php
 include 'core/init.php'; 
 logged_in_redirect();
 
 if(empty($_POST) == false){
	$required_fields = array('username', 'password', 'repeat_password', 'name', 'student_email', 'society');
	foreach($_POST as $key=>$value){
		if(empty($value) && in_array($key, $required_fields) == true){
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}
	
	if (empty($errors) == true){
		if (user_exists($_POST['username']) == true) {
			$errors[] = 'Sorry, the username \'' . $_POST['username'] . '\' is already taken.';
		}
		if(preg_match("/\\s/", $_POST['username']) == true){		//Insures no whitespace within username
			$errors[] = 'Username must not contain any spaces.';
		}
		if(strlen($_POST['password']) < 6) {
			$errors[] = 'Your password is too short. Must be at least 6 characters.';
		}
		if($_POST['password'] != $_POST['repeat_password']){
			$errors[] = 'Passwords entered do not match.';
		}
		if(filter_var($_POST['student_email'], FILTER_VALIDATE_EMAIL) == false){
			$errors[] = 'Email address entered is not valid.';
		}
		if(email_exists($_POST['student_email']) == true){
			$errors[] = 'Sorry, the email \'' . $_POST['student_email'] . '\' is already in use.';	
		}
	}	
}
 ?>
			
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>DCU Society HUB</title>
      <!-- Bootstrap Core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="css/round-about.css" rel="stylesheet">
   </head>
   <body>
      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="home.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                  <li>
                     <a href="about.php">About</a>
                  </li>
                  <?php if(!logged_in()) :  ?>
                  <li>
                     <a href="test.php">Login/Register</a>
                  </li>
                  <?php endif; ?>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li>
                     <a href="logout.php">Logout</a>
                  </li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container -->
      </nav>
      <!-- Page Content -->
      <div class="container">
      <!-- Introduction Row -->
      <div class="row">
         <div class="col-lg-12">
            <img src="img/register.png" alt="DCU Society" style="float:left;width:100px;height:100px">
            <h1 class="page-header">Login/Register</h1>
         </div>
      </div>
      <div>
         <h1>Register</h1>
         <?php
            if(isset($_GET['success']) && empty($_GET['success'])){
            	echo 'You\'ve been registered successfully!';
            }
            else{
            	if(empty($_POST) == false && empty($errors) == true){
            		$register_data = array(
            			'username' 			=> $_POST['username'],
            			'password' 			=> $_POST['password'],
            			'name' 				=> $_POST['name'],
            			'student_email' 	=> $_POST['student_email'],
            			'society' 			=> $_POST['society'],
            		);
            		
            		set_society($_POST['society']);
            		
            		register_user($register_data);
            		header('Location: register.php?success');
            		
            		exit();
            	}
            	else if(empty($errors) == false){
            		echo output_errors($errors);
            	}
            }	
            	
            ?>
         <form action="" method="post">
            <ul style="list-style:none">
               <li>
                  Username*:<br>
                  <input type="text" name="username">
               </li>
               <li>
                  Password*:<br>
                  <input type="password" name="password"> 
               </li>
               <li>
                  Repeat Password*:<br>
                  <input type="password" name="repeat_password" >
               </li>
               <li>
                  Name*:<br>
                  <input type="text" name="name">
               </li>
               <li>
                  Student email*:<br>
                  <input type="text" name="student_email">
               </li>
               <li>
                  Society*:<br>
                  <input type="text" name="society">If creating new society, it is recommended to add numbers to the society name to increase the security of your data
               </li>
               <li><br>
                  <input  style= "background-color:9b59b6; color:white"  type="submit" value="Register">
               </li>
            </ul>
         </form>
      </div>
      <hr>
      <!-- Footer -->
      <?php 
         include 'pagefooter.php';
         ?>