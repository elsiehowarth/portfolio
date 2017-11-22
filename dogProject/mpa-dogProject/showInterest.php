<!--open php tag-->
<?php
    //set title
	$title = 'Show Interest';
	//include header
	require_once("../Includes/header.php");

	//if there is not a session
	if(!$_SESSION['userLogged']) {
	    //send the user to the login page
		header("Location: mustLogin.php");
		//die
		die;
	}//end if
//close php tag
?>
<!--open main tag-->
<main id="content">
    <!--open wrapper-->
	<div class="wrapper">
        <!--heading-->
		<h3>Looking to buy this dog</h3>
            <!--paragraph with instruction-->
		    <p>Please complete the form below with your details</p>
            <!--open form tag-->
		    <form method="post" action="buyDog.php" name="advert" id="advert" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
			    <!--open fieldset-->
                <fieldset>
                    <!--heading-->
                     <h4>Dogs Details</h4>

                    <!--open php tag-->
                    <?php
                        //create variable which holds advert id
                        $advertID = isset($_REQUEST['advertID']) ? $_REQUEST['advertID'] : NULL;

                        //select specific advert based on the advert id
                        $advertDetails = "SELECT advert.advertID, advert_title, description, price, dob, gender, advert.breedID, county.countyID, advert.countyID, county.countyname, start_date, advert.userID, advert.created_at, breed.breedID, breed.breed_name, available, image.advertID, image.image_path, user.userID, user.contact_num FROM project_dog_advert AS advert
                                INNER JOIN project_dog_breed AS breed
                                ON advert.breedID=breed.breedID 
                                INNER JOIN project_counties AS county
                                ON advert.countyID=county.countyID
                                INNER JOIN project_users AS user
                                ON advert.userID=user.userID
                                LEFT JOIN project_images AS image
                                ON advert.advertID=image.advertID
                                WHERE advert.advertID='$advertID'
                                ORDER BY created_at DESC";

                        //connects to the database or shuts the database
                        $queryresult = mysqli_query($conn, $advertDetails)
                        or die(mysqli_error($conn));

                        //if there was a result
                        if(mysqli_num_rows($queryresult) > 0) {
                            //while loop that will fetch the message detaiils
                            while ($row = mysqli_fetch_assoc($queryresult)) {

                                //variables created and linked to the rows in the database
                                $advertID = $row['advertID'];
                                $advert_title = $row['advert_title'];
                                $description = $row['description'];
                                $price = $row['price'];
                                $dob = $row['dob'];
                                $start_date = $row['start_date'];
                                $breed = $row['breed_name'];
                                $created_at = $row['created_at'];
                                $county = $row['countyname'];
                                $gender = $row['gender'];
                                $image_path = $row['image_path'];
                                $userID = $row['userID'];
                                $seller_number = $row['contact_num'];

                                //echo advert information
                                echo "
                                        <input type='hidden' name='advertID' value='$advertID'>
                                        <p>$description</p>
                                        <p>£$price</p>
                                        <p>$dob old</p>
                                        <p>$breed</p>
                                        <p>$gender</p>";
                            }//end while loop

                        }//end if
                        //else
                        else {
                            //echo an error
                            echo "<p>Sorry No Dogs are available</p>";
                        }//end else
		
	                ?>

                    <!--heading -->
                    <h4>Your Details</h4>
                    <!--input field with the users title prefilled in and label-->
                    <div id="form-content">
                        <label for="contact-number">Your Title*</label></br>
                            <!--open php tag -->
                            <?php
                                //include database connection
                                include '../Classes/Database_conn.php';

                                //create variable which holds session user id
                                $myID = $_SESSION['userID'];

                                //select user details from database
                                $userDetail = "SELECT userID, title FROM project_users WHERE userID='$myID'";

                                //connects to the database or shuts the database
                                $queryresult = mysqli_query($conn, $userDetail)
                                or die(mysqli_error($conn));

                                //while loop that will fetch the users details
                                while ($row = mysqli_fetch_assoc($queryresult)) {

                                    //variables created and linked to the rows in the database
                                    $userID = $row['userID'];
                                    $title = $row['title'];

                                    //echo the users title
                                    echo "<input type=\"text\" name=\"title\" value=\"$title\" />\n";
                                }//end while loop
                            //end php tag
                            ?>
                </div><!--close div-->
                <!--input field with the users first name prefilled in and label-->
                <div id="form-content">
                    <label for="first-name">Your First Name*</label></br>
                        <!--open php tag -->
                        <?php
                            //include connection file
                            include '../Classes/Database_conn.php';

                            //create variable which holds session user id
                            $myID = $_SESSION['userID'];

                            //select user details from database
                            $userDetail = "SELECT userID, first_name FROM project_users WHERE userID='$myID'";

                            //connects to the database or shuts the database
                            $queryresult = mysqli_query($conn, $userDetail)
                            or die(mysqli_error($conn));

                            //while loop that will fetch the user details
                            while ($row = mysqli_fetch_assoc($queryresult)) {

                                //variables created and linked to the rows in the database
                                $userID = $row['userID'];
                                $first_name = $row['first_name'];

                                //echo the users first name in a input field
                                echo "<input type=\"text\" name=\"first_name\" value=\"$first_name\" />\n";
                            }//end while loop
                        //end php tag
                        ?>
                </div><!--close div-->
                <!--input field with the users surname prefilled in and label-->
                <div id="form-content">
                    <label for="contact-number">Your Surname*</label></br>
                        <!--open php tag-->
                        <?php
                            //include database connection
                            include '../Classes/Database_conn.php';

                            //create variable which holds session user id
                            $myID = $_SESSION['userID'];

                            //select user details from database
                            $userDetail = "SELECT userID, surname FROM project_users WHERE userID='$myID'";

                            //connects to the database or shuts the database
                            $queryresult = mysqli_query($conn, $userDetail)
                            or die(mysqli_error($conn));

                            //while loop that will fetch the user details
                            while ($row = mysqli_fetch_assoc($queryresult)) {

                                //variables created and linked to the rows in the database
                                $userID = $row['userID'];
                                $surname = $row['surname'];

                                //echo the users surname in a input field
                                echo "<input type=\"text\" name=\"surname\" value=\"$surname\" />\n";
                            }
                                    ?>
                </div><!--close div-->
                <!--input field with the users email prefilled in and label-->
                <div id="form-content">
                    <label for="email">Your Email Address*</label></br>
                        <!--open php tag -->
                        <?php
                            //include database connection
                            include '../Classes/Database_conn.php';

                            //create variable which holds session user id
                            $myID = $_SESSION['userID'];

                            //select user details from database
                            $userDetail = "SELECT userID, email FROM project_users WHERE userID='$myID'";

                            //connects to the database or shuts the database
                            $queryresult = mysqli_query($conn, $userDetail)
                            or die(mysqli_error($conn));

                            //while loop that will fetch the user details
                            while ($row = mysqli_fetch_assoc($queryresult)) {

                                //variables created and linked to the rows in the database
                                $userID = $row['userID'];
                                $email = $row['email'];

                                //echo the users email in a input field
                                echo "<input type=\"email\" name=\"email\" value=\"$email\" />\n";
                            }//end while loop
                        //end php tag
                        ?>
                </div><!--close div-->
                <!--input field with the users contact number prefilled in and label-->
                <div id="form-content">
                    <label for="contact-number">Your Contact Number*</label></br>
                        <!--open php tag -->
                        <?php
                            //include database connection
                            include '../Classes/Database_conn.php';

                            //create variable which holds session user id
                            $myID = $_SESSION['userID'];

                            //select user details from database
                            $userDetail = "SELECT userID, contact_num FROM project_users WHERE userID='$myID'";

                            //connects to the database or shuts the database
                            $queryresult = mysqli_query($conn, $userDetail)
                            or die(mysqli_error($conn));

                            //while loop that will fetch the user details
                            while ($row = mysqli_fetch_assoc($queryresult)) {

                                //variables created and linked to the rows in the database
                                $userID = $row['userID'];
                                $contact_num = $row['contact_num'];

                                //echo the users contact number in a input field
                                echo "<input type=\"text\" name=\"contact_num\" value=\"$contact_num\" />\n";
                            }//end while loop
                        //close php tag
                        ?>
                </div><!--close div-->

                <!--input datefield and label-->
                <div id="form-content">
                    <label for="buying_date">When would you like to meet the dog*</label></br>
                        <input type="date" class="form-control" required="required" id="buying_date" required="required" name="buying_date" placeholder='&#xf073; Enter a choosen date'>
                </div> <!--close div-->
						
                <!--next button-->
	            <input type="submit" name="submit" value="Next">
             <!--close fieldset-->
			 </fieldset>
         <!--end form tag-->
		 </form>
    <!--close wrapper-->
	</div>
<!--close main tag-->
</main>
<!-- include footer-->
<?php
	require_once("../Includes/footer.php");
?>