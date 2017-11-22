<!--open php tag-->
<?php
    //set title
	$title = 'Dog Project - Edit Advert';
	//require header
	require_once("../Includes/header.php");
//end php tag
?>
<!--open main tag-->
<main id="content">
    <!--open wrapper-->
	<div class="wrapper">
        <!--header-->
	    <h3>Your Details</h3>
        <!--open php tag-->
         <?php
            // create a link to the class definition file
            require_once('../Classes/pdoConnection.php');
            // connect to mysql using singleton pdoDB class
            $db = pdoDB::getConnection();

            //create variable which holds session user id
            $userID = $_SESSION['userID'];

            //create variable which holds advert id
            $advertID = isset($_REQUEST['advertID']) ? $_REQUEST['advertID'] : NULL;

            // new separate try catch block for db code
            try {
                // store a query into a variable
                $advertDetails = "SELECT advert.advertID, advert_title, description, price, dob, gender, advert.breedID, county.countyID, advert.countyID, county.countyname, start_date, userID, created_at, breed.breedID, breed.breed_name, available, image.advertID, image.image_path FROM project_dog_advert AS advert
                                INNER JOIN project_dog_breed AS breed
                                ON advert.breedID=breed.breedID 
                                INNER JOIN project_counties AS county
                                ON advert.countyID=county.countyID
                                LEFT JOIN project_images AS image
                                ON advert.advertID=image.advertID
                                WHERE advert.advertID = '$advertID'
                                ORDER BY created_at";

                // call the query method of the $db object passing the sql as a parameter
                // and store the statement object that is returned in the variable $stmt
                $stmt = $db->query( $advertDetails );

                // iterate through the result set calling the statement object's fetchObject() method
                // and store the object returned in the variable $advert
                while ( $advert = $stmt->fetchObject()){
                    //echo a form which pre fills the input fields with the specific advert
                    echo " <form method='post' action='editAdvert.php' name='advert' id='advert'>
                            
                            <input type='text' name='advertID' value='". $advert->advertID ."' hidden>
        
                            <div id='form-content'>
                                <label for='advert_title'>Name/Title</label></br>
                                  <input type='text' name='advert_title' required='required' value='" . $advert->advert_title ."'>
                            </div>
        
                            <div id='form-content'>
                                <label for='description'>Description</label></br>
                                    <textarea type='text' name='description' required='required'>" . $advert->description . "</textarea>
                            </div>
        
                            <div class='form-content'>
                            <label for='breed'>Dog Breed</label></br>
                                <select id='breed' name='breed'>
                                    <option value='" . $advert->breedID. "'>" .$advert->breed_name. "</option>";

                                    $breedSQL = mysqli_query($conn, "SELECT * FROM project_dog_breed");
                                            if(mysqli_num_rows($breedSQL) > 0) {
                                                while($category = mysqli_fetch_assoc($breedSQL)) {
                                                    echo '<option value="' . $category['breedID'] . '">' . $category['breed_name'] . '</option>';
                                                }
                                            }
                            echo "
                                </select>
                                </div>
        
                            <div id='form-content'>
                                <label for='dob'>Date of Birth</label></br>
                                    <input type='text' required='required' name='dob' value='" . $advert->dob ."'>
                            </div> 
        
                            <div id='form-content'>
                                <label for='price'>Price</label></br>
                                    <input type='text' name='price' required='required' value='" . $advert->price . "'>
                            </div>
        
                           <div class='form-content'>
                                <label for='county'>County</label></br>
                                    <select id='county' name='county'>
                                         <option value='" . $advert->countyID. "'>" .$advert->countyname. "</option>";

                                        $countySQL = mysqli_query($conn, "SELECT * FROM project_counties");
                                        if(mysqli_num_rows($countySQL) > 0) {
                                            while($category = mysqli_fetch_assoc($countySQL)) {
                                                echo '<option value="' . $category['countyID'] . '">' . $category['countyname'] . '</option>';
                                            }
                                        }
                            echo "
                                    </select>
                            </div> 
        
                            <div class='form-content'>
                                <label for='gender'>Gender</label></br>
                                    <select id='gender' name='gender'>
                                        <option value='" . $advert->gender . "'>" .$advert->gender . "</option>
                                        <option value='Male'>Male</option>
                                        <option value='Female'>Female</option>
                                    </select>
                            </div> 
        
                            <input type='submit' name='edit' value='Edit Advert'> 
        
        
                        </form>
        
                            ";

                }//end while loop
            }//end try
            //open catch
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