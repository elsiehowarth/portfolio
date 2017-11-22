<!--open php tag-->
<?php
    //set the title
	$title = 'Dog Project';
	//include the header
	require_once("../Includes/header.php");
//end php tag
?>
<!--open main tag-->
<main id="content">
    <!--open wrapper -->
	<div class="wrapper">

    <?php
	    // create a link to the class definition file
	    require_once ('../Classes/pdoConnection.php');

	    // connect to mysql using singleton pdoDB class
	    $db = pdoDB::getConnection();
        //open try
	    try {
			//update statement which changes the advert to not being visible
			$updateAdvert = "UPDATE project_dog_advert as advert INNER JOIN project_dog_buying as bought ON advert.advertID=bought.advertID SET advert.Available = 0 WHERE advert.advertID= bought.advertID";

 			// call the query method of the $db object passing the sql as a parameter 
			// and store the statement object that is returned in the variable $stmt
			$stmt = $db->query( $updateAdvert );
            //if updateAdvert is true
			if($updateAdvert) {
				//echo heading and paragraph
                echo "<h3>
                        Congratulations
                    </h3>
                    <p>
                        Your details have been sent to the advertiser. You can either contact the advertiser or they will contact you.
                    </p>";

			}//end if
	    } //end try
        //open catch
	    catch
        (PDOException $e){
	        //echo connection error
	        echo "<p>Connection error: " . $e->getMessage() . "</p>";
        }//end catch
    //end php tag
    ?>
    <!--close div-->
	</div>
<!--close main-->
</main>
<!--include footer-->
<?php
	require_once("../Includes/footer.php");
?>