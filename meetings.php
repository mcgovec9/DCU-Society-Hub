<?php
	include 'pageheader.php';
	
	times_exist($user_data['society'], $user_data['username']);
?>

	<!-- Page Content -->
	<div class="container">
		<!-- Introduction Row -->
		<div class="row">
			<div class="col-lg-12">
				<img src="img/meetings.png" alt="DCU Society" style="float:left;width:100px;height:100px">
				<h1 class="page-header">Meetings </h1>
			</div>
		</div>
		<div>
		<?php
		
			if(empty($_POST) == false && empty($errors) == true){
				$meetings_data1 = array(
					'username'		=> $user_data['username'],
					'monday' 		=> $_POST['monday1'],
					'tuesday' 		=> $_POST['tuesday1'],
					'wednesday' 	=> $_POST['wednesday1'],
					'thursday' 		=> $_POST['thursday1'],
					'friday' 		=> $_POST['friday1'],
				);
				
				$meetings_data2 = array(
					'username'		=> $user_data['username'],
					'monday' 		=> $_POST['monday2'],
					'tuesday' 		=> $_POST['tuesday2'],
					'wednesday' 	=> $_POST['wednesday2'],
					'thursday' 		=> $_POST['thursday2'],
					'friday' 		=> $_POST['friday2'],
				);
				$meetings_data3 = array(
					'username'		=> $user_data['username'],
					'monday' 		=> $_POST['monday3'],
					'tuesday' 		=> $_POST['tuesday3'],
					'wednesday' 	=> $_POST['wednesday3'],
					'thursday' 		=> $_POST['thursday3'],
					'friday' 		=> $_POST['friday3'],
				);
				
				
				$society = $user_data['society'];	//holds name of the society
				
				
				
				if (isset($_POST['add'])) {
					add_meetings($meetings_data1, $society);
					add_meetings($meetings_data2, $society);
					add_meetings($meetings_data3, $society);
				}

				header('Location: schedule.php');
				exit();
			}
			else if(empty($errors) == false){
				echo output_errors($errors);
			}
		?>	
		<section>
		<p> 
			Please enter your available times.
		</p>
		</section>
		<form action="" method="post">
			Monday:<br>
			<select id = "monday1" name = "monday1">
				<option>No Time Selected</option>
				<script>
					getTimes();
				</script>
			</select>
			<select id = "monday2" name = "monday2">
				<option>No Time Selected</option>
				<script>
					getTimes();
				</script>
			</select>
			<select id = "monday3" name = "monday3">
				<option>No Time Selected</option>
				<script>
					getTimes();
				</script>
			</select><br>
			Tuesday:<br>
			<select id = "tuesday1" name = "tuesday1">
				<option>No Time Selected</option>
				<script>
					getTimes();
				</script>
			</select>
			<select id = "tuesday2" name = "tuesday2">
				<option>No Time Selected</option>
				<script>
					getTimes();
				</script>
			</select><select id = "tuesday3" name = "tuesday3">
				<option>No Time Selected</option>
				<script>
					getTimes();
				</script>
			</select><br>
			Wednesday:<br>
			<select id = "wednesday1" name = "wednesday1">
				<option>No Time Selected</option>
				<script>
					getTimes();
				</script>
			</select>
			<select id = "wednesday2" name = "wednesday2">
				<option>No Time Selected</option>
				<script>
					getTimes();
				</script>
			</select>
			<select id = "wednesday3" name = "wednesday3">
				<option>No Time Selected</option>
				<script>
					getTimes();
				</script>
			</select><br>
			
			Thursday:<br>
			<select id = "thursday1" name = "thursday1">
				<option>No Time Selected</option>
				<script>
					getTimes();
				</script>
			</select>
			<select id = "thursday2" name = "thursday2">
				<option>No Time Selected</option>
				<script>
					getTimes();
				</script>
			</select>
			<select id = "thursday3" name = "thursday3">
				<option>No Time Selected</option>
				<script>
					getTimes();
				</script>
			</select><br>
			
			Friday:<br>
			<select id = "friday1" name = "friday1">
				<option>No Time Selected</option>
				<script>
					getTimes();
				</script>
			</select>
			<select id = "friday2" name = "friday2">
				<option>No Time Selected</option>
				<script>
					getTimes();
				</script>
			</select>
			<select id = "friday3" name = "friday3">
				<option>No Time Selected</option>
				<script>
					getTimes();
				</script>
			</select><br>
		
			<input style="background-color:#2ecc71; color:white" type="submit" value="Submit Times" name = "add"><br>
			
		</form>
		</div>
		<hr>
		<!-- Footer -->
		<?php 
			include 'pagefooter.php';
		?>