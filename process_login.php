<?php

// since we need an interaction sa database, we need to require dbcon
require_once "partials/dbcon.php";

// retrieve data that were sent by ajax at script.js
$username = $_POST['username'];
$password = $_POST['password'];

// what should be the script for validating username and password? Answer: SELECT 
// username and password are column names in your database of the table tbl_users
$sql = "SELECT * FROM tbl_users WHERE username ='$username' AND password = '$password'";

//execute the query
//ipasa ang values ng $con  na magmamatch sa query (which is $sql) sa $result
$result = mysqli_query($con, $sql);

//count number of rows/all data that will match our query
$count = mysqli_num_rows($result);

//if may nag match, ibig sabihin, validated ka na user
if($count == 1) {
	echo "Success";
} else {
	echo "Invalid username/password";
}


?>