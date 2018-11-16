<?php
// import db connection
require_once '../dbcon.php';
$id = $_GET['id'];

// get user from db
$sql = "SELECT * FROM tbl_users WHERE id=$id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$username = $row['username'];
$password = $row['password'];

?>

<form action="process_register.php" method="POST" id="form_register">        
    <div class="form-group">
        <label>Username</label>
    <!-- change name to id -->
        <input type="text" class="form-control" id="username" value="<?= $username ?>">
    <p class="validation text-danger"></p>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="password" value="<?= $password ?>">
    <p class="validation text-danger"></p>
    </div>
    <p id="error_message"></p>

    <!-- if input type is submit, this will automatically submit input to users.php hence change this to button, type to button and remove value SO THAT you can employ validation -->
    <!-- indicate id for button -->
    <button type="button" class="btn btn-outline-success" id="btn_register">REGISTER</button>
    <input type="reset" class="btn btn-outline-warning" id="btn_clear" value="CLEAR">
</form>
     