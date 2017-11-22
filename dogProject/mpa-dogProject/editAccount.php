<!--open php tag-->
<?php
    //include databse connection
    include '../Classes/Database_conn.php';

    // <!-- create variable to post the info -->
    $userID = isset($_REQUEST['userID']) ? $_REQUEST['userID'] : NULL;
    $title = isset($_REQUEST['title']) ? $_REQUEST['title'] : NULL;
    $firstName = isset($_REQUEST['firstName']) ? $_REQUEST['firstName'] : NULL;
    $surname = isset($_REQUEST['surname']) ? $_REQUEST['surname'] : NULL;
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : NULL;
    $county = isset($_REQUEST['county']) ? $_REQUEST['county'] : NULL;
    $dob = isset($_REQUEST['dob']) ? $_REQUEST['dob'] : NULL;
    $contactNumber = isset($_REQUEST['contactNumber']) ? $_REQUEST['contactNumber'] : NULL;
    $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : NULL;

    //update user passing in the requested information
    $editUserInfo = "UPDATE project_users SET title = '$title', first_name = '$firstName', surname = '$surname', email = '$email', contact_num = '$contactNumber', username = '$username', birthdate = '$dob', countyID = '$county' WHERE userID = '$userID'";

    //connects to the database or shuts the database
    $queryresult = mysqli_query($conn, $editUserInfo)or die(mysqli_error($conn));

    //if the quert result is true
    if($queryresult){
        //redirect to your details
        header ('Location:yourDetails.php');
        //exit
        exit();
    }//end if
//end php tag
?>