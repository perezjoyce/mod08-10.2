<?php

	require_once 'partials/dbcon.php';

	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	//SHA1 = Secured Hash Algorithm; encrypts your password into 40 characters
	//MD5 = Message Digest 5

	//============================ VALIDATION IF USERNAME ALREADY EXISTS ============================

	// what should be the script for validating username and password? Answer: SELECT 
	// username and password are column names in your database of the table tbl_users
	$sql = "SELECT * FROM tbl_users WHERE username ='$username'";

	//execute the query
	//ipasa ang values ng $con  na magmamatch sa query (which is $sql) sa $result
	$result = mysqli_query($con, $sql);

	//count number of rows/all data that will match our query
	$count = mysqli_num_rows($result);

	//if may nag match na one or more, ibig sabihin, taken na ang password
	if($count) {
		echo "userExists";
	} else {
		

		//============================ ADDING NEW USER ============================

		//Enclose VALUES in SINGLE QUOTATION MARKS since they will be receiving strings.
		//We want to insert new values to tbli_users
		$sql = "INSERT tbl_users (username, password) VALUES ('$username' , '$password')";

		//EXECUTE QUERY
		//recall that $con is in our dbcon.php
		//$result indicates if tama o working yung nangyari sa database natin
		$result = mysqli_query($con,$sql);

		//if successful, riderect user to index.php
		if($result) {
			echo "success";
		} else {
			echo "fail";
		}
	}

	// if walang ilalagay sa dulo na html, don't put closing tag. in this case, this causes fail to be echoed instead of userExists.
	// 