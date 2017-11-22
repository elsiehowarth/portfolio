<?php
	$title = 'Advert Confirmation';
	require_once("../Includes/header.php");
?>

<!--open main tag-->
<main id="content">
    <!--open wrapper div-->
	<div class="wrapper">
        <!--header-->
		<h3>
			Advert Confirmation
		</h3>
        <!--open php tag-->
		 <?php
            //include connection file
		 	include '../Classes/Database_conn.php';
            //create variable which holds session user id
            $myID = $_SESSION['userID'];
            //create variable which holds the advert id from the url
			$advertID = isset($_REQUEST['advertID']) ? $_REQUEST['advertID'] : NULL;
            //select advert details, breed, and county
			$advertDetails = "SELECT advertID, advert_title, description, price, dob, gender, advert.breedID, county.countyID, advert.countyID, county.countyname, start_date, userID, created_at, breed.breedID, breed.breed_name FROM project_dog_advert AS advert
				INNER JOIN project_dog_breed AS breed
				ON advert.breedID=breed.breedID 
				INNER JOIN project_counties AS county
				ON advert.countyID=county.countyID
				WHERE advertID='$advertID'";

			//connects to the database or shuts the database
			$queryresult = mysqli_query($conn, $advertDetails) 
			or die(mysqli_error($conn));

			//while loop that will fetch the advert details
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

                //echo paragraphs with the retrieved data
                echo "<p><strong>Title:</strong> $advert_title</p>
                    <p><strong>Description:</strong> $description</p>
                    <p><strong>Price:</strong> $price</p>
                    <p><strong>Date Of Birth:</strong> $dob</p>
                    <p><strong>Breed:</strong> $breed </p>
                    <p><strong>Location: </strong> $county </p>
                    <p><strong>Gender:</strong> $gender </p>
                    <p><strong>Available from:</strong> $start_date</p>";
			}//end while loop
         //end php tag
		 ?>
    <!--close div-->
	</div>
<!--close main tag-->
</main>
<!--include footer-->
<?php
	require_once("../Includes/footer.php");
?>