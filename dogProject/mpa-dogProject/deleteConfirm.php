<!--open php tag-->
<?php
    //set title
	$title = 'Dog Project - Your Adverts';
	//include header
	require_once("../Includes/header.php");
//end php tag
?>
<!--open main tag-->
<main id="content">
    <!--open wrapper-->
	<div class="wrapper">
        <!--open php tag-->
		<?php
            //if confirm
            if (isset($_POST['confirm'])) {
                //if confirm was equal to yes
                if ($_POST['confirm'] == 'Yes') {
                    //redirect to delete advert
                    header("Location:deleteAdvert.php?");
                }//end if
            }//end if
        //end php tag
		?>
        <!-- open form-->
		<form method="post">
            <!--open php tag-->
			<?php
                //create variable which holds the advert id from the url
                $advertID = isset($_REQUEST['advertID']) ? $_REQUEST['advertID'] : NULL;

                //if there is a advert id
                if(isset($_REQUEST['advertID'])) {
                    //echo delete or back button
					echo "
		 			<div id='form-content'>
			 			<label for='advert_delete'>Are you sure you want to delete this advert?</label></br>
							<a class='buttons' href='deleteAdvert.php?advertID=$advertID'>Delete</a>
							<a class='buttons' href=\"javascript:history.go(-1)\">GO BACK</a>
					</div>";

				}//end if
            //close php tag
			?>
        <!--close form tag-->
		</form>
    <!--close wrapper-->
	</div>
<!--close main tag-->
</main>
<!--include footer-->
<?php
    require_once("../Includes/footer.php");
?>
