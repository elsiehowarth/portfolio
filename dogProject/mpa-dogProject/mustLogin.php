<!--open php tag-->
<?php
    //set title
	$title = 'Login';
	//include header
	require_once("../Includes/header.php");
//close php tag
?>
<!--open main tag-->
<main id="content">
    <!--open wrapper-->
	<div class="wrapper">
        <!--open login div-->
		<div id="login-form">
            <!--header-->
            <h3>Login</h3>
            <!--open form-->
			<form method="post" action="loginuser.php" name="login" id="login">
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
                <!--logn button-->
                <input type="submit" name="submit" value="Login">
                <!--open additional button div-->
                <div class="additionalButtons">
                    <p>Or</p>
                    <!--link to register page-->
                    <div id="registerButton">
                        <a href="register.php" class="buttons">Register</a>
                    </div>
                <!--close div-->
                </div>
            <!--close form-->
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