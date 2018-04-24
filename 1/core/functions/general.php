<?php

function email($to, $subject, $body){
	mail($to, $subject, $body, 'From: deepankar.adhikari@gmail.com');

}


function protect_page(){			//to put a restriction on pages that could be seen only after being logged in
	if(logged_in() === false){
		header('Location: protected.php');
		exit();
	}
}


function logged_in_redirect(){			//if already logged in user try to access register page by like through url access he should be redirected to error page
	if(logged_in() === true){
		header('Location: index.php'); //we can redirect to a generic error page
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
		$output[] = '<li>'. $error . '</li>';
	}
	return '<ul>' . implode('', $output) . '</ul>';  //implode is opposite of explode
}

?>