<?php
session_start();
//error_reporting(0);

require 'database/connect.php';
require 'functions/users.php';
require 'functions/general.php';

if(logged_in() === true){

	$session_user_id = $_SESSION['user_id']; //variable that contains user id
	$user_data = user_data($session_user_id,'user_id','username','password', 'first_name', 'last_name', 'email'); //pass in data that you want to extract and within the function user_data we can fetch any number of data 

	if(user_active($user_data['username']) === false){
		session_destroy();
		header('Location: index.php');
		exit();
	}

}
$errors = array();

?>