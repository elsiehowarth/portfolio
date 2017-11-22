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
	<div class="wrapper">
	<!--page title-->
		<h3>
			Report Advert
		</h3>
        <!--paragraph with instructions-->
		<p>Please complete the form below with details of why the advert is being reported</p>
		<!--open form tag which will be sent to a php page which will ask the user for morre info-->
		<form method="post" action="sendReport.php" name="report" id="report" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
			 <!--open fieldset-->
			 <fieldset>
                <!--open php tag-->
                 <?php
                    //create variable which holds advert id
                    $advertID = isset($_REQUEST['advertID']) ? $_REQUEST['advertID'] : NULL;
                    //echo input text with advert id and make it hidden
                    echo "<input type=\"text\" name=\"advertID\" value=\"$advertID\" hidden/>\n";
                 //close php tag
                 ?>
                 <!--input field report with label-->
                 <div id="form-content">
                     <label for="report">Report type</label></br>
                        <input type="radio" name="report" value="illegal"> This dog is an illegal breed<br>
                        <input type="radio" name="report" value="spam"> This advert is spam<br>
                        <input type="radio" name="report" value="duplicate"> This advert is a duplicate<br>
                        <input type="radio" name="report" value="postingrules"> This advert goes against posting rules<br>
                 </div><!--close div-->
                 <br><!--break-->
                 <!-- textarea for description with label-->
                 <div id="form-content">
                     <textarea type="text" name="description" placeholder="Please provide us with more information"></textarea>
                 </div><!--close div-->
                 <!--report button-->
                 <input type="submit" name="submit" value="Report">
            <!--close fieldset-->
			</fieldset>
        <!--close form tag-->
		</form>
    <!--close wrapper-->
	</div>
<!--close main tag-->
</main>
<!--include footer -->
<?php
	require_once("../Includes/footer.php");
?>