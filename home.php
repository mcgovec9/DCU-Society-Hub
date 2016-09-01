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
      <!-- Introduction Row -->
      <div class="row">
         <div class="col-lg-12">
            <img src="img/DCU2.jpg" alt="DCU" style="float:left;width:300px;height:100px">
            <h1 class="page-header"></h1>
         </div>
      </div>
      <!-- Team Members Row -->
      <div class="row">
         <div class="col-lg-12"></div>
         <div class="col-lg-4 col-sm-6 text-center">
            <a href="members.php">
            <img src="img/members.png" alt="members" style="width:200px;height:200px;">
            </a>
            <h3>Members</h3>
            <p>View members and details, add members too.</p>
         </div>
         <div class="col-lg-4 col-sm-6 text-center">
            <a href="events.php">
            <img src="img/events.png" alt="events" style="width:200px;height:200px;">
            </a>
            <h3>Events</h3>
            <p>Create Events, control signups.</p>
         </div>
         <div class="col-lg-4 col-sm-6 text-center">
            <a href="equipment.php">
            <img src="img/equipment.png" alt="equipment" style="width:200px;height:200px;">
            </a>
            <h3>Equipment</h3>
            <p>Manage society equipment.</p>
         </div>
         <div class="col-lg-4 col-sm-6 text-center">
            <a href="meetings.php">
            <img src="img/meetings.png" alt="meetings" style="width:200px;height:200px;">
            </a>
            <h3>Meetings</h3>
            <p>Schedule meetings.</p>
         </div>
         <div class="col-lg-4 col-sm-6 text-center">
            <a href="minutes.php">
            <img src="img/minutes.png" alt="minutes" style="width:200px;height:200px;">
            </a>
            <h3>Minutes</h3>
            <p>Record Society minutes.</p>
         </div>
      </div>
      <hr>
      <?php 
         include 'pagefooter.php';
         ?>