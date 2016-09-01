<?php
	include 'pageheader.php';
	
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
					$schedule_data = array(
						'date' 			=> $_POST['date'],
						'time' 			=> $_POST['time'],
						'location' 		=> $_POST['location'],
					);
					
					
					$society = $user_data['society'];	//holds name of the society
					
					
					
					if (isset($_POST['schedule'])) {
						add_schedule($schedule_data, $society);
					}
					header('Location: schedule.php');
					exit();
				}
				else if(empty($errors) == false){
					echo output_errors($errors);
				}
			?>	
			<div style="float: right;">
				<form action="" method="post" >
					<h4>Schedule a Meeting</h4><br>
					Date:<br>
					<input type="date" name="date"><br>
					Time:<br>
					<input type="time" name="time"><br>
					Location:<br>
					<input type="text" name="location" value placeholder="Where?"><br>
					<input style="background-color:#2ecc71; color:white" type="submit" name="schedule" value="Schedule Meeting">
				</form>
				<br>
				<h4>Upcoming Meetings</h4>
				<table border="2" width = "350">
					<tr>
						<th>Time</th>  
						<th>Date</th>
						<th>Location</th>
					</tr> 
					<?php
						display_schedule($user_data['society']);
					?>
					
				</table>
			</div>
			<div>
				<h4>Suggested Times</h4>
				<form action = "meetings.php">
					<input style="background-color:#2ecc71; color:white" type="submit" name="edit" value="Edit Your Times">
				</form>
				<table border="2">
					<caption>Monday:</caption>
						<?php
							count_days($user_data['society'], 'monday');
						?>
					 
					
				</table>
			</div>
			<div>
				<table border="2">
					<caption>Tuesday:</caption>
						<?php
							count_days($user_data['society'], 'tuesday');
						?>
					 
					
				</table>
			</div>
			<div>
				<table border="2">
					<caption>Wednesday:</caption>
						<?php
							count_days($user_data['society'], 'wednesday');
						?>
					 
					
				</table>
			</div>
			<div>
				<table border="2">
					<caption>Thursday:</caption>
						<?php
							count_days($user_data['society'], 'thursday');
						?>
					 
					
				</table>
			</div>
			<div>
				<table border="2">
					<caption>Friday:</caption>
						<?php
							count_days($user_data['society'], 'friday');
						?>
					 
					
				</table>
			</div>
		</div>
		<hr>
		<!-- Footer -->
		<?php 
			include 'pagefooter.php';
		?>
