	<?php

	// create a link to the class definition file
	require_once('../../Classes/pdoConnection.php');
	// connect to mysql using singleton pdoDB class
	require_once('recordset.class.php');

	$action  = isset($_REQUEST['action'])  ? $_REQUEST['action']  : null;
	$subject = isset($_REQUEST['subject']) ? $_REQUEST['subject'] : null;
	$id      = isset($_REQUEST['id'])      ? $_REQUEST['id']      : null;

	if (empty($action)) {
    	if ((($_SERVER['REQUEST_METHOD'] == 'POST') ||
            ($_SERVER['REQUEST_METHOD'] == 'PUT') ||
            ($_SERVER['REQUEST_METHOD'] == 'DELETE')) &&
        	(strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false)) {

        	$input = json_decode(file_get_contents('php://input'), true);

        	$action = isset($input['action']) ? $input['action'] : null;
        	$subject = isset($input['subject']) ? $input['subject'] : null;
        	$data = isset($input['data']) ? $input['data'] : null;
    	}
	}
	// concat action and subject with uppercase first letter of subject
	$route = $action . ucfirst($subject); // eg list details becomes listDetails

	$db = pdoDB::getConnection();

	//set the header to json because everything is returned in that format
	header("Content-Type: application/json");
	// new separate try catch block for db code
	switch ($route) {
        //case which brings back recent adverts, select adverts from the advert table, inner join images, county and breed, order by lastest advert and only show 4 of the lastest adverts
        case 'recentAdverts':
      // store a query into a variable
            $recentAdverts = "SELECT advert.advertID, advert_title, description, price, dob, gender, advert.breedID, county.countyID, advert.countyID, county.countyname, start_date, userID, created_at, breed.breedID, breed.breed_name, available, image.advertID, image.image_path FROM project_dog_advert AS advert
                            INNER JOIN project_dog_breed AS breed
                            ON advert.breedID=breed.breedID 
                            INNER JOIN project_counties AS county
                            ON advert.countyID=county.countyID
                            LEFT JOIN project_images AS image
                            ON advert.advertID=image.advertID
                            WHERE Available = 1
                            ORDER BY created_at desc limit 4";


            $nr                = new JSONRecordSet();
            $retrieve            = $nr->getRecordSet($recentAdverts, 'ResultSet');
            echo $retrieve;
        break;
        //show details about a specific advert based on the advert id passed through. inner join to image, county and breed table, Where advert id = id that has been passed through
        case 'listDetails':
            $id                = $db->quote($id);
            $advertDetails = "SELECT advert.advertID, advert_title, description, price, dob, gender, advert.breedID, county.countyID, advert.countyID, county.countyname, start_date, advert.userID, advert.created_at, breed.breedID, breed.breed_name, available, image.advertID, image.image_path, user.userID, user.contact_num FROM project_dog_advert AS advert
                INNER JOIN project_dog_breed AS breed
                ON advert.breedID=breed.breedID 
                INNER JOIN project_counties AS county
                ON advert.countyID=county.countyID
                INNER JOIN project_users AS user
                ON advert.userID=user.userID
                LEFT JOIN project_images AS image
                ON advert.advertID=image.advertID
                WHERE advert.advertID=$id";

            $nr                = new JSONRecordSet();
            $retrieve            = $nr->getRecordSet($advertDetails, 'ResultSet');
            echo $retrieve;
        break;

        //select all adverts, inner join image, county and breed
        case 'allAdverts':
            $allAdverts = "SELECT advert.advertID, advert_title, description, price, dob, gender, advert.breedID, county.countyID, advert.countyID, county.countyname, start_date, userID, created_at, breed.breedID, breed.breed_name, available, image.advertID, image.image_path FROM project_dog_advert AS advert
                                INNER JOIN project_dog_breed AS breed
                                ON advert.breedID=breed.breedID 
                                INNER JOIN project_counties AS county
                                ON advert.countyID=county.countyID
                                LEFT JOIN project_images AS image
                                ON advert.advertID=image.advertID
                                WHERE Available = 1
                                ORDER BY created_at DESC";

            $nr                = new JSONRecordSet();
            $retrieve            = $nr->getRecordSet($allAdverts, 'ResultSet');
            echo $retrieve;
        break;
        //select all breed names and id to be passed in to a select tag within the register form
        case 'listBreeds':
            $listBreeds = "SELECT * FROM project_dog_breed";

            $nr                = new JSONRecordSet();
            $retrieve            = $nr->getRecordSet($listBreeds, 'ResultSet');
            echo $retrieve;
        break;
        //select all county names and id to be passed in to a select tag within the register form
        case 'listCounty':
            $listCounty = "SELECT * FROM project_counties";

            $nr                = new JSONRecordSet();
            $retrieve            = $nr->getRecordSet($listCounty, 'ResultSet');
            echo $retrieve;
        break;


        //insert the data which the user has inputted to buy a dog
        //if the data is successful
            //update advert to make the available field = 0
            //UPDATE project_dog_advert as advert INNER JOIN project_dog_buying as bought ON advert.advertID=bought.advertID SET advert.Available = 0 WHERE advert.advertID= bought.advertID;
        //this should hide the advert from all advert listings
        case 'insertBuyer':
         if (!empty($data)) {
             $buyer = json_decode($data, true);

             $buyAdvertSQL = $db->prepare("INSERT INTO project_dog_buying(userID, advertID, title, first_name, surname, email, contact_num, buying_date, new_purchase, edited_purchase, deleted_purchase) VALUES (:userID, :advertID, :title, :first_name, :surname, :email, :contact_num, :buying_date, :new_purchase, :edited_purchase, :deleted_purchase)");

            try {
                $buyAdvertSQL->bindParam(':userID', $buyer['userID']);
                $buyAdvertSQL->bindParam(':advertID', $buyer['advertID']);
                $buyAdvertSQL->bindParam(':title', $buyer['title']);
                $buyAdvertSQL->bindParam(':first_name', $buyer['first_name']);
                $buyAdvertSQL->bindParam(':surname', $buyer['surname']);
                $buyAdvertSQL->bindParam(':email', $buyer['email']);
                $buyAdvertSQL->bindParam(':contact_num', $buyer['contact_num']);
                $buyAdvertSQL->bindParam(':buying_date', $buyer['buying_date']);
                $buyAdvertSQL->bindParam(':new_purchase', $buyer['new_purchase']);
                $buyAdvertSQL->bindParam(':edited_purchase', $buyer['edited_purchase']);
                $buyAdvertSQL->bindParam(':deleted_purchase', $buyer['deleted_purchase']);

                /* execute prepared statement */
                $buyAdvertSQL->execute();


                if($buyAdvertSQL) {

                    $updateAdvert = "UPDATE project_dog_advert as advert 
                                      INNER JOIN project_dog_buying as bought 
                                      ON advert.advertID=bought.advertID SET advert.Available = 0 
                                      WHERE advert.advertID= bought.advertID";

                    $stmt = $db->query( $updateAdvert );


                    echo '{"status":"ok", "message":{"text":"Advert Booked"}}';
//
                }

            }
            catch
            (PDOException $e){
                echo "<p>Connection error: " . $e->getMessage() . "</p>";
            }
        }
        break;

        case 'reportAdvert':
            if (!empty($data)) {
                $report = json_decode($data, true);

                $postReportSQL = $db->prepare("INSERT INTO project_report_advert (report_type, description, date_posted, advertID) VALUES (:report_type, :description, :date_posted, :advertID)");
                try {
                    $postReportSQL->bindParam(':report_type', $report['report_type']);
                    $postReportSQL->bindParam(':description', $report['description']);
                    $postReportSQL->bindParam(':date_posted', $report['date_posted']);
                    $postReportSQL->bindParam(':advertID', $report['advertID']);

                    /* execute prepared statement */
                    $postReportSQL->execute();


                    if($postReportSQL) {

                        $updateAdvert = "UPDATE project_report_advert as report 
                                          INNER JOIN project_dog_advert as advert ON report.advertID=advert.advertID 
                                          SET advert.Available = 0 WHERE advert.advertID= report.advertID";

                        $stmt = $db->query( $updateAdvert );


                        echo '{"status":"ok", "message":{"text":"Advert Reported"}}';
//
                    }

                }
                catch
                (PDOException $e){
                    echo "<p>Connection error: " . $e->getMessage() . "</p>";
                }
            }
            break;

        case 'insertAdvert':
            if (!empty($data)) {
                $advertiser = json_decode($data, true);

                $postAdvertSQL =  $db->prepare("INSERT INTO project_dog_advert (advert_title, description, price, dob, gender, breedID, countyID, start_date, userID, created_at, Available) VALUES (:advert_title, :description, :price, :dob, :gender, :breedID, :countyID, :start_date, :userID, :created_at, :Available)");

                try {

                    $postAdvertSQL->bindParam(':advert_title', $advertiser['advert_title']);
                    $postAdvertSQL->bindParam(':description', $advertiser['description']);
                    $postAdvertSQL->bindParam(':price', $advertiser['price']);
                    $postAdvertSQL->bindParam(':dob', $advertiser['dob']);
                    $postAdvertSQL->bindParam(':gender', $advertiser['gender']);
                    $postAdvertSQL->bindParam(':breedID', $advertiser['breedID']);
                    $postAdvertSQL->bindParam(':countyID', $advertiser['countyID']);
                    $postAdvertSQL->bindParam(':start_date', $advertiser['start_date']);
                    $postAdvertSQL->bindParam(':userID', $advertiser['userID']);
                    $postAdvertSQL->bindParam(':created_at', $advertiser['created_at']);
                    $postAdvertSQL->bindParam(':Available', $advertiser['Available']);


                    /* execute prepared statement */
                    $postAdvertSQL->execute();
                    //if retrieve is true then update tables to change available to 0
                    if ($postAdvertSQL) {
//                        $selectAddedAdvert = "SELECT advertID, userID FROM project_dog_advert WHERE userID=10 ORDER BY advertID DESC LIMIT 1";
//
//                        $nr                = new JSONRecordSet();
//                        $retrieve            = $nr->getRecordSet($selectAddedAdvert, 'ResultSet');
//                        echo $retrieve;

                        echo '{"status":"ok", "message":{"text":"Advert Inserted"}}';

                    } else {
                        echo '{"status":{"error":"error", "text":"This booking was not successful"}}';
                    }
                } catch (Exception $e) {
                    echo '{"status":{"error":"error", "text":'.$e->getMessage().'}}';
                }
            }
            break;

        case 'insertImage':
            if (!empty($data)) {
                $image = json_decode($data, true);
            //create variable which calls a directory which the image will be saved in
            $target_dir = "../uploads/";
            $file_name = $image['image_path'];
            $target_file = $target_dir . $file_name;
            //set uploadok to 1
            $uploadOk = 1;
            //over wite image_path within the image array
            $image['image_path'] = $target_file;
            //move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file);


                // Check file size
//                if ($_FILES[":image_path"]["size"] > 500000) {
//                    echo "Sorry, your file is too large.";
//                    $uploadOk = 0;
//                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk) {
                    $saveImageURL = $db->prepare("INSERT INTO project_images (image_path, advertID) VALUES (:image_path, :advertID)");

                    try {
                        $saveImageURL->bindParam(':image_path', $image['image_path']);
                        $saveImageURL->bindParam(':advertID', $image['advertID']);

                        /* execute prepared statement */
                        $saveImageURL->execute();

                        if ($saveImageURL) {
                           echo '{"status":"ok", "message":{"text":"Image Inserted"}}';
                        } else {
                            echo '{"status":{"error":"error", "text":"This image was not added successfully"}}';
                        }
                    } catch (Exception $e) {
                        echo '{"status":{"error":"error", "text":' . $e->getMessage() . '}}';
                    }

                } else {
                    echo "Sorry, your file was not uploaded.";
                }
            }

            break;

        case 'selectAdvert':
            // store a query into a variable
            $currentAdvert = "SELECT advertID, userID FROM project_dog_advert WHERE userID=10 ORDER BY advertID DESC LIMIT 1";

            $nr                = new JSONRecordSet();
            $retrieve            = $nr->getRecordSet($currentAdvert, 'ResultSet');
            echo $retrieve;
            break;


        //if there are errors with the statements above show error	
        default:
        	echo '{"status":"error", "message":{"text": "default no action taken"}}';
        break;


		
	}

	?>