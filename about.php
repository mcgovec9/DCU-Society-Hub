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
      <script src="js/schedule.js"></script>
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
                  <?php if(logged_in()) :  ?>
                  <li>
                     <a href="#"><?php echo $user_data['username'];?></a>
                  </li>
                  <li>
                     <a href="logout.php">Logout</a>
                  </li>
                  <?php endif; ?>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container -->
      </nav>
      <!-- Page Content -->
      <div class="container">
         <h1>What it's all about</h1>
         <p>
            Created by Conor McGovern and Nicholas Ruiter as their 3rd year project. 
            The main focus was to create a website for Dublin City University societies 
            where all society activity can be done in the one place.
         </p>
         <ul>
         <li>
            <a href = "https://ca326conormcg.wordpress.com/"><u>Conor McGovern's Blog</u></a>
         </li>
         <br>
         <li>
            <a href = "https://ca326dcusocietyhub.wordpress.com/"><u>Nicholas Ruiter's Blog</u></a>
         </li>
      </div>
      <hr>
      <!-- Footer -->
      <?php 
         include 'pagefooter.php';
         ?>