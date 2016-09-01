<?php
   include 'pageheader.php';
   
   if(empty($_POST) == false){
   $required_fields = array('name','student_num','student_email');	// adding values
   foreach($_POST as $key=>$value){
   	if(empty($value) && in_array($key, $required_fields) == true){
   		$errors[] = 'Fields marked with an asterisk are required';
   		break 1;
   	}
   }
   
   if (empty($errors) == true){
   	
   	if(strlen($_POST['student_num']) != 8) {				 
   		$errors[] = 'Not a valid student number.';
   	}
   	
   
   	if(filter_var($_POST['student_email'], FILTER_VALIDATE_EMAIL) == false){
   		$errors[] = 'Email address entered is not valid.';
   	}
   	
   	if(duplicates_exist($user_data['society'], $_POST['student_num']) == true){
   		$errors[] = 'The student you are adding may already exist';
   	}
   	
   }
   
   }
   ?>
<!-- Page Content -->
<div class="container">
<!-- Introduction Row -->
<div class="row">
   <div class="col-lg-12">
      <img src="img/members.png" alt="DCU Society" style="float:left;width:100px;height:100px">
      <h1 class="page-header">Members </h1>
   </div>
</div>
<div>
   <?php
      if(isset($_GET['success']) && empty($_GET['success'])){
      	//echo 'Member has been added to society list';
      }
      else{
      	if(empty($_POST) == false && empty($errors) == true){
      		$member_data = array(
      			'name' 				=> $_POST['name'],
      			'student_num' 		=> $_POST['student_num'],
      			'student_email' 	=> $_POST['student_email'],
      		);
      		
      		
      		$society = $user_data['society'];	//holds name of the society
      		
      		$student_num = $_POST['student_num'];
      		
      		if (isset($_POST['add'])) {
      			add_member($member_data, $society);
      		}
      		else if (isset($_POST['delete'])) {	
      			delete_member($society, $student_num);	
      		}
      
      		header('Location: members.php');
      		exit();
      	}
      	else if(empty($errors) == false){
      		echo output_errors($errors);
      	}
      }
      
      
      ?>	
   <form action="" method="post">
      Fill in the following to add or delete<br>
      <input type="text" name="name" value placeholder="Full Name">
      <input type="text" name="student_num" value placeholder="Student Number">
      <input type="text" name="student_email" value placeholder="DCU Email Address">
      <input style="background-color:#f1c40f; color:black" type="submit" name="add" value="Add Member">
      <input style="background-color:#f1c40f; color:black" type="submit" name="delete" value="Remove Member">
   </form>
   <br>
   <table style="width:100%" border="2">
      <tr>
         <th>Name</th>
         <th>Student Number</th>
         <th>Student Email</th>
      </tr>
      <?php
         display_members($user_data['society']);
         ?>
   </table>
</div>
<hr>
<!-- Footer -->
<?php 
   include 'pagefooter.php';
   ?>