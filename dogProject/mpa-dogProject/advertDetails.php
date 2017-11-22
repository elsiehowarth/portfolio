<!--open php tag-->
<?php
    //include database connection
	include '../Classes/Database_conn.php';

    //create variable which holds the advert id from the url
    $advertID = isset($_REQUEST['advertID']) ? $_REQUEST['advertID'] : NULL;
    //select advert id and advert title
	$retrieveName = "SELECT advertID, advert_title FROM project_dog_advert WHERE advertID='$advertID'";

	//connects to the database or shuts the database
   	$queryresult = mysqli_query($conn, $retrieveName) 
  	or die(mysqli_error($conn));
    //open while loop
  	while ($row = mysqli_fetch_assoc($queryresult)) {
        //variable created and linked to the rows in the database
  		$advert_title = $row['advert_title'];
  	}//end while loop

    //variable which is the title of the page which include the advet title
	$title = 'Dog Project - '.$advert_title;
  	//require header
	require_once("../Includes/header.php");
//end php tag
?>
<!--open main tag-->
<main id="content">
    <!--open wrapper-->
	<div class="wrapper">
        <!--open php tag-->
        <?php
            //require functions file
            require_once('../Includes/functions.php');
            // create a link to the class definition file
            require_once('../Classes/pdoConnection.php');
            // connect to mysql using singleton pdoDB class
            $db = pdoDB::getConnection();
            //create variable which holds the advert id from the url
            $advertID = isset($_REQUEST['advertID']) ? $_REQUEST['advertID'] : NULL;
            // new separate try catch block for db code
            try {
                //select advert details, breed, and county
                $advertDetails = "SELECT advert.advertID, advert_title, description, price, dob, gender, advert.breedID, county.countyID, advert.countyID, county.countyname, start_date, advert.userID, advert.created_at, breed.breedID, breed.breed_name, available, image.advertID, image.image_path, user.userID, user.contact_num FROM project_dog_advert AS advert
                    INNER JOIN project_dog_breed AS breed
                    ON advert.breedID=breed.breedID 
                    INNER JOIN project_counties AS county
                    ON advert.countyID=county.countyID
                    INNER JOIN project_users AS user
                    ON advert.userID=user.userID
                    LEFT JOIN project_images AS image
                    ON advert.advertID=image.advertID
                    WHERE advert.advertID='$advertID'";

                 // call the query method of the $db object passing the sql as a parameter
                // and store the statement object that is returned in the variable $stmt
                $stmt = $db->query( $advertDetails );

                /// iterate through the result set calling the statement object's fetchObject() method
                // and store the object returned in the variable $advert
                    while ( $advert = $stmt->fetchObject()){
                        //echo details retrieved from database
                        echo "<h3>
                                " .$advert->advert_title. " the " .$advert->breed_name ."
                            </h3>
                                <p>" . $advert->description . "</p>
                            <div id='advert-details'>
                                <img src='" . $advert->image_path . "' alt='" . $advert->description ."' id='advert-details'>
                            </div>
        
                            <div class='advertiser-details'>
                                <h3>Advert Details</h3>
                                <p>£" . $advert->price . "</p>
                                <p>" . calculate_age($advert->dob) . "</p>
                                <p>" . $advert->breed_name . "</p>
                                <p>" . $advert->gender . "</p>
                                <p><i class='fa fa-map-o fa-fw'></i>" .$advert->countyname."</p>
                                <a href='showInterest.php?advertID=" . $advert->advertID . "' class='buttons'><i class='fa fa-heart fa-fw'></i>I am Interested</a>
                                <a href='reportAdvert.php?advertID=" . $advert->advertID . "' class='buttons'><i class='fa fa-flag fa-fw'></i>Report advert</a>
                            </div>";
                    }//end while loop

            }//end try
            //catch statement
            catch
            //if there is a connection error
            (PDOException $e){
                //display conection error
                echo "<p>Connection error: " . $e->getMessage() . "</p>";
            }//end catch
         //close php tag
        ?>
    <!--close div-->
	</div>
<!--close main tag-->
</main>
<!--include footer-->
<?php
    require_once("../Includes/footer.php");
?>
