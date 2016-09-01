<?php 
function register_user($register_data){
	array_walk($register_data, 'array_sanitize');
	$register_data['password'] = md5($register_data['password']);
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
}

function user_data($user_id){
	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if($func_num_args > 1){			
		unset($func_get_args[0]);	// ignore user id
		
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc( mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
		
		return $data;
		
	}
	
	
}
	
function logged_in(){
	return (isset($_SESSION['user_id'])) ? true : false;
}
function user_exists($username){
	$username = sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'"), 0) == 1) ? true : false;
}

function email_exists($student_email){
	$student_email= sanitize($student_email);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `student_email` = '$student_email'"), 0) == 1) ? true : false;
}


/*function user_active($username){
	$username = sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1"), 0) == 1) ? true : false;
}*/

function user_id_from_username($username) {
	$username = sanitize($username);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'"), 0, 'user_id');
}


function login($username, $password) {
	$user_id = user_id_from_username($username);
	$username = sanitize($username);
	$password = md5($password);
	
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
}

function soc_exists($society){
	return mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$society."'")) == 1;  // change this to search if a current user has this society 
}

function set_society($society){	
	if(soc_exists($society) != 1){
		
		mysql_query("CREATE TABLE `$society members` (ID int(11) NOT NULL AUTO_INCREMENT, name varchar(32), student_num varchar(8), student_email varchar(50), PRIMARY KEY (ID))");
		
		mysql_query("CREATE TABLE `$society minutes` (date date, subject varchar(32), content varchar(5000), PRIMARY KEY (date))");  
		
		mysql_query("CREATE TABLE `$society events` (event_name varchar(32),date date, time time, location varchar(32), price varchar(8), places int(11), PRIMARY KEY (date))");
		
		mysql_query("CREATE TABLE `$society equipment` (equipment varchar(32), status varchar(32), user varchar(32), event varchar(32), PRIMARY KEY (equipment))");
		
		mysql_query("CREATE TABLE `$society meetings` (username varchar(32), monday varchar(32), tuesday varchar(32), wednesday varchar(32), thursday varchar(32), friday varchar(32))");
		
		mysql_query("CREATE TABLE `$society schedule` (date date, time time, location varchar(32))");
	}
}
	
?> 