<!--open php tag-->
<?php
    //set title
	$title = 'Dog Project - Edit Details';
	//include header
	require_once("../Includes/header.php");
//close php tag
?>
<!--open main tag-->
<main id="content">
    <!--open wrapper -->
	<div class="wrapper">
        <!--header-->
	    <h3>Your Details</h3>
            <!--open php tag-->
            <?php
                //include connection file
		 	    include '../Classes/Database_conn.php';

		 	    //create variable which holds session user id
                $myID = $_SESSION['userID'];

                //select information about the logged in user through the user id within the session
			    $userDetail = "SELECT userID, title, first_name, surname, email, contact_num, username, password, birthdate, user.countyID, county.countyID, county.countyname, created_at FROM project_users AS user 
				  INNER JOIN project_counties AS county
				  ON user.countyID=county.countyID 
				  WHERE userID='$myID'";

			    //connects to the database or shuts the database
			    $queryresult = mysqli_query($conn, $userDetail)
			    or die(mysqli_error($conn));

			    //while loop that will fetch the message detaiils
			    while ($row = mysqli_fetch_assoc($queryresult)) {
				      	
				    //variables created and linked to the rows in the database
				    $userID = $row['userID'];
				    $title = $row['title'];
				    $first_name = $row['first_name'];
				    $surname = $row['surname'];
				    $email = $row['email'];
				    $contact_num = $row['contact_num'];
				    $username = $row['username'];
				    $birthdate = $row['birthdate'];
				    $countyID = $row['countyID'];
				    $countyName = $row['countyname'];

                    //echo a form which pre fills the input fields with the specific users details
                    echo "<form method='post' action='editAccount.php' name='editAccount'>
					
                    <input type='text' name='userID' value='$userID' hidden>

					<div id='form-content'>
                		<label for='title'>Title</label></br>
                    		<input type='text' name='title' required='required' value='$title'>
            		</div>

            		<div id='form-content'>
                		<label for='firstname'>First Name</label></br>
                    		<input type='text' name='firstName' required='required' value='$first_name'>
            		</div>

            		<div id='form-content'>
                		<label for='surname'>Surname</label></br>
                    		<input type='text' name='surname' required='required' value='$surname'>
            		</div>

            		<div id='form-content'>
                		<label for='email'>Email</label></br>
                    		<input type='email' required='required' id='email' required='required' name='email' value='$email'>
            		</div> 

           		 	<div class='form-content'>
                		<label for='county'>County</label></br>
                    		<select id='county' name='county'>
                        		<option value='$countyID'>$countyName</option>";
                                
                                $countySQL = mysqli_query($conn, "SELECT * FROM project_counties");
                                if(mysqli_num_rows($countySQL) > 0) {
                                    while($category = mysqli_fetch_assoc($countySQL)) {
                                        echo '<option value="' . $category['countyID'] . '">' . $category['countyname'] . '</option>';
                        			}
                   				}
       				echo "
                    		</select>
            		</div> 

            		<div id='form-content'>
                		<label for='dob'>Date of Birth</label></br>
                     		<input type='date' required='required' id='dob' name='dob' value='$birthdate'>
             		</div> 

             		<div id='form-content'>
                		<label for='contactNumber'>Contact Number</label></br>
                     		<input type='text' id='contactNumber' required='required' name='contactNumber' value='$contact_num'>
            		</div>

            		<div id='form-content'>
                		<label for='username'>Username</label></br>
                    		<input type='text' name='username' required='required' value='$username'>
            		</div>

            		  <input type='submit' name='edit' value='Edit Details'> 


            	</form>";

			}//end while loop
        //end php tag
		 ?>
    <!--Close wrapper-->
	</div>
<!--close main tag-->
</main>
<!--include footer-->
<?php
    require_once("../Includes/footer.php");
?>