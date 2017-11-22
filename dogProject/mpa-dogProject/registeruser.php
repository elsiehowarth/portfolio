<?php

	// create a link to the connection file
	require_once ('../Classes/pdoConnection.php');

	// connect to mysql using singleton pdoDB class
	$db = pdoDB::getConnection();

	// create variable to post the info
	$title = isset($_REQUEST['title']) ? $_REQUEST['title'] : NULL;
	$first_name = isset($_REQUEST['firstName']) ? $_REQUEST['firstName'] : NULL;
	$surname = isset($_REQUEST['surname']) ? $_REQUEST['surname'] : NULL;
	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : NULL;
	$countyID = isset($_REQUEST['county']) ? $_REQUEST['county'] : NULL;
	$birthdate = isset($_REQUEST['dob']) ? $_REQUEST['dob'] : NULL;
	$contact_num = isset($_REQUEST['contactNumber']) ? $_REQUEST['contactNumber'] : NULL;
	$created_at = date('d/m/Y');
	$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : NULL;
	$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : NULL;
	//change password to encrupted
	$passwordHashAdd = password_hash($password, PASSWORD_BCRYPT);

	//open try statement
	try {
		//if the form is submitted
		if (isset($_POST['submit'])) {
			//insert sent information in to the database
	 		$registerUserSQL = $db->prepare("INSERT INTO project_users(title, first_name, surname, email, contact_num, username, password, birthdate,  countyID, created_at) VALUES (:title, :first_name, :surname, :email, :contact_num, :username, :passwordHashAdd, :birthdate, :countyID, :created_at)");
			//bind values to a variable
	 		$registerUserSQL->bindParam(':title', $title);
			$registerUserSQL->bindParam(':first_name', $first_name);
			$registerUserSQL->bindParam(':surname', $surname);
			$registerUserSQL->bindParam(':email', $email);
			$registerUserSQL->bindParam(':contact_num', $contact_num);
			$registerUserSQL->bindParam(':username', $username);
			$registerUserSQL->bindParam(':passwordHashAdd', $passwordHashAdd);
			$registerUserSQL->bindParam(':birthdate', $birthdate);
			$registerUserSQL->bindParam(':countyID', $countyID);
			$registerUserSQL->bindParam(':created_at', $created_at);

			/* execute prepared statement */
			$registerUserSQL->execute();

			//if statement excuted sucessfully direct to the login page
			if($registerUserSQL){
				//redirect to login page
	 			header ('Location:login.php');
	 			//exit
	 		 	exit();
			}//end if

			/* close statement and connection */
			$stmt->close();
		}//end if
	}//end try
	// catch
	catch
	(PDOException $e){
		//create variable with error text
		$error = "Username is already taken";
		//redirect to the register page and send in error message
		header("Location: register.php?failed=$error");
		//exit
		exit();
	}//close catch
//close php tag
?>
