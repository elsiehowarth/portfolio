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

    //create variable which holds the advert id from the url
    $advertID = isset($_REQUEST['advertID']) ? $_REQUEST['advertID'] : NULL;

    //open try
    try {
        //delete advert statement
        $deleteAdvertSQL = $db->prepare("DELETE FROM project_dog_advert WHERE advertID = '$advertID'");

        /* execute prepared statement */
        $deleteAdvertSQL->execute();

        //if delete advert is true then redirect user
        if($deleteAdvertSQL){
            //create variable which is confirmation that the advert has been deleted
            $deleted = "Your Advert has successfully been deleted";
            //send the user to list of their adverts page sending delete variable
            header("Location: yourAdverts.php?deleted=$deleted");
            //exit
            exit();
        } //end if

        /* close statement and connection */
        $stmt->close();

    }//end try
     // catch statment
    catch
        (PDOException $e){
            //echo connection error
            echo "<p>Connection error: " . $e->getMessage() . "</p>";
    }//end catch
//close php tag
?>