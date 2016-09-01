<?php

function logged_in_redirect(){
	if(logged_in()){
		header('Location: home.php');
		exit();
	}
}

function protect_page(){
	if(!logged_in()){
		header('Location: protected.php');
		exit();
	}
}
function array_sanitize(&$item){
	$item = mysql_real_escape_string($item);
}
function sanitize($data) {	
	return mysql_real_escape_string($data);
}

function output_errors($errors){
	$output = array();
	foreach($errors as $error){
		$output[] = '<li>' . $error . '</li>';
	}
	return '<ul>' . implode('', $output) . '</ul>';  // join array elements with a string
}

/*********************************************** MEMBERS PAGE **********************************************************************/

function duplicates_exist($society, $student_num){
	$query = mysql_query("SELECT 1 FROM `$society members` WHERE `student_num`='$student_num'");
	if($query && mysql_num_rows($query) > 0){
		return true;
	}
	else{
		return false;
	}
}
	
	
	
function add_member($member_data, $society){
	array_walk($member_data, 'array_sanitize');
	
	
	$fields = '`' . implode('`, `', array_keys($member_data)) . '`';
	
	$data = '\'' . implode('\', \'', $member_data) . '\'';
	
	mysql_query("INSERT INTO `$society members` ($fields) VALUES ($data)"); 
}

function delete_member($society, $student_num){
	mysql_query("DELETE FROM `$society members` WHERE `student_num` = $student_num"); 	
}

function display_members($society){		//will display a list of members on the members page
	$records= mysql_query("SELECT * FROM `$society members` ORDER BY `name`");
	while($members = mysql_fetch_assoc($records)){
		echo "<tr>";
		echo "<td>".$members['name']."</td>";        
		echo "<td>".$members['student_num']."</td>";
		echo "<td>".$members['student_email']."</td>";
		echo "</tr>";	
	}
}

/*********************************************** MINUTES PAGE **********************************************************************/

function add_minutes($society, $minutes){
	array_walk($minutes, 'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($minutes)) . '`';
	$data = '\'' . implode('\', \'', $minutes) . '\'';
						
	mysql_query("INSERT INTO `$society minutes` ($fields) VALUES ($data)"); 
						
}

function display_minutes($society){
	$records = mysql_query("SELECT * FROM `$society minutes` ORDER BY `date` DESC");
	while($minutes = mysql_fetch_assoc($records)){
		$date = $minutes['date'];
		$subject = $minutes['subject'];
		echo "<h3><u>$date - $subject</u></h3>";
		echo "<br>";
		echo $minutes['content'];
		echo "<br>";
	}
}


/*********************************************** MEETINGS PAGE ********************************************************************/

function count_days($society, $day){
	$time = mysql_query("SELECT `$day`, COUNT(*) FROM `$society meetings` GROUP BY `$day`");
	$count = mysql_query("SELECT `$day`, COUNT(*) AS `$day` FROM `$society meetings` GROUP BY `$day`");
	
	while(($occurs = mysql_fetch_assoc($count)) && ($times = mysql_fetch_assoc($time))){
		if ($occurs[$day] > 4){
			echo "<tr><th>Suggested Times</th><th>Available</th></tr>";
			echo "<td>".$times[$day]."</td><td>".$occurs[$day]."</td>";
			echo "</tr><br>";
						
		}
	}
} 

function add_schedule($schedule_data, $society){
	array_walk($schedule_data, 'array_sanitize');
	
	
	$fields = '`' . implode('`, `', array_keys($schedule_data)) . '`';
	
	$data = '\'' . implode('\', \'', $schedule_data) . '\'';
	
	mysql_query("INSERT INTO `$society schedule` ($fields) VALUES ($data)"); 
}
function display_schedule($society){		
	$records= mysql_query("SELECT * FROM `$society schedule`");
	while($schedule = mysql_fetch_assoc($records)){
		echo "<tr>";
		echo "<td>".$schedule['time']."</td>";       
		echo "<td>".$schedule['date']."</td>";
		echo "<td>".$schedule['location']."</td>";
		echo "</tr>";	
	}
}

function add_meetings($meetings_data, $society){
	array_walk($meetings_data, 'array_sanitize');
	
	
	$fields = '`' . implode('`, `', array_keys($meetings_data)) . '`';
	
	$data = '\'' . implode('\', \'', $meetings_data) . '\'';
	
	mysql_query("INSERT INTO `$society meetings` ($fields) VALUES ($data)"); 
}

function times_exist($society, $username){
		$query = mysql_query("SELECT 1 FROM `$society meetings` WHERE `username`='$username'");
		if($query && mysql_num_rows($query) > 0){
			header('Location: schedule.php');
		}
}



/*********************************************** EQUIPMENT PAGE *******************************************************************/

function add_equip($society, $equipment){
	array_walk($equipment, 'array_sanitize');
	
	
	$fields = '`' . implode('`, `', array_keys($equipment)) . '`';
	
	$data = '\'' . implode('\', \'', $equipment) . '\'';
	
	mysql_query("INSERT INTO `$society equipment` ($fields) VALUES ($data)"); 

	 
}

function delete_equip($society, $equipment){
	mysql_query("DELETE FROM `$society equipment` WHERE `equipment` = '$equipment'"); 	
}




function display_equip($society){
	$records= mysql_query("SELECT * FROM `$society equipment` ORDER BY `status`");
	while($data = mysql_fetch_assoc($records)){
		echo "<tr>";
		echo "<td>".$data['equipment']."</td>";        
		echo "<td>".$data['status']."</td>";
		echo "<td>".$data['user']."</td>";
		echo "<td>".$data['event']."</td>";
		echo "</tr>";	
	}
}

function update_equip($society, $name, $equipment, $event){ 
	$name = addslashes($name);  
	mysql_query("UPDATE `$society equipment` SET `status`='reserved', `user`='$name', `event`='$event' WHERE `equipment`='$equipment'");	
}

function free_equip($society, $name, $equipment, $event){ 
	$name = addslashes($name);  
	mysql_query("UPDATE `$society equipment` SET `status`='available', `user`='', `event`='' WHERE `equipment`='$equipment'");
	
}





 

/*********************************************** EVENTS PAGE **********************************************************************/

function create_event($society, $event_data){
	array_walk($event_data, 'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($event_data)) . '`';
	$data = '\'' . implode('\', \'', $event_data) . '\'';
	
	mysql_query("INSERT INTO `$society events` ($fields) VALUES ($data)"); 
	
}

function event_list($event_name){
	mysql_query("CREATE TABLE `$event_name` (ID int(11) NOT NULL AUTO_INCREMENT, name varchar(32), student_num varchar(8), student_email varchar(50), paid varchar(1) DEFAULT 'N', PRIMARY KEY (ID))");
}

function display_signups($event_name){
	$records= mysql_query("SELECT * FROM `$event_name` ORDER BY `name`");
	while($data = mysql_fetch_assoc($records)){
		echo "<tr>";
		echo "<td>".$data['name']."</td>";        
		echo "<td>".$data['student_num']."</td>";
		echo "<td>".$data['student_email']."</td>";
		echo "<td><div contenteditable>".$data['paid']."</div></td>";
		echo "</tr>";	
	}
}


function add_signup($society, $name, $event, $paid){
		$query = mysql_query("SELECT 1 FROM `$event` WHERE `name`='$name'");
		if($query && mysql_num_rows($query) > 0){
			mysql_query("UPDATE `$event` SET `paid`='$paid' WHERE `name`='$name'");
		}
		else{
			$member_fields = array('name','student_num','student_email');
			$fields = '`' . implode('`, `',($member_fields)) . '`';
			
			$query = mysql_query("SELECT $fields FROM `$society members` WHERE `name`='$name'");  
			
			$elems = mysql_fetch_assoc($query);
			array_walk($elems, 'array_sanitize');
			$data = '\'' . implode('\', \'', $elems) . '\'';
			
			$result = mysql_query("INSERT INTO `$event` ($fields) VALUES ($data)");
			mysql_query("UPDATE `$event` SET `paid`='$paid' WHERE `username`='$name'");
		}
		
}				
 	
function get_info($society, $event, $value){
	$result = mysql_query("SELECT `$value` FROM `$society events` WHERE `event_name`='$event'");

	if (mysql_num_rows($result)) {
		$data = mysql_fetch_assoc($result);
		echo $data[$value];
	}
}

function show_events($society){
	$query = mysql_query("SELECT `event_name` FROM `$society events` ORDER BY `date` DESC");
	$array = array();
	
	while($row = mysql_fetch_assoc($query)){
		echo " <li><a href='currentevent.php?link=". urlencode($row['event_name']) ."'><strong><u>". $row['event_name'] ."</u></strong></a></li> ";
	}
}


?>


