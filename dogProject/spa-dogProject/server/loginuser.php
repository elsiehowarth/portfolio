<?php
// connect to database
require_once('../../Classes/pdoConnection.php');

// $username = filter_has_var(INPUT_POST, 'username') ? $_POST['username']: null;
// $password  = filter_has_var(INPUT_POST, 'password') ? $_POST['password']: null;


//define database object
global $dbConnection;

$stmt = $dbConnection->prepare("SELECT userID, username, password from project_users WHERE username='".$_POST['username']."' && password='".  md5($_POST['password'])."'");
$stmt->execute();
$row = $stmt->rowCount();
 
if ($row > 0){    
    echo 'correct';
} else{ 
    echo 'wrong';
}

?>

