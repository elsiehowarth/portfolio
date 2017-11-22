<?php

$conn = mysqli_connect('localhost', 'unn_w13004905', '32XARWC6', 'unn_w13004905');
if(mysqli_connect_errno()){
	echo "<p> Connection Failed:" .mysqli_connecterror()."</p>\n";

}

// PDO connection
//$conn = new PDO("mysql:host=unn_w13004905", 'unn_w13004905', '32XARWC6');

?>