<?php
	//connect to database connector
	require_once 'partials/dbcon.php';

	//get variables from edit_user
	$username = $_POST['username'];
	$password = $_POST['password'];
	$id = $_POST['id']; // HIDDEN INPUT FIELD IN EDIT_USER.PHP

	// indicate WHERE 
	$sql = "UPDATE tbl_users SET username = '$username', 
		password = '$password' WHERE id = $id";

	$result = mysqli_query($con, $sql);

	if($result) {
		header ("Location: users.php");
	}



?>
