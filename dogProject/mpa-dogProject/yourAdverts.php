<!--open php tag-->
<?php
    //set title
	$title = 'Dog Project - Your Adverts';
	//include header
	require_once("../Includes/header.php");
//close php tag
?>
<!--open main tag -->
<main id="content">
    <!--open wrapper-->
	<div class="wrapper">
        <!--open php tag-->
         <?php
            //if the url contains deleted
            if(isset($_GET['deleted'])){
                //create variable for the deleted out of the url
                $deleted = $_GET['deleted'];
                //echo error message
                echo "<div class='warning'><p><i class='fa fa-exclamation-triangle' aria-hidden='true'></i>$deleted</p></div>";
            }//end if
        //close php tag
        ?>
        <!--heading-->
	    <h3>Your Adverts</h3>
        <!--open php tag-->
        <?php

            // include the database connection file
            require_once('../Classes/pdoConnection.php');

            // connect to mysql using singleton pdoDB class
            $db = pdoDB::getConnection();

            //create variable which holds session user id
            $userID = $_SESSION['userID'];

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
                                WHERE userID = '$userID'
                                ORDER BY created_at";

                // call the query method of the $db object passing the sql as a parameter
                // and store the statement object that is returned in the variable $stmt
                $stmt = $db->query( $listAdverts );
 
                // iterate through the result set calling the statement object's fetchObject() method
                // and store the object returned in the variable $advert
                while ( $advert = $stmt->fetchObject()){
                     // fields in the select statement are attributes of the $advert object.
                    //echo the retrieved details
                    echo "<div class='ads'>
                            <img src='" . $advert->image_path . "' alt='' height='250' width='42'>
                            <div class='desc'>
                                <p><a href='advertDetails.php?advertID=" . $advert->advertID . "'>" . $advert->advert_title  . "</a></p>
                                <p>" . $advert->breed_name . "</p>
                                <p>£" . $advert->price . "</p>
                                <a href='editAdvertInformation.php?advertID=" . $advert->advertID . "'><i class='fa fa-edit fa-fw'></i>Edit</a>
                                <a href='deleteConfirm.php?advertID=" . $advert->advertID . "'><i class='fa  fa-close fa-fw'></i>Delete</a>
                            </div>
                        </div>";
                }// end a while loop
            }//end try
            //catch block
            catch
            (PDOException $e){
                //echo error message
                echo "<p>Connection error: " . $e->getMessage() . "</p>";
            }//end catch

        ?>
    <!--close wrapper-->
	</div>
<!--close main-->
</main>
<!--include footer-->
<?php
    require_once("../Includes/footer.php");
?>