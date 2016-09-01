<?php
   include 'pageheader.php';
   ?>
<!-- Page Content -->
<div class="container">
<!-- Introduction Row -->
<div class="row">
   <div class="col-lg-12">
      <img src="img/events.png" alt="DCU Society" style="float:left;width:100px;height:100px">
      <h1 class="page-header">Current Event </h1>
   </div>
</div>
<div>
   <?php
      $society = $user_data['society'];	
      $event = $_GET['link'];
      
      if (isset($_POST['add'])) {
      	$paid = $_POST['paid'];
      	$name = addslashes($_POST['member']);
      		
      	add_signup($society, $name, $event, $paid);
      	header('Location: '.$_SERVER['REQUEST_URI']);	
      	exit();
      }	
      ?>	
   <div id = "aside">
      <form action="" method="post">
         <section style="width:40%;float: right">
            <h4><i>Signups</i></h4>
            <br>
            <p><b><u>Member</u></b></p>
            <select name="member" id="member">
            <?php 																					
               $society = $user_data['society'];
               $sql = mysql_query("SELECT `name` FROM `$society members` ORDER BY `name`");
               while ($row = mysql_fetch_array($sql)){
               echo '<option value="'.$row['name'].'">' . $row['name'] . "</option>";
               }
               ?>
            </select><br><br>
            <p><b><u>Paid</u></b></p>
            <select name="paid" id="paid">
            <?php echo ' <option value="YES">YES</option><option value="NO">NO</option> '; ?>
            </select>
            <input style="background-color:#f39c12; color:white" type="submit" name="add" value="Add/Update Signup">
         </section>
      </form>
   </div>
   <?php
      $event = $_GET['link'];
      $society = $user_data['society'];
      
      
      
      echo '<u><b>Event Name -</b></u>    '; 			get_info($society, $event, 'event_name');  
      echo '<br><br><u><b>Location -</b></u>    '; 	get_info($society, $event, 'location');  
      echo '<br><br><u><b>Date -</b></u>    '; 		get_info($society, $event, 'date');  
      echo '<br><br><u><b>Time -</b></u>    '; 		get_info($society, $event, 'time'); 
      echo '<br><br><u><b>Places -</b></u>    '; 		get_info($society, $event, 'places');  			
      echo '<br><br><u><b>Price -</b></u>    €'; 		get_info($society, $event, 'price');  
      echo '<br><br>';					
      ?>
   <table style="width:100%" border="2">
      <tr>
         <th>Name</th>
         <th>Student Number</th>
         <th>Student Email</th>
         <th>Paid</th>
      </tr>
      <?php
         display_signups($event);
         ?>
   </table>
</div>
<!-- Footer -->
<?php 
   include 'pagefooter.php';
   ?>