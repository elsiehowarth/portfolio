<?php
//start session
session_start();

//include database connection
require_once("../Classes/Database_conn.php");
require_once("functions.php");

//set userInformation to null
$userInformation = null;

//if the session include userLogged is true the execute and sql query
if(isset($_SESSION['userLogged']) && $_SESSION['userLogged'] == true){
	//select user information based on the user id in the session
	$userLoggedIn = "SELECT userID, username, first_name, surname FROM project_users WHERE userID = ?";

	//save the sql quesy and the connection in a variable
	$stmt = mysqli_prepare($conn, $userLoggedIn);

	mysqli_stmt_bind_param($stmt, "s", $_SESSION['userID']);
	//execute the stmt
	mysqli_stmt_execute($stmt);

	//save the result of the executed query within a variable
	$result = mysqli_stmt_get_result($stmt);

//if the user information id the same at the result
if($userInformation = mysqli_fetch_assoc($result)){
	//do nothing
	//else if user information is null and the session is unser then the user is not logged in.
	}else{
		$userInformation = null;
		unset($_SESSION['userID']);
		$_SESSION['userLogged'] = false;
	}
}//close if
?>