<?php
    // include user information file
    require_once("../Includes/userInformation.php");
    // connect to database
    include '../Classes/Database_conn.php';

    //get the posted username and password
    $username = filter_has_var(INPUT_POST, 'username') ? $_POST['username']: null;
    $password  = filter_has_var(INPUT_POST, 'password') ? $_POST['password']: null;

    //prevent sql injection
    $username = mysqli_real_escape_string($conn,$username);
    $password = mysqli_real_escape_string($conn,$password);

    //if the username and password are empty
    if ((!empty($username)) && (!empty($password))) {
        //Query the users database table to get the password hash for the username entered by the user in the logon form
        $loginSQL = "SELECT userID, password FROM project_users WHERE username = ?";
        //use prepared statements on the sql statement
        $stmt = mysqli_prepare($conn, $loginSQL);

        //Bind the $username entered by the user to the prepared statement.
        mysqli_stmt_bind_param($stmt, "s", $username);
        //execute the query
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $userID, $passwordHash);

        //if the stmt was true
        if (mysqli_stmt_fetch($stmt)) {

            //Get the password hash from the query results for the given username and store it in the variable indicated
            if (password_verify($password, $passwordHash)) {
                //set session user id
                $_SESSION['userID'] = $userID;
                //set session user logged in to true
                $_SESSION['userLogged'] = TRUE;
                //redirect to index page
                header('Location: index.php');
            }//end if
            //else
            else{
                //create variable with error message
                $incorrect = "These details are incorrect, please try again";
                //redirect to login page sending in incorrect error variable
                header("Location: login.php?failed=$incorrect"); /* Redirect browser */
            }//end else
        }//end if
        //if the session is empty
        if(empty($_SESSION['userID'])) {
            //create variable with error message
            $incorrect = "These details are incorrect, please try again";
            //redirect to login page sending in incorrect error variable
            header("Location: login.php?failed=$incorrect"); /* Redirect browser */
        }//end if
        //close stmt
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }//end if

    //function to check login
    function checkLogin($params){
        //return true
        return true;
    }//end function
//close php tag
?>