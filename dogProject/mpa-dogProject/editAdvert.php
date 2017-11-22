<!--open php tag-->
<?php
    //include databse connection
    include '../Classes/Database_conn.php';


    // create variable to update the info
    $advertID = isset($_REQUEST['advertID']) ? $_REQUEST['advertID'] : NULL;
    $advert_title = isset($_REQUEST['advert_title']) ? $_REQUEST['advert_title'] : NULL;
    $description = isset($_REQUEST['description']) ? $_REQUEST['description'] : NULL;
    $price = isset($_REQUEST['price']) ? $_REQUEST['price'] : NULL;
    $dob = isset($_REQUEST['dob']) ? $_REQUEST['dob'] : NULL;
    $breed = isset($_REQUEST['breed']) ? $_REQUEST['breed'] : NULL;
    $county = isset($_REQUEST['county']) ? $_REQUEST['county'] : NULL;
    $gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : NULL;

    //update advert passing in the requested information
    $editUAdvertInfo = "UPDATE project_dog_advert SET advert_title = '$advert_title', description = '$description', price = '$price', dob = '$dob', gender = '$gender', breedID = '$breed', countyID = '$county' WHERE advertID = '$advertID'";

    //connects to the database or shuts the database
    $queryresult = mysqli_query($conn, $editUAdvertInfo)or die(mysqli_error($conn));

    //if the quert result is true
    if($queryresult){
        //redirect to your advert page
        header ('Location:yourAdverts.php');
        //exit
        exit();
    }//end if
//close php tag
?>