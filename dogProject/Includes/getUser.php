<?php
//start session
session_start();
//check is user exists in session and throw error
if(isset($_SESSION['userLogged'])){
	//create a variable and save array of the username which is from the session
	$arr = array('username' => $_SESSION['userLogged']);
}else{//else display and error if the username does not exist
	$arr = array('username' => null);
}

//echo the json of the array created
echo json_encode($arr);
?> 