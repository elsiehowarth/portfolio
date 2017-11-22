<!--open php tag-->
<?php
    //set title
	$title = 'Login';
	//require header
	require_once("../Includes/header.php");
//close php tag
?>
<!--open main tag-->
<main id="content">
    <!--open wrapper-->
	<div class="wrapper">
        <!--open form tag which will be sent to a php page which will ask the user for more info-->
        <?php
        //if the url includes failed
        if(isset($_GET['failed'])){
            //create a variables which holds the failed part of the url
            $error = $_GET['failed'];
            //echo the error message
            echo "<div class='warning'><p><i class='fa fa-exclamation-triangle' aria-hidden='true'></i>$error</p></div>";
        }//end if
        ?><!--close php tag-->
        <!--open login div-->
		<div id="login-form">
            <!--header-->
		    <h3>Login</h3>
            <!--open form tag-->
			<form method="post" action="loginuser.php" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> name="login" id="login">
                <!--username input text and label-->
                <div id="form-content">
                    <div class="input-group">
                        <input type="text" name="username" required="required" placeholder='&#xf007; Enter your Username' autofocus>
                    </div>
                </div><!--close div-->
                <!--password input and label-->
                <div id="form-content">
                    <div class="input-group">
                        <input type="password" name="password" required="required" placeholder='&#xf007; Enter your Password' autofocus>
                    </div>
                </div><!--close div-->
                <!--login button-->
                <input type="submit" name="submit" value="Login">
            <!--close form -->
            </form>
        <!--close login div-->
		</div>
    <!--close wrapper-->
	</div>
<!--close main tag-->
</main>
<!--include footer-->
<?php
	require_once("../Includes/footer.php");
?>