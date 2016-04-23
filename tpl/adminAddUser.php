<?php
	
 	include_once('header.php');
	
	include 'api.php';
	include('inc_search.php');
	$everythingSet = true;
	$passwordCorrect = true;
	$userRole = 0;
	$tableToAdd = "";
	$fname = "";
	$lname = "";
	$email = "";
	$street = "";
	$pas = "";
	$maxBooks = 0;
	
?>
<div id="content">
	<h1>Add User</h1>
    <?php 
	
	if(!empty($_POST['submit'])){
		if(empty($_POST['role'])){
			echo "User Role was not entered!";
			$everythingSet = false;
		}
		else{
			$userRole = $_POST['role'];
			if($userRole == 1){
				$tableToAdd = "Administrator";
				$maxBooks = 10;
			}
			else if($userRole == 2){
				$tableToAdd = "Teacher";
				$maxBooks = 10;
			}
			else if($userRole == 3){
				$tableToAdd = "Student";
				$maxBooks = 5;
			}
		}
		if(empty($_POST['firstname'])){
			echo "First Name was not entered!";
			$everythingSet = false;
		}
		else{
			$fname = $_POST['firstname'];
		}
		if(empty($_POST['lastname'])){
			echo "Last Name was not entered!";
			$everythingSet = false;
		}
		else{
			$lname = $_POST['lastname'];
		}
		if(empty($_POST['email'])){
			echo "Email was not entered!";
			$everythingSet = false;
		}
		else{
			$email = $_POST['email'];
		}
		if(empty($_POST['address'])){
			echo "Street Address was not entered!";
			$everythingSet = false;
		}
		else{
			$street = $_POST['address'];
		}
		if(empty($_POST['password'])){
			echo "Password was not entered!";
			$everythingSet = false;
		}
		if(empty($_POST['re-password'])){
			echo "Re-entry of password was not entered!";
			$everythingSet = false;
		}
		if($_POST['password'] != $_POST['re-password']){
			echo "You re-typed your password incorrectly!";
			$passwordCorrect = false;
		}
		else{
			$pas = $_POST['password'];
		}
		if($everythingSet == true && $passwordCorrect == true){
			$result = addUser($tableToAdd, $userRole, $pas, $email, $fname, $lname, $street, $maxBooks);
			
			echo $result;
		}
	}
	?>
     <style type="text/css">
		.login-cont {
			width: 30%;
			display: block;
			margin: 0 auto;
		}
		.login-cont label {
			width: 100%;
		}
		.login-cont input, .login-cont input[type=email], .login-cont input[type=password] {
			width: 95%;
			-webkit-box-shadow: inset 0px 0px 16px -7px rgba(255,0,0,0.49);
			-moz-box-shadow: inset 0px 0px 16px -7px rgba(255,0,0,0.49);
			box-shadow: inset 0px 0px 16px -7px rgba(255,0,0,0.49);
			border-radius: 15px 15px 15px 15px;
			-moz-border-radius: 15px 15px 15px 15px;
			-webkit-border-radius: 15px 15px 15px 15px;
			border: 1px solid #CF8283;
			height: 25px;
			margin-bottom: 20px;
			font-size: 15px;
			padding-left: 8px;
			color: #848484;
			text-shadow: 2px 2px 1px rgba(150, 150, 150, 1);
		}
		.login-cont input[type=submit] {
			width: 100%;
			height: 30px;
			background-color: #CF8283;
			font-size: 18px;
			color: white;
			border: 0;
		}
		.login-cont input[type=submit]:active {
			background-color: #5A0507;
			color: #848484;
			padding-top: 5px;
			webkit-box-shadow:  0px 0px 16px -7px rgba(255,0,0,0.49);
			-moz-box-shadow:  0px 0px 16px -7px rgba(255,0,0,0.49);
			box-shadow:  0px 0px 16px -7px rgba(255,0,0,0.49);
		}
	</style>
	<div class="login-cont">
		<form id ="loginForm" name="loginForm" method="POST" action="">
			<div>
				<label for="role">Role*:</label>
				<select name="role" id="role" class="txtfield">
					<option value="1">Administrator</option>
					<option value="2">Teacher</option>
					<option value="3">Student</option>
				</select>
			</div>
			<label for="firstname">First Name*:</label>
			<input type="text" name="firstname" id="firstname" class="txtfield" tabindex="1" required>
			<label for="lastname">Last Name*:</label>
			<input type="text" name="lastname" id="lastname" class="txtfield" tabindex="2" required>
			<label for="email">Email*:</label>
			<input type="email" name="email" id="email" class="txtfield" tabindex="3" required>
			<label for="address">Address*:</label>
			<input type="text" name="address" id="address" class="txtfield" tabindex="4" required>
			<label for="password">Enter Password*:</label>
			<input type="password" name="password" id="password" class="txtfield" tabindex="5" required>
			<label for="re-password">Re-enter Password*:</label>
			<input type="password" name="re-password" id="re-password" class="txtfield" tabindex="6" required>
			<div class="center"><input type="submit" name="submit" id="loginbtn" value="send"></div>
		</form>
	</div>
</div>
<?php include_once('footer.php'); ?>