<?php

	// create a link to the class definition file
	require_once('../Classes/pdoConnection.php');
	// connect to mysql using singleton pdoDB class
	$db = pdoDB::getConnection();
	// new separate try catch block for db code
	try {
	  // store a query into a variable
  		$listAdverts = "SELECT advert.advertID, advert_title, description, price, dob, gender, advert.breedID, county.countyID, advert.countyID, county.countyname, start_date, userID, created_at, breed.breedID, breed.breed_name, available, image.advertID, image.image_path FROM project_dog_advert AS advert
						INNER JOIN project_dog_breed AS breed
						ON advert.breedID=breed.breedID 
						INNER JOIN project_counties AS county
						ON advert.countyID=county.countyID
						LEFT JOIN project_images AS image
						ON advert.advertID=image.advertID
						WHERE available = 1
						ORDER BY created_at desc limit 4";

  		// call the query method of the $db object passing the sql as a parameter 
		// and store the statement object that is returned in the variable $stmt
		$stmt = $db->query( $listAdverts );
 
		// iterate through the result set calling the statement object's fetchObject() method
		// and store the object returned in the variable $advert
		while ( $advert = $stmt->fetchObject()){
   			 // fields in the select statement are attributes of the $advert object.
            //echo the selected information
    		echo "<div class='ads'>
    				<img src='" . $advert->image_path . "' alt='' height='250' width='42'>
    				<div class='desc'>
    				<p><a href='advertDetails.php?advertID=" . $advert->advertID . "'>" . $advert->advert_title  . "</a></p>
    				<p>" . $advert->breed_name . "</p>
    				<p>£" . $advert->price . "</p>
    		</div>


    		</div>";
		}//close while loop
	}//close try statement
    //open catch statement
	catch
    //if there is an error
    (PDOException $e){
	    //echo connection error
        echo "<p>Connection error: " . $e->getMessage() . "</p>";
	}//close catch statement
//close php tag
?>