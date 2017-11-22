<?php
	//set the title
	$title = 'Post an Advert';
	//include the header
	require_once("../Includes/header.php");

	//if there is no session then the user must be redirected to the login page
	if(!$_SESSION['userLogged']) {
		//redirect to must login page
		header("Location: mustLogin.php");
		die;
	}//end if statement
?>
<!--open main tag-->
<main id="content">
    <!--open wrapper div-->
	<div class="wrapper">
	<!--page title-->
		<h3>
			Create a New Advert
		</h3>
        <!--paragrapgh with instructions-->
		<p>Please complete the form below with advert details</p>
		<!--open form tag which will be sent to a php page which will ask the user for more info-->
        <?php
            //if the url includes failed
            if(isset($_GET['failed'])){
                //create a variables which holds the failed part of the url
                $error = $_GET['failed'];
                //echo the error message
                echo "<div class='warning'><p><i class='fa fa-exclamation-triangle' aria-hidden='true'></i>$error</p></div>";
            }//end if
        ?><!--close php tag-->
        <!--open form which is a post to add an advert-->
		<form method="post" action="postAdvert.php" name="advert" id="advert" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
			 <!--open fieldset-->
			 <fieldset>
			 	<!--title of form-->
				 <h4>
					Dogs Details
				</h4>
				<!--advert title input field and label-->
			 	<div id="form-content">
                	<label for="advert_title">Dog Name/Title*</label></br>
                        <!--input text tag-->
                    	<input type="text" name="advert_title" required="required" placeholder='&#xf007; Please Enter a Advert Title' maxlength="100">
            	</div>
            	<!--end of advert title-->
            	<!--advert description input field and label-->
            	<div id="form-content">
                	<label for="description">Description*</label></br>
                        <!--textarea tag-->
                    	<textarea type="text" name="description" required="required" maxlength="4000"></textarea>
            	</div>
            	<!--end of advert description-->
            	<!--advert dog breed select field and label-->
			 	<div class="form-content">
			 		<label for="breed">Dog Breed*</label></br>
			 			<!--open select input field-->
	               		<select id="breed" name="breed">
                            <!--default option-->
	               			<option value="" disabled>Please Select a Breed</option>
	               				<!--open php tag-->
	               				 <?php
                        			// create a link to the class definition file
									require_once('../Classes/pdoConnection.php');
									//call get connection function and assign to variable
                         			$db = pdoDB::getConnection();
                        			// new separate try catch block for db code
                        			try {
                            			// store a query into a variable which selects all breeds from the breed table
                            			$breedSQL = "SELECT * FROM project_dog_breed";
                            			// call the query method of the $db object passing the sql as a parameter 
                           				 // and store the statement object that is returned in the variable $stmt
                            			$stmt = $db->query( $breedSQL );

                            			//create variable to hold the statement which makes sure there is breeds in the list
                            			$findBreed = $stmt->rowCount() > 0;

                            			//if statement to make sure there is breeds in the list
                            			if($findBreed) {
                            	 			// iterate through the result set calling the statement object's fetchObject() method
                            				// and store the object returned in the variable $breed
                                			while ( $breed = $stmt->fetchObject()){
                                     			echo '<option value="' . $breed->breedID . '">' . $breed->breed_name . '</option>';
                                			}//end while loop
                            			}//end if statement
                        			}//end try statement
                         			catch//catch statement
                            		(PDOException $e){//if there is an error
                                        //echo connecion error
                            			echo "<p>Connection error: " . $e->getMessage() . "</p>";
                       				 }//close catch tag
                                //close php tag
                    			?>
                    	<!--close select input field-->
	               		</select>
                 <!--close form content-->
	            </div>
                 <!--date of birth input field and label-->
	            <div id="form-content">
                    <label for="dob">Date of Birth*</label></br>
                        <!--input date tag-->
                        <input type="date" class="form-control" required="required" id="dob" required="required" name="dob" placeholder='&#xf073;; Enter your their date of birth'>
                <!--close div-->
                </div>
                 <!--price input field and label-->
                 <div id="form-content">
                	<label for="price">Price*</label></br>
                        <!--input text tag-->
                    	<input type="number" name="price" required="required" placeholder='£'>
            	<!--close div-->
                 </div>
                 <!--county select field and label-->
            	<div class="form-content">
                <label for="county">Where do they live*</label></br>
                    <!--open select statement-->
                    <select id="county" name="county">
                        <!--default option-->
                        <option value="" disabled">Please Select a County</option>
                            <!--open php tag-->
                            <?php
                                // create a link to the class definition file
                                require_once('../Classes/pdoConnection.php');

                                //call get connection function and assign to variable
                                $db = pdoDB::getConnection();

                                // new separate try catch block for db code
                                try {
                                    //sql which brings back the county id and county name
                                    $countySQL = "SELECT * FROM project_counties";

                                    // call the query method of the $db object passing the sql as a parameter
                                    // and store the statement object that is returned in the variable $stmt
                                    $stmt = $db->query($countySQL);

                                    //create variable to hold the statement which makes sure there is countys in the list
                                    $findCounty = $stmt->rowCount() > 0;

                                    //if statement to make sure there is countys in the list
                                    if ($findBreed) {
                                        // iterate through the result set calling the statement object's fetchObject() method
                                        // and store the object returned in the variable $county
                                        while ($county = $stmt->fetchObject()) {
                                            //create the id and name as an option
                                            echo '<option value="' . $county->countyID . '">' . $county->countyname . '</option>';
                                        }//end while loop
                                    }//end if statement
                                 } //end try statement
                                catch//catch statement
                                (PDOException $e){//if there is an error
                                    //echo connecion error
                                    echo "<p>Connection error: " . $e->getMessage() . "</p>";
                                }//close catch tag
                            //close php tag
                            ?>
                    <!--close select tag -->
                    </select>
                <!--close div-->
                </div>
                 <!--gender select field and label-->
                <div class="form-content">
                    <label for="gender">Gender*</label></br>
                        <!--open select -->
                        <select id="gender" name="gender">
                            <!--default option-->
                            <option value="" disabled">Please Select a Gender</option>
                            <!--male option-->
                            <option value="Male">Male</option>
                            <!--female option-->
                            <option value="Female">Female</option>
                        <!--close select tag-->
                        </select>
                <!--close div tag-->
                </div>
                <!--heading-->
                <h4>
                    Your Details
                </h4>
                <!--contact input text field which is prefilled with the logged in users contact number and label-->
                <div id="form-content">
                    <label for="contact-number">Your Contact Number</label></br>
                    <!--open php tag -->
                    <?php
                            //include database connection
                            include '../Classes/Database_conn.php';
                            //create variable which holds session user id
                            $myID = $_SESSION['userID'];
                            //select user id and contact number from the user table
                            $userDetail = "SELECT userID, contact_num FROM project_users WHERE userID='$myID'";

                            //connects to the database or shuts the database
                            $queryresult = mysqli_query($conn, $userDetail)
                            or die(mysqli_error($conn));

                            //while loop that will fetch the user contact number
                            while ($row = mysqli_fetch_assoc($queryresult)) {

                                //variables created and linked to the rows in the database
                                $userID = $row['userID'];
                                $contact_num = $row['contact_num'];

                                //echo a input field with the contact number
                                echo "<input type=\"text\" name=\"number\" value=\"$contact_num\" />\n";
                            }//end while loop
                    //end php tag
                    ?>
                <!--close div-->
                </div>
                 <!--email input text field which is prefilled with the logged in users email address and label-->
                 <div id="form-content">
                    <label for="email">Your Email Address</label></br>
                        <!--open php tag-->
                        <?php
                            //include database connection
                            include '../Classes/Database_conn.php';
                            //create variable which holds session user id
                            $myID = $_SESSION['userID'];
                            //select user id and email address from the user table
                            $userDetail = "SELECT userID, email FROM project_users WHERE userID='$myID'";

                            //connects to the database or shuts the database
                            $queryresult = mysqli_query($conn, $userDetail)
                            or die(mysqli_error($conn));

                            //while loop that will fetch the email address
                            while ($row = mysqli_fetch_assoc($queryresult)) {

                                //variables created and linked to the rows in the database
                                $userID = $row['userID'];
                                $email = $row['email'];

                                //echo a input field with the email address
                                echo "<input type=\"email\" name=\"email\" value=\"$email\" />\n";
                            }//close while loop
                        //close php tag
                        ?>
                <!--close div-->
                </div>
                <!--submit button which will submit form-->
                <input type="submit" name="submit" value="Next">
            <!--close fieldset-->
			 </fieldset>
         <!--close form tag-->
		 </form>
    <!--close div-->
	</div>
<!--close main tag-->
</main>
<!--include footer-->
<?php
	require_once("../Includes/footer.php");
?>