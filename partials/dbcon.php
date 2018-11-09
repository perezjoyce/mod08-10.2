<?php

	//Credentials need to connect  process_register.php to database
	$host = "localhost"; // since we are working on our local terminal, otherwise idetify ip address
	$db_username = "root"; // default
	$db_password = ""; // default
	$db_name = "db_musicStore"; //connect to our schema

	//This will look for all four credentials
	$con = mysqli_connect($host, $db_username, $db_password, $db_name);

	if(!$con) {
		echo "Failed to connect to MySQL:" . 
			mysqli_connect_error();
	}

?>