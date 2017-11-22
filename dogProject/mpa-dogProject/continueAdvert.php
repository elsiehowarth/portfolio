<!--open php tag-->
<?php
    //set the title
    $title = 'Add image to Advert';
    //include the header
	require_once("../Includes/header.php");
//close php tag
?>
<!--open main tag-->
<main id="content">
    <!--open wrapper -->
	<div class="wrapper">
        <!--heading-->
		<h3>
			Create a New Advert
		</h3>
        <!--paragraph-->
		<p>Please complete the form below with advert details</p>
        <!--open php tag-->
        <?php
            //create variable which holds session user id
            $userID = $_SESSION['userID'];
            //query to get full record details
            $sql = "SELECT advertID, userID FROM project_dog_advert WHERE userID=$userID ORDER BY advertID DESC LIMIT 1";

            //connects to the database or shuts the database
            $queryresult = mysqli_query ($conn, $sql)
            or die(mysqli_error($conn));

            //Store single record returned by query
            $row = mysqli_fetch_assoc($queryresult);

            // extract into simple variables from the associative array $row the data for each field
            $advertID = $row['advertID'];

            // display a form with each input element using the value we have in the vars
            echo "<form action=\"uploadImages.php?advertID=$advertID\" method=\"post\" enctype=\"multipart/form-data\">\n";
            echo "<h4>Advert Image*:</h4>";
            echo "<br>";
            echo "<input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\">";
            echo "<input type=\"submit\" name=\"submit\" value=\"Next\">";
            echo "</form>";
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