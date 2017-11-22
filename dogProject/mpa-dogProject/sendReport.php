<!--open php tag-->
<?php
  //set the page title
  $title = 'Dog Project - Report Advert';
  //include the header
  require_once("../Includes/header.php");
//close php tag
?>

<!--open main tag-->
<main id="content">
    <!--open wraper-->
	<div class="wrapper">
        <!--open php tag-->
		<?php
			// create a link to the connection file
			require_once ('../Classes/pdoConnection.php');

			// connect to mysql using singleton pdoDB class
			$db = pdoDB::getConnection();

			// create variable to post the info
            $report_type = isset($_REQUEST['report']) ? $_REQUEST['report'] : NULL;
            $description = isset($_REQUEST['description']) ? $_REQUEST['description'] : NULL;
            $date_posted = date('Y-m-d');
            $advertID = isset($_REQUEST['advertID']) ? $_REQUEST['advertID'] : NULL;

            //try statement
            try {
                //if the form has been posted
                if (isset($_POST['submit'])) {

                    //insert data which has been sent through the report form
                    $postReportSQL = $db->prepare("INSERT INTO project_report_advert (report_type, description, date_posted, advertID) VALUES (:report_type, :description, :date_posted, :advertID)");

                    //bind values which are being inserted
                    $postReportSQL->bindParam(':report_type', $report_type);
                    $postReportSQL->bindParam(':description', $description);
                    $postReportSQL->bindParam(':date_posted', $date_posted);
                    $postReportSQL->bindParam(':advertID', $advertID);
					
                    //execute prepared statement
                    $postReportSQL->execute();

                    //if the post report SQL was true
                    if($postReportSQL){
                        //update the advert to not be visiable
                        $updateAdvert = "UPDATE project_report_advert as report INNER JOIN project_dog_advert as advert ON report.advertID=advert.advertID SET advert.Available = 0 WHERE advert.advertID= report.advertID";

                        //execute the query
                        $stmt = $db->query( $updateAdvert );

                        //if the update advert is true
                        if ($updateAdvert) {
                            //echo heading
                            echo "<h3>This advert has been reported</h3>
								<p> This report has been removed from the site, and further investigation will be carried out. Thank you for informing us with your concerns. </p>";
                        }//end if
                    }//end if

                }//end if
            } //end try
            //end catch
            catch
            //if there is an error
            (PDOException $e){
                //echo error message
                echo "<p>Connection error: " . $e->getMessage() . "</p>";
            }//end catch
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

