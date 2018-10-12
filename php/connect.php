<?php

	$username = "root";
	$password = "";
	$servername = "";
	$dbname = "phone_directory";
	
	$con = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);
?>