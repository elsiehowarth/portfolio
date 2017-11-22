<!--open php tag-->
<?php
    //set title
    $title = 'Register';
    //include header
    require_once("../Includes/header.php");
//close php tag
?>
<!--open main tag -->
<main id="content">
    <!--open wrapper-->
    <div class="wrapper">
        <!--open php tag -->
        <?php
            //if the url include failed
            if(isset($_GET['failed'])){
                //echo the error message
                $error = $_GET['failed'];
                //echo the error message
                echo "<div class='warning'><p><i class='fa fa-exclamation-triangle' aria-hidden='true'></i>$error</p></div>";
            }//end if
        //close php tag
        ?>
        <!--Title-->
        <h3>Register an Account</h3>

        <!--open form tag to register -->
        <form method="post" action="registeruser.php" name="register">
            <!--title select field and label-->
            <div id="form-content">
                <label for="title">Title*</label></br>
                    <select id="title" name="title">
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        <option value="Ms">Ms</option>
                        <option value="Doctor">Doctor</option>
                    </select>
            </div>
            <!--First Name input field and label-->
            <div id="form-content">
                <label for="firstname">First Name*</label></br>
                    <input type="text" name="firstName" required="required" placeholder='&#xf007; Please Enter your First Name'>
            </div>
            <!--Surname input field and label-->
            <div id="form-content">
                <label for="surname">Surname*</label></br>
                    <input type="text" name="surname" required="required" placeholder='&#xf007; Please Enter your Surname'>
            </div>
            <!--Email input field and label-->
            <div id="form-content">
                <label for="email">Email*</label></br>
                    <input type="email" class="form-control" required="required" id="email" required="required" name="email" placeholder='&#xf0e0; Enter your emaail'>
            </div>

            <!--county select field and label-->
            <div class="form-content">
                <label for="county">Where do they live*</label></br>
                <!--open select statement-->
                <select id="county" name="county">
                    <!--default option-->
                    <option value="" disabled">Please Select a County*</option>
                    <!--open php tag-->
                    <?php
                    // create a link to the class definition file
                    require_once('../Classes/pdoConnection.php');

                    //call get connection function and assign to variable
                    $db = pdoDB::getConnection();

                    // new separate try catch block for db code
                    try {
                        //sql which brings back the county id and county name
                        $countySQL = "SELECT * FROM project_counties";

                        // call the query method of the $db object passing the sql as a parameter
                        // and store the statement object that is returned in the variable $stmt
                        $stmt = $db->query($countySQL);

                        //create variable to hold the statement which makes sure there is countys in the list
                        $findCounty = $stmt->rowCount() > 0;

                        //if statement to make sure there is countys in the list
                        if ($findCounty) {
                            // iterate through the result set calling the statement object's fetchObject() method
                            // and store the object returned in the variable $county
                            while ($county = $stmt->fetchObject()) {
                                //create the id and name as an option
                                echo '<option value="' . $county->countyID . '">' . $county->countyname . '</option>';
                            }//end while loop
                        }//end if statement
                    } //end try statement
                    catch//catch statement
                    (PDOException $e){//if there is an error
                        //echo connecion error
                        echo "<p>Connection error: " . $e->getMessage() . "</p>";
                    }//close catch tag
                    //close php tag
                    ?>
                    <!--close select tag -->
                </select>
                <!--close div-->
            </div>
            <!--date of birth input field and label-->
             <div id="form-content">
                <label for="dob">Date of Birth*</label></br>
                     <input type="date" class="form-control" required="required" id="dob" required="required" name="dob" placeholder='&#xf0e0; Enter your date of birth'>
             </div><!--close div-->
            <!--contact input text field and label-->
            <div id="form-content">
                <label for="contactNumber">Contact Number*</label></br>
                     <input type="number" class="form-control" id="contactNumber" required="required" name="contactNumber" placeholder='&#xf095; Please Enter your Contact Number' maxlength="11">
            </div><!--close div-->
            <!--username input text field and label-->
            <div id="form-content">
                <label for="username">Username*</label></br>
                    <input type="text" name="username" required="required" placeholder='&#xf007; Enter a Username'>
            </div><!--close div-->
            <!--password input password field and label-->
            <div id="form-content">
                <label for="password">Choose Password*</label></br>
                    <input type="password" class="form-control" required="required" id="password" required="required" name="password" placeholder='&#xf084; Enter a password'>
             </div><!--close div-->
            <!--register button-->
             <input type="submit" name="submit" value="Register">
        <!--close form-->
        </form>
    <!--close wrapper-->
    </div>
<!--close main tag-->
</main>
<!--include footer -->
<?php
    require_once("../Includes/footer.php");
?>

