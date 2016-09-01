<?php
   include 'pageheader.php';
   ?>
<!-- Page Content -->
<div class="container">
<!-- Introduction Row -->
<div class="row">
   <div class="col-lg-12">
      <img src="img/equipment.png" alt="DCU Society" style="float:left;width:100px;height:100px">
      <h1 class="page-header">Equipment </h1>
   </div>
</div>
<div>
   <?php
      $society = $user_data['society'];	
      if(empty($_POST) == false && empty($errors) == true){
      if (isset($_POST['add'])) {
      	$equipment = array(
      		'equipment' 	=> $_POST['equipment'],
      		'status' 		=> 'available',
      		'user' 			=> '',
      		'event'			=> '',
      	);
      
      	add_equip($society, $equipment);	
      }
      else if (isset($_POST['update'])) {
      	update_equip($society, $_POST['member'], $_POST['equip'], $_POST['event']);
      }
      else if (isset($_POST['remove'])) {
      	delete_equip($society, $_POST['equipment']);
      }
      else if (isset($_POST['free'])) {
      	free_equip($society, $_POST['member'], $_POST['equip'], $_POST['event']);
      }
      header('Location: equipment.php');
      exit();	
      
      }
      ?>	
   <form action="" method="post">
      Add new equipment here<br>
      <input type="text" name="equipment" value placeholder="Equipment Name">
      <input style="background-color:#ff3333; color:white" type="submit" name="add" value="Add Equipment">
      <input style="background-color:#ff3333; color:white" type="submit" name="remove" value="Remove Equipment">
   </form>
   <br>
   <form action="" method="post">
      <select name="member" id="member">
      <?php 																					
         $society = $user_data['society'];
         $sql = mysql_query("SELECT `name` FROM `$society members` ORDER BY `name`");
         while ($row = mysql_fetch_array($sql)){
         echo '<option value="'.$row['name'].'">' . $row['name'] . "</option>";
         }
         ?>
      </select>
      <select name="equip" id="equip">
      <?php 
         $society = $user_data['society'];
         $sql = mysql_query("SELECT `equipment` FROM `$society equipment` WHERE `status`='available'");
         while ($row = mysql_fetch_array($sql)){
         echo '<option value="'.$row['equipment'].'">' . $row['equipment'] . "</option>";
         }
         ?>
      </select>
      <select name="event" id="event">
      <?php 
         $society = $user_data['society'];
         $sql = mysql_query("SELECT `event_name` FROM `$society events`");
         while ($row = mysql_fetch_array($sql)){
         echo '<option value="'.$row['event_name'].'">' . $row['event_name'] . "</option>";
         }
         ?>
      </select>
      <input style="background-color:#ff3333; color:white" type="submit" name="update" value="Reserve Equipment">
   </form>
   <br>
   <table style="width:100%" border="2">
      <tr>
         <th>Equipment</th>
         <th>Status</th>
         <th>User</th>
         <th>Event</th>
      </tr>
      <?php
         display_equip($user_data['society']);
         ?>
   </table>
   <form action = "" method="post">
      <select name="equip" id="equip">
      <?php 
         $society = $user_data['society'];
         $sql = mysql_query("SELECT `equipment` FROM `$society equipment` WHERE `status`='reserved'");
         while ($row = mysql_fetch_array($sql)){
         echo '<option value="'.$row['equipment'].'">' . $row['equipment'] . "</option>";
         }
         ?>
      <input style="background-color:#ff3333; color:white" type="submit" name="free" value="Unreserve Equipment">
   </form>
</div>
<hr>
<!-- Footer -->
<?php 
   include 'pagefooter.php';
   ?>