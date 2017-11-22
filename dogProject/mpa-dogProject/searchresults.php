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
    <!--open wrapper -->
	<div class="wrapper">
        <!--header-->
		<h3>Find a Dog</h3>
        <!--open form tag for the search -->
        <form action="searchresults.php" method="post" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
            <!--input field for searching -->
            Search: <input type="text" name="search" placeholder=" Search here ... "/>
            <!--search button-->
            <button type="submit"><i class="fa fa-search fa-fw"></i>Search!</button>
        <!--close from tag-->
        </form>
        <!--open php tag -->
        <?php
            //include functions file
            require_once('../Includes/functions.php');
            // create a link to the connection file
            require_once ('../Classes/pdoConnection.php');

            // connect to mysql using singleton pdoDB class
            $db = pdoDB::getConnection();

            // new separate try catch block for db code
            try {
                // Search from search form
                $search=$_POST['search'];
                //select advert information where the search matchs values in the database
                $searchQuery = $db->prepare("SELECT advert.advertID, advert.countyID, advert.breedID, advert_title, price, gender, description, dob, start_date, breed.breedID, breed.breed_name, county.countyID, county.countyname, image.advertID, image.image_path FROM project_dog_advert AS advert
                    INNER JOIN project_dog_breed AS breed
                    ON advert.breedID=breed.breedID 
                    INNER JOIN project_counties AS county
                    ON advert.countyID=county.countyID
                    LEFT JOIN project_images AS image
                    ON advert.advertID=image.advertID
                    WHERE advert_title LIKE '%$search%' 
                        OR price LIKE '%$search%' 
                        OR gender LIKE '%$search%'
                        OR breed.breed_name LIKE '%$search%'
                        OR county.countyname LIKE '%$search%'");
                //bind search
                $searchQuery->bindValue(1, "%$search%", PDO::PARAM_STR);
                //execute query
                $searchQuery->execute();

                //if there is a result
                if (!$searchQuery->rowCount() == 0) {
                    //echo search found
                    echo "Search found :<br/>";
                    //while loop to go through the results
                    while ($advert = $searchQuery->fetchObject()) {
                        //echo retrieved information
                        echo "<div class='ads'>
                                 <img src='" . $advert->image_path . "' alt='' height='250' width='42'>
                                 <div class='desc'>
                                    <p><a href='advertDetails.php?advertID=" . $advert->advertID . "'>" . $advert->advert_title  . "</a></p>
                                    <p>" . $advert->breed_name . "</p>
                                    <p>£" . $advert->price . "</p>
                                  </div>
                               </div>";
                    }//end while loop
                    //echo a link to all the adverts
                    echo "</br><a href='findADog.php'>View All Dogs</a>";
                }// end if
                //else
                else {
                    //echo nothing found
                    echo 'Nothing found';
                    //echo a link to all the adverts
                    echo "</br>
                      <a href='findADog.php'>View All Dogs</a>";
                }//end else

            } //end try
            //catch statement
            catch
            //if there is an error
            (PDOException $e){
                //echo connection error
                echo "<p>Connection error: " . $e->getMessage() . "</p>";
            }//end catch
        //end php tag
        ?>
    <!--close wrapper-->
	</div>
<!--close main tag-->
</main>
<!--include footer-->
<?php
	require_once("../Includes/footer.php");
?>
