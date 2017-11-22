<?php

session_start();

require_once("Classes/Database_conn.php");
require_once("functions.php");

$userDetails = null;


if(isset($_SESSION['userLogged']) && $_SESSION['userLogged'] == true){
	$userLoggedIn = "SELECT userID, username, first_name, surname FROM project_users WHERE userID = ?";

	$stmt = mysqli_prepare($conn, $userLoggedIn);

	mysqli_stmt_bind_param($stmt, "s", $_SESSION['userID']);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);

if($userDetails = mysqli_fetch_assoc($result)){

	}else{
		$userDetails = null;
		unset($_SESSION['userID']);
		$_SESSION['userLogged'] = false;
	}
}
?>