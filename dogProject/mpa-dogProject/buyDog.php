<!--open php tag-->
<?php
session_start();
if(isset($_POST)){
}
?>
<!--open php tag-->
<?php
	// create a link to the class definition file
	require_once ('../Classes/pdoConnection.php');

	// connect to mysql using singleton pdoDB class
	$db = pdoDB::getConnection();

		// <!-- create variable to post the info -->
		$advertID = isset($_REQUEST['advertID']) ? $_REQUEST['advertID'] : NULL;
		$userID = $_SESSION['userID'];
		$title = isset($_REQUEST['title']) ? $_REQUEST['title'] : NULL;
		$first_name = isset($_REQUEST['first_name']) ? $_REQUEST['first_name'] : NULL;
		$surname = isset($_REQUEST['surname']) ? $_REQUEST['surname'] : NULL;
		$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : NULL;
		$contact_num = isset($_REQUEST['contact_num']) ? $_REQUEST['contact_num'] : NULL;
		$buying_date = isset($_REQUEST['buying_date']) ? $_REQUEST['buying_date'] : NULL;
		$new_purchase = "yes";
		$edited_purchase = "no";
		$deleted_purchase = "no";
	//open try
	try {
		//if the form has been submitted
		if (isset($_POST['submit'])) {
			//insert statement which inserts the sent data in to the buying table
			$postAdvertSQL = $db->prepare("INSERT INTO project_dog_buying(userID, advertID, title, first_name, surname, email, contact_num, buying_date, new_purchase, edited_purchase, deleted_purchase) VALUES (:userID, :advertID, :title, :first_name, :surname, :email, :contact_num, :buying_date, :new_purchase, :edited_purchase, :deleted_purchase)");

			//bind all the data in to seperate variables
			$postAdvertSQL->bindParam(':userID', $userID);
			$postAdvertSQL->bindParam(':advertID', $advertID);
			$postAdvertSQL->bindParam(':title', $title);
			$postAdvertSQL->bindParam(':first_name', $first_name);
			$postAdvertSQL->bindParam(':surname', $surname);
			$postAdvertSQL->bindParam(':email', $email);
			$postAdvertSQL->bindParam(':contact_num', $contact_num);
			$postAdvertSQL->bindParam(':buying_date', $buying_date);
			$postAdvertSQL->bindParam(':new_purchase', $new_purchase);
			$postAdvertSQL->bindParam(':edited_purchase', $edited_purchase);
			$postAdvertSQL->bindParam(':deleted_purchase', $deleted_purchase);

			/* execute prepared statement */
			$postAdvertSQL->execute();

			//if postAdvertSQL is true
			if($postAdvertSQL){
				//send the user to a confirmation page
 				header("Location: buyingConfirmation.php");
 				//exit
 		 		exit();
			}//end if

			/* close statement and connection */
			$stmt->close();
		}//end if
	//end try
	} catch
	//if there is a connection error then display error message
	(PDOException $e){
		echo "<p>Connection error: " . $e->getMessage() . "</p>";
	}//end error
 //close php tag
?>


