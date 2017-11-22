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
	$route = $action . ucfirst($subject); // eg list course becomes listCourse

	$db = pdoDB::getConnection();

	//set the header to json because everything is returned in that format
	header("Content-Type: application/json");
	// new separate try catch block for db code
	switch ($route) {
		case 'listAdverts':
        	$advertDetails = "SELECT advert.advertID, advert_title, description, price, dob, gender, advert.breedID, county.countyID, advert.countyID, county.countyname, start_date, userID, created_at, breed.breedID, breed.breed_name, available, image.advertID, image.image_path FROM project_dog_advert AS advert
                                INNER JOIN project_dog_breed AS breed
                                ON advert.breedID=breed.breedID 
                                INNER JOIN project_counties AS county
                                ON advert.countyID=county.countyID
                                LEFT JOIN project_images AS image
                                ON advert.advertID=image.advertID
                                WHERE available = 1
                                ORDER BY created_at DESC";

			$nr                = new JSONRecordSet();
	        $retrieve            = $nr->getRecordSet($advertDetails, 'ResultSet');
	        echo $retrieve;
	    break;

	    case 'listBreeds':
        	$listBreeds = "SELECT * FROM project_dog_breed";

			$nr                = new JSONRecordSet();
	        $retrieve            = $nr->getRecordSet($listBreeds, 'ResultSet');
	        echo $retrieve;
	    break;

	    case 'listCounty':
        	$listCounty = "SELECT * FROM project_counties";

			$nr                = new JSONRecordSet();
	        $retrieve            = $nr->getRecordSet($listCounty, 'ResultSet');
	        echo $retrieve;
	    break;


        default:
        	echo '{"status":"error", "message":{"text": "default no action taken"}}';
        break;


		
	}

	?>