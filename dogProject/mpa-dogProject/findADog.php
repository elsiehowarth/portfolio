<!--open php tag-->
<?php
    //set title
	$title = 'Find a Dog';
	//include header
	require_once("../Includes/header.php");
//close php tag
?>
<!--open main tag -->
<main id="content">
    <!--open wrapper tag-->
	<div class="wrapper">
        <!--header-->
		<h3>
			Find a Dog
		</h3>
		<!--open php tag-->
        <?php
            //select adverts from the database
            $dogAdvert = mysqli_query($conn, "SELECT advertID, advert_title, description, price, dob, gender, breedID, countyID, created_at FROM project_dog_advert WHERE available = 1");
        //close php tag
        ?>
        <!--open form tag, allow special characters-->
        <form action="searchresults.php" method="post" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
            <!--search bar-->
            Search: <input type="text" name="search" placeholder=" Search here ... "/>
            <!--search button-->
            <button type="submit"><i class="fa fa-search fa-fw"></i>Search!</button>
        <!--close form tag-->
        </form>
        <!--open php tag-->
        <?php
            //include function file
            require_once('../Includes/functions.php');
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
				  ORDER BY created_at DESC";

                // call the query method of the $db object passing the sql as a parameter
                // and store the statement object that is returned in the variable $stmt
                $stmt = $db->query( $listAdverts );

                // iterate through the result set calling the statement object's fetchObject() method
                // and store the object returned in the variable $book
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
                }//end while loop
            }//end try
            //open catch statement
            catch
            //if there is a connection error
            (PDOException $e){
                //echo connection error
                echo "<p>Connection error: " . $e->getMessage() . "</p>";
            }//end catch
        //close php tag
        ?>
    <!--close wrapper-->
	</div>
<!--close main tag-->
</main>
<!--include footer-->
<?php
    require_once("../Includes/footer.php");
?>