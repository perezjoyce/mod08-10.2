<?php require_once 'partials/header.php';?>

  <?php require_once 'partials/navbar.php';?>

    <div class="container">
      <div class="row">
        <div class="col-3"></div>
         <div class="col-6">
         	<div class="card">
         		<div class="card-header text-center">Login Form</div>
         		<div class="card-body">
                    <!-- after submitTing the form, it should go to users.php -->
                    <!-- change name to id -->
         			<form action="users.php" method="POST" id="form_login">
         				<div class="form-group">
         					<label>Username</label>
                            <!-- change name to id -->
         					<input type="text" class="form-control" id="username">
                            <p class="validation text-danger"></p>
         				</div>

         				<div class="form-group">
         					<label>Password</label>
         					<input type="password" class="form-control" id="password">
                            <p class="validation text-danger"></p>
         				</div>

                        <p id="error_message"></p>

                        <!-- if input type is submit, this will automatically submit input to users.php hence change this to button, type to button and remove value SO THAT you can employ validation -->
                        <!-- indicate id for button -->
         				<button type="button" class="btn btn-outline-success" id="btn_login">SUBMIT</button>
         				<input type="reset" class="btn btn-outline-warning" id="btn_clear" value="CLEAR">
         			</form>
         		</div>
         	</div>
         </div>
      </div>
    </div>

<?php require_once 'partials/footer.php';?>