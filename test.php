<?php 
   include 'core/init.php';
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
         <h2>Login</h2>
         <div class="inner">
            <form action="login.php" method="post">
               <ul style="list-style:none" id="login">
               <li>Username:<br>
                  <input type="text" name="username">
               </li>
               <li>Password:<br>
                  <input type="password" name="password">
               </li>
               <li><br>
                  <input style= "background-color:9b59b6; color:white;" type="submit" value="Login">
               </li>
               <li><br>
                  <a href="register.php">No account? Register!</a>
               </li>
            </form>
         </div>
      </div>
      <hr>
      <!-- Footer -->
      <?php 
         include 'pagefooter.php';
         ?>