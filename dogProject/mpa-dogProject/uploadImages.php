<!--open php tag-->
<?php
    //include database connection
    include '../Classes/Database_conn.php';
    //get and store the advertid from the query string
    $advertID = isset($_REQUEST['advertID']) ? $_REQUEST['advertID'] : NULL;

    //create a variable which is the upload file path
    $target_dir = "../uploads/";
    //create variable which will add the file name to the file path variable
//    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    $target_file = $target_dir .  date('d_m_Y_H_i_s') . '_' . $advertID . '_' . $_FILES["fileToUpload"]["name"];
    //set a variable to =1
    $uploadOk = 1;
    //find what file type the image is
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        //create variable which holds the image size
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        //if the file is a size
        if($check !== false) {
            //echo file is an image
            echo "File is an image - " . $check["mime"] . ".";
            //keep upload ok to 1
            $uploadOk = 1;
        }//end if
        //else
        else {
            //file is not an image
            echo "File is not an image.";
            //change uploadOk to 0
            $uploadOk = 0;
        }//end else
    }//end if
    // Check if file already exists
    if (file_exists($target_file)) {
        //echo error
        echo "Sorry, file already exists.";
        //change uploadOk to 0
        $uploadOk = 0;
    }//end if
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        //echo error message
        echo "Sorry, your file is too large.";
        //change uploadOk to be 0
        $uploadOk = 0;
    }//end if
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        //echo error message
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        //change uploadOk to be 0
        $uploadOk = 0;
    }//end if
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //echo error message
        echo "Sorry, your file was not uploaded.";
    } //end if
    // if everything is ok, try to upload file
    else {
        //if the file is moved to the set file path
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //insert the file path to the database
            $saveImageURL = "INSERT INTO project_images (image_path, advertID) VALUES ('$target_file', '$advertID')";

            //connects to the database or shuts the database
            $queryresult = mysqli_query ($conn, $saveImageURL) or die(mysqli_error($conn));

            //if queryresult is true then redirect user
            if($queryresult){
                //redirect to advert confirmation sending in advert id
                header("Location: advertConfirmation.php?advertID=".$advertID);
                //exit
                exit();
            }//end if
        }//end if
        //else
        else {
            //echo a error message
            echo "Sorry, there was an error uploading your file.";
        }//end else
    }//end else
//close php tag
?>