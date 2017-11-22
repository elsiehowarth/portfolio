<!--start of php-->
<?php
	session_start();
	if (isset($_SESSION)) {
		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy();
	}	

	header("Location:index.php");//sends the user to the home page when they press log out.

?><!--end of php-->
