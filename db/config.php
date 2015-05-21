<?php
$servername = "localhost";
$username = "bhaloachee";
$password = "19A14t1&";

// Create connection
$conn = mysql_connect($servername, $username, $password);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	mysql_select_db("bhaloach_dev", $conn) or die ('Database not found ' . mysql_error() );
?> 