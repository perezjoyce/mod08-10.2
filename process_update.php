<?php
	//connect to database connector
	require_once 'partials/dbcon.php';

	//get variables from edit_user
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	$id = $_POST['id']; // HIDDEN INPUT FIELD IN EDIT_USER.PHP

	// indicate WHERE 
	$sql = "UPDATE tbl_users SET username = '$username', 
		password = '$password' WHERE id = $id";

	$result = mysqli_query($con, $sql);

	if($result) {
		header ("Location: users.php");
	} else {
		echo false;
	}

	//note: in practice, don't allow users to change username and if you do, study process_register.php to edit this code and its pair in script.js


?>
