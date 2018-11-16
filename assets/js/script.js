$(document).ready(()=> {


	// LOGIN
	$("#btn_login").click(()=>{
		//verify
		// alert();

		//get values
		let username = $("#username").val();
		let password = $("#password").val();

		//verify
		//alert(username + " " + password);

		//create flag
		//indicator to check if data is clean; if wala syang natamaan na validator. para hindi masubmit yung data sa users.php.
		let error_flag = 0;


		//username verification
		if(username == ""){
			//hahanapin nya yung kapatid nya sa DOM; next sa #username is p tag na walang id
			// $("#username").next().css("color", "red"); // deleted coz i used bootstrap text-danger in p tag
			$("#username").next().html("Username is required!");
			error_flag = 1;
		} else {
			$("#username").next().html("");
		}

		//password verification
		if(password == ""){
			//hahanapin nya yung kapatid nya sa DOM; next sa #username is p tag na walang id
			// $("#username").next().css("color", "red"); // deleted coz i used bootstrap text-danger in p tag
			$("#password").next().html("Password is required!");
			error_flag = 1;
		} else {
			$("#password").next().html("");
		}

		//assess if tama na ang lahat using ajax
		if(error_flag == 0) {
			
			//ONCE navalidate na walang error  na, ipapasa kay process_login.php
			$.ajax({
				//sino magpprocess ng login data
				"url": "process_login.php",
				"data": {"username" : username,
						  "password" : password},
				"type": "POST",
				//sumasalo sa iniecho ng process_login.php
				"success": (dataFromPHP) => {
					if(dataFromPHP == "Success") {

						// verify
						// $("#error_message").css("color", "green");
						// $("#error_message").html(dataFromPHP); // Success

						//submit data to users.php
						$("#form_login").submit();
					} else {

						
						$("#error_message").css("color", "red");
						$("#error_message").html(dataFromPHP); // Invalid username/password
					}
				}

			});

		} 

	});





	// REGISTRATION
	$("#btn_register").click(()=>{
		
		//get values
		let username = $("#username").val();
		let password = $("#password").val();
		let cpass = $("#cpass").val();
		let countU = username.length;
		let countP = password.length;

		let error_flag = 0;

		//username verification
		if(username == ""){
			$("#username").next().html("Username is required!");
			error_flag = 1;
		} else if (countU < 5) {
			$("#username").next().html("Username should at least 5 characters!");
			error_flag = 1;
		} else {
			$("#username").next().html("");
		}

		//password verification
		if(password == ""){
			$("#password").next().html("Password is required!");
			error_flag = 1;
		} else if (countP < 8) {
			$("#password").next().html("Password should have more than 8 characters!");
			error_flag = 1;
		} else {
			$("#password").next().html("");
		}

		//password and cpass verification
		if (password !== cpass) {
			$("#cpass").next().html("Password don't match!");
			error_flag = 1;
		} else {
			$("#password").next().html("");
		}

		//assess if tama na ang lahat using ajax
		if(error_flag == 0) {
			
			//ONCE navalidate na walang error  na, ipapasa kay process_login.php
			$.ajax({
				"url": "process_register.php",
				"data": {"username" : username,
						  "password" : password},
				"type": "POST",
				"success": (dataFromPHP) => {
					if(dataFromPHP == "userExists") {
						$("#error_message").css("color", "red");
						$("#error_message").html("Username is already taken."); 
						
					} else if (dataFromPHP == "success") {
						// proceed to registration
						window.location = "users.php";
					} else {
						$("#error_message").css("color", "red");
						$("#error_message").html("Error encountered. Pls try again."); 
					}
				}

			});

		} 

	});



	// CLEAR
	$("#btn_clear").click(()=>{

		$("#username").next().html("");
		$("#password").next().html("");
		$("#cpass").next().html("");

	});




	// UPDATE
	$("#btn_edit").click(()=>{
		
		//get values
		let username = $("#username").val();
		let password = $("#password").val();
		let cpass = $("#cpass").val();
		let countU = username.length;
		let countP = password.length;

		let error_flag = 0;


		//username verification
		if(username == ""){
			
			$("#username").next().html("Username is required!");
			error_flag = 1;
		} else if (countU < 5) {
			$("#username").next().html("Username should at least 5 characters!");
			error_flag = 1;
		} else {
			$("#username").next().html("");
		}

		//password verification
		if(password == ""){

			$("#password").next().html("Password is required!");
			error_flag = 1;
		} else if (countP < 8) {
			$("#password").next().html("Password should have more than 8 characters!");
			error_flag = 1;
		} else {
			$("#password").next().html("");
		}

		//password and cpass verification
		if (password !== cpass) {
			$("#cpass").next().html("Password don't match!");
			error_flag = 1;
		} else {
			$("#password").next().html("");
		}

		//assess if tama na ang lahat using ajax
		if(error_flag == 0) {
			
			//ONCE navalidate na walang error  na, ipapasa kay process_login.php
			$.ajax({
				//sino magpprocess ng login data
				"url": "process_update.php",
				"data": {"username" : username,
						  "password" : password},
				"type": "POST",
				//sumasalo sa iniecho ng process_login.php
				"success": (dataFromPHP) => {
					if(dataFromPHP) {

						//submit validated changes
						$("#form_edit").submit();

					} else {
				
						$("#error_message").css("color", "red");
						$("#error_message").html("test"); // Invalid username/password
					}
				}

			});

		} 

	});





}); 