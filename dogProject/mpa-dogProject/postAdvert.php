<?php
	session_start();
	if(isset($_POST)){
	}
?>
<!--open php tag-->
<?php

	//include connection file
	require_once ('../Classes/pdoConnection.php');
	//include functions file
	require_once('../Includes/functions.php');

	// connect to mysql using singleton pdoDB class
	$db = pdoDB::getConnection();

	//create variable to post the info
	$advert_title = isset($_REQUEST['advert_title']) ? $_REQUEST['advert_title'] : NULL;
	$description = isset($_REQUEST['description']) ? $_REQUEST['description'] : NULL;
	$price = isset($_REQUEST['price']) ? $_REQUEST['price'] : NULL;
	$dob = isset($_REQUEST['dob']) ? $_REQUEST['dob'] : NULL;
	$breedID = isset($_REQUEST['breed']) ? $_REQUEST['breed'] : NULL;
	$countyID = isset($_REQUEST['county']) ? $_REQUEST['county'] : NULL;
	$gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : NULL;
	$userID = $_SESSION['userID'];
	$start_date = date('Y-m-d');
	$created_at = date('Y-m-d');
	$Available = 1;

	//Convert it into a timestamp.
	$birthday = strtotime($dob);
 
	//Get the current timestamp.
	$now = time();
 
	//Calculate the difference.
	$difference = $now - $birthday;
 
	//Convert seconds into days.
	$days = floor($difference / (60*60*24) );
	
	//if the dog is less than 70 days old the advert will not submit
	if ($days < 70) {
		//create variable with error message
		$tooYoung = "The dog you are trying to advertise is under 10 weeks old, DogProject does not allow dogs under 10 weeks old to be advertised.";
		//redirect to add advert sending in too young error variable
		header("Location: addAdvert.php?failed=$tooYoung"); /* Redirect browser */
	}//end if
	//else
	else {
		//open try statment
		try {
			//if the form is submitted
			if (isset($_POST['submit'])) {

				//insert information in to database
				$postAdvertSQL = $db->prepare("INSERT INTO project_dog_advert (advert_title, description, price, dob, gender, breedID, countyID, start_date, userID, created_at, Available) VALUES (:advert_title, :description, :price, :dob, :gender, :breedID, :countyID, :start_date, :userID, :created_at, :Available)");

				//bind information that has been submitted to variable to be inserted
				$postAdvertSQL->bindParam(':advert_title', $advert_title);
				$postAdvertSQL->bindParam(':description', $description);
				$postAdvertSQL->bindParam(':price', $price);
				$postAdvertSQL->bindParam(':dob', $dob);
				$postAdvertSQL->bindParam(':gender', $gender);
				$postAdvertSQL->bindParam(':breedID', $breedID);
				$postAdvertSQL->bindParam(':countyID', $countyID);
				$postAdvertSQL->bindParam(':start_date', $start_date);
				$postAdvertSQL->bindParam(':userID', $userID);
				$postAdvertSQL->bindParam(':created_at', $created_at);
				$postAdvertSQL->bindParam(':Available', $Available);
				/* execute prepared statement */
				$postAdvertSQL->execute();

				//if the post advert SQL is true
				if($postAdvertSQL){
					//redirect to continue advert
	 				header("Location: continueAdvert.php");
	 				//exit
	 		 		exit();
				}//end if

				/* close statement and connection */
				$stmt->close();
			}//end if
		} //end try
		//open catch
		catch
		//if there is a error
		(PDOException $e){
			//echo connection error
			echo "<p>Connection error: " . $e->getMessage() . "</p>";
		}//end catch
	}//end else
//close php tag
?>

