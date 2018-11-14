<?php

	require_once 'partials/dbcon.php';

	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	//SHA1 = Secured Hash Algorithm; encrypts your password into 40 characters
	//MD5 = Message Digest 5

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
		echo "Success";
	} else {
		echo false;
	}
?>