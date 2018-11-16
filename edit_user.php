
<?php require_once 'partials/dbcon.php';?>

<!-- RETRIEVE OLD DATA SINCE YOU WILL USE THIS TO UPDATE DATA -->
<?php
	$id = $_GET['id'];
	$sql = "SELECT * FROM tbl_users WHERE id = $id";
	$result = mysqli_query($con, $sql);
?>

   
	<form action="process_update.php" method="POST" id="form_edit">

		<?php while($row = mysqli_fetch_assoc($result)){ ?>

			<!-- HIDDEN TYPE INPUT FIELD SO YOU CAN SEND THIS DATA TO processs_update.php VIA POST-->

			<input type="hidden" name="id" value="<?=$row['id']?>">

			<!-- END OF HIDDEN INPUT FIELD -->

			<div class="form-group">
				<label>Username</label>
				<!-- call value attribute -->
				<input type="text" class="form-control" id="username" name="username" value="<?= $row['username']?>">
			<p class="validation text-danger"></p>
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" id="password" name="password">
				<p class="validation text-danger"></p>
			</div>

			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" class="form-control" id="cpass" name="cpass">
				<p class="validation text-danger"></p>
			</div>

			<p id="error_message"></p>

			<button type="button" class="btn btn-outline-success" id="btn_edit">SAVE</button>
			<input type="reset" class="btn btn-outline-warning" id="btn_clear" value="CLEAR CHANGES">

		<?php } ?>
	</form>
         		

