<?php
   include 'pageheader.php';
   
   if(empty($_POST) == false){
   	$required_fields = array('event_name','date', 'time','location','price','places');	// adding values
   	foreach($_POST as $key=>$value){
   		if(empty($value) && in_array($key, $required_fields) == true){
   			$errors[] = 'Fields marked with an asterisk are required';
   			break 1;
   		}
   	}
   }
   		
   ?>
<!-- Page Content -->
<div class="container">
<!-- Introduction Row -->
<div class="row">
   <div class="col-lg-12">
      <img src="img/events.png" alt="DCU Society" style="float:left;width:100px;height:100px">
      <h1 class="page-header">Events </h1>
   </div>
</div>
<div>
   <?php
      if(isset($_GET['success']) && empty($_GET['success'])){
      	//echo 'Member has been added to society list';
      }
      else{
      	if(empty($_POST) == false && empty($errors) == true){
      		$event_data = array(
      			'event_name' 	=> $_POST['event_name'],
      			'date' 			=> $_POST['date'],
      			'time' 			=> $_POST['time'],
      			'location' 		=> $_POST['location'],
      			'price' 		=> $_POST['price'],
      			'places' 		=> $_POST['places'],
      		);
      		
      		
      		$society = $user_data['society'];	//holds name of the society
      		
      		create_event($society, $event_data);
      		event_list($_POST['event_name']);
      		
      		header('Location: events.php');
      		exit();
      	}
      	else if(empty($errors) == false){
      		echo output_errors($errors);
      	}
      }
      ?>	
   <div id = "aside">
      <form action="" method="post">
         <section style="width:40%;float: right">
            <h4>&nbsp&nbsp&nbsp<i>Upcoming Events</i></h4>
            <br>
            <ul>
               <?php show_events($user_data['society']); ?>
            </ul>
         </section>
         Event Name*:<br><input type="text" name="event_name"><br>
         Location*:<br><input type="text" name="location"><br>
         Number of places*:<br><input type="number" name="places"><br>
         Date*:<br><input type="date" name="date"><br>
         Time*:<br><input type="time" name="time"><br>
         Price in Euro*:<br><input type="number" name="price"><br><br>
         <input style= "background-color:#f39c12; color:white;" type="submit" value="Create Event">
      </form>
   </div>
</div>
<hr>
<!-- Footer -->
<?php 
   include 'pagefooter.php';
   ?>