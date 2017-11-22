<?php
	//set the title of the page
	$title = 'Your Account';
	//include the header
	require_once("../Includes/header.php");
?>
<!--open main tag-->
<main id="content">
    <!--open wrapper div-->
	<div class="wrapper">
	<!--title of page-->
		<h3>
			My Account
		</h3>
		<!--links which will be displayed to the user-->
		<p><a href="yourDetails.php">Your Details</a></p>
		<p><a href="yourAdverts.php">Your Adverts</a></p>

		
	<!--close wrapper div-->
	</div>
<!--close main tag-->
</main>

<!--include footer-->
<?php
	require_once("../Includes/footer.php");
?>