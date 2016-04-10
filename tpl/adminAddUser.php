<?php
	session_start();
 	include_once('header.php');
	
	include 'api.php';
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
<div id="content">
	<h1>Add User</h1>
	<div class="login-cont">
		<form id ="loginForm" name="loginForm" method="POST" action="">
			<div>
				<label for="role">Role:</label>
				<select name="role" id="role" class="txtfield">
					<option value="1">Administrator</option>
					<option value="2">Teacher</option>
					<option value="3">Student</option>
				</select>
			</div>
			<label for="firstname">First Name:</label>
			<input type="text" name="firstname" id="firstname" class="txtfield" tabindex="1">
			<label for="lastname">Last Name:</label>
			<input type="text" name="lastname" id="lastname" class="txtfield" tabindex="2">
			<label for="email">Email:</label>
			<input type="text" name="email" id="email" class="txtfield" tabindex="3">
			<label for="address">Address:</label>
			<input type="text" name="address" id="address" class="txtfield" tabindex="4">
			<label for="password">Enter Password:</label>
			<input type="password" name="password" id="password" class="txtfield" tabindex="5">
			<label for="re-password">Enter Password:</label>
			<input type="password" name="re-password" id="re-password" class="txtfield" tabindex="6">
			<div class="center"><input type="submit" name="submit" id="loginbtn" value="send"></div>
		</form>
	</div>
</div>
<?php include_once('footer.php'); ?>