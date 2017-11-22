<!--open php tag-->
<?php
    //set title
	$title = 'Dog Project';
	//include header
	require_once("../Includes/header.php");
//close php tag
?>
<!--open main tag-->
<main id="content">
    <!--open wrapper -->
	<div class="wrapper">
        <!--heading-->
	    <h3>Your Details</h3>
        <!--open php tag-->
        <?php
            //include connection file
		 	include '../Classes/Database_conn.php';

		 	//create variable which holds session user id
			$myID = $_SESSION['userID'];

			//select the users details based on the userID
			$userDetail = "SELECT userID, title, first_name, surname, email, contact_num, username, password, birthdate, countyID, created_at FROM project_users WHERE userID='$myID'";

			//connects to the database or shuts the database
			$queryresult = mysqli_query($conn, $userDetail) 
			or die(mysqli_error($conn));

			//while loop that will fetch the user details
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

                //echo users details
			    echo "<p><strong>Name:</strong> $title $first_name $surname</p>
				    <p><strong>Email:</strong> $email</p>
				    <p><strong>Contact Number:</strong> $contact_num</p>
				    <p><strong>Username:</strong> $username</p>
				    <p><strong>Birth Date:</strong> $birthdate</p>
				    <a href='editInformation.php' class='buttons'><i class='fa fa-edit fa-fw'></i>Edit Details</a>
				    <a href='deleteAccount.php' class='buttons'><i class='fa  fa-close fa-fw'></i>Delete Account</a>";
			}//end while loop
        //end php tag
		 ?>
    <!--close wrapper-->
	</div>
<!--close main-->
</main>
<!--include footer-->
<?php
    require_once("../Includes/footer.php");
?>