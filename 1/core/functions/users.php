<?php

function imprints_post($club_data){
	array_walk($club_data, 'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($club_data)) . '`'; //we are basically fetching the fields of the entered user data
	$data = '\'' . implode('\', \'', $club_data) . '\''; // And here we are fetching and also sanitizing the values of the data entered by the user in post
	
	
	mysql_query("INSERT INTO `imprints` ($fields) VALUES ($data)");
}

function kalakriti_post($club_data){
	array_walk($club_data, 'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($club_data)) . '`'; //we are basically fetching the fields of the entered user data
	$data = '\'' . implode('\', \'', $club_data) . '\''; // And here we are fetching and also sanitizing the values of the data entered by the user in post
	
	
	mysql_query("INSERT INTO `kalakriti` ($fields) VALUES ($data)");
}

function inferno_post($club_data){
	array_walk($club_data, 'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($club_data)) . '`'; //we are basically fetching the fields of the entered user data
	$data = '\'' . implode('\', \'', $club_data) . '\''; // And here we are fetching and also sanitizing the values of the data entered by the user in post
	
	
	mysql_query("INSERT INTO `inferno` ($fields) VALUES ($data)");
}

function mun_post($club_data){
	array_walk($club_data, 'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($club_data)) . '`'; //we are basically fetching the fields of the entered user data
	$data = '\'' . implode('\', \'', $club_data) . '\''; // And here we are fetching and also sanitizing the values of the data entered by the user in post
	
	
	mysql_query("INSERT INTO `mun` ($fields) VALUES ($data)");
}

function quiz_post($club_data){
	array_walk($club_data, 'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($club_data)) . '`'; //we are basically fetching the fields of the entered user data
	$data = '\'' . implode('\', \'', $club_data) . '\''; // And here we are fetching and also sanitizing the values of the data entered by the user in post
	
	
	mysql_query("INSERT INTO `quiz` ($fields) VALUES ($data)");
}

function robotics_post($club_data){
	array_walk($club_data, 'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($club_data)) . '`'; //we are basically fetching the fields of the entered user data
	$data = '\'' . implode('\', \'', $club_data) . '\''; // And here we are fetching and also sanitizing the values of the data entered by the user in post
	
	
	mysql_query("INSERT INTO `robotics` ($fields) VALUES ($data)");
}

function snuphoria_post($club_data){
	array_walk($club_data, 'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($club_data)) . '`'; //we are basically fetching the fields of the entered user data
	$data = '\'' . implode('\', \'', $club_data) . '\''; // And here we are fetching and also sanitizing the values of the data entered by the user in post
	
	
	mysql_query("INSERT INTO `snuphoria` ($fields) VALUES ($data)");
}


function cabpoolpost($cabpool_data){
	array_walk($lnf_data, 'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($cabpool_data)) . '`'; //we are basically fetching the fields of the entered user data
	$data = '\'' . implode('\', \'', $cabpool_data) . '\''; // And here we are fetching and also sanitizing the values of the data entered by the user in post
	
	
	mysql_query("INSERT INTO `cabpool` ($fields) VALUES ($data)"); //query to enter the info into the table of our database

}

function lnfpost($lnf_data) {				//
	array_walk($lnf_data, 'array_sanitize');
	
	$fields = '`' . implode('`, `', array_keys($lnf_data)) . '`'; //we are basically fetching the fields of the entered user data
	$data = '\'' . implode('\', \'', $lnf_data) . '\''; // And here we are fetching and also sanitizing the values of the data entered by the user in post
	
	
	mysql_query("INSERT INTO `lnf` ($fields) VALUES ($data)"); //query to enter the info into the table of our database
	

}


function recover($mode, $email){
	$mode = sanitize($mode);
	$email = sanitize($email);

	$user_data = user_data(user_id_from_email($email), 'user_id', 'first_name','username','email_code');

	if($mode == 'username'){
		email($email,'Your username', "Hello ". $user_data['first_name']. ",\n\nYour username is " . $user_data['username'] . "\n\n-dashboard");
	}else if($mode = 'password'){ //we email GET variable to the account and ask him to follow the link which has user_id and emailcode as GET variables which in forgetpassword.php we will input in change password function
		$generated_password = substr($user_data['email_code'], 0, 8);
		
		email($email,'Activate your account',"Hello " . $user_data['first_name'] . ",\n\nWe give you the new password as \n" . $generated_password . "\n , so to confirm, use the link below:\n\nhtttp://localhost/lr/forgetpassword.php?user_id=" . $user_data['user_id'] . "&email_code=" . $user_data['email_code'] . " \n\n -Dashboard ");
	}


}

function email_snu($email){			//function to verify if the email ends with @snu.edu.in
	$email = sanitize($email);
	$s2="@snu.edu.in";
    return substr($email, -strlen($s2)) == $s2 ? true : false;
}


function activate($email, $email_code){
	$email = mysql_real_escape_string($email);
	$email_code = mysql_real_escape_string($email_code);

	if(mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email' AND `email_code` = '$email_code' AND `active` = 0"), 0) == 1){
		mysql_query("UPDATE `users` SET `active` = 1 WHERE `email` = '$email'");
		return true;
	}else {
		return false;
	}

}

function change_password($user_id, $password){
	$user_id = (int)$user_id;
	$password = md5($password);
	mysql_query("UPDATE `users` SET `password` = '$password' WHERE `user_id` = $user_id");
}


function register_user($register_data) {				//we have added mailing feature
	array_walk($register_data, 'array_sanitize');
	$register_data['password'] = md5($register_data['password']);
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`'; //we are basically fetching the fields of the entered user data
	$data = '\'' . implode('\', \'', $register_data) . '\''; // And here we are fetching and also sanitizing the values of the data entered by the user in post
	


	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)"); //query to enter the info into the table of our database
	email($register_data['email'],'Activate your account',"Hello " . $register_data['first_name'] . ",\n\nYou need to activate your account, so use the link below:\n\nhtttp://localhost/lr/activate.php?email=" . $register_data['email'] . "&email_code=" . $register_data['email_code'] . " \n\n -Dashboard ");

}

function user_count(){
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `active` = 1"), 0);
}


function user_data($user_id) {
	$data = array();
	$user_id = (int)$user_id;

	$func_num_args = func_num_args(); //to know how many variables are passed so that we can loop thru them
	$func_get_args = func_get_args();

	if($func_num_args > 1) {
		unset($func_get_args[0]); //we have removed user id as it is already stored in the variable user_id 

		$fields = '`' . implode('`, `',$func_get_args) . '`'; //we get the fields of the data and we use them how to pass them into the query and retrieve the data
		

		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
		
		return $data;
	}

}

function logged_in(){
	return(isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($username){
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'");
	return(mysql_result($query,0) == 1) ? true : false;
}

function email_exists($email){
	$email = sanitize($email);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email'");
	return(mysql_result($query,0) == 1) ? true : false;
}


function user_active($username){
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1");
	return(mysql_result($query,0) == 1) ? true : false;
}

//function to get session id from username
function user_id_from_username($username){
	$username = sanitize($username);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'"), 0, 'user_id');
}

function user_id_from_email($email){
	$email = sanitize($email);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `email` = '$email'"), 0, 'user_id');
}


function login($username, $password) {
	$user_id = user_id_from_username($username);

	$username = sanitize($username);
	$password = md5($password);

	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
}

?>
