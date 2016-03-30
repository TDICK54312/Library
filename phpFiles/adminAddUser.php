<?php
// Start the session
session_start();
?>
<?php
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
	
	if(!empty($_POST['submit'])){
		if(empty($_POST['userRole'])){
			echo "User Role was not entered!";
			$everythingSet = false;
		}
		else{
			$userRole = $_POST['userRole'];
			if($userRole == 1){
				$tableToAdd = "Administrator";
			}
			else if($userRole == 2){
				$tableToAdd = "Teacher";
			}
			else if($userRole == 3){
				$tableToAdd = "Student";
			}
		}
		if(empty($_POST['firstname'])){
			echo "First Name was not entered!";
			$everythingSet = false;
		}
		if(empty($_POST['lastname'])){
			echo "Last Name was not entered!";
			$everythingSet = false;
		}
		if(empty($_POST['email'])){
			echo "Email was not entered!";
			$everythingSet = false;
		}
		if(empty($_POST['streetAddress'])){
			echo "Street Address was not entered!";
			$everythingSet = false;
		}
		if(empty($_POST['password'])){
			echo "Password was not entered!";
			$everythingSet = false;
		}
		if(empty($_POST['checkpassword'])){
			echo "Re-entry of password was not entered!";
			$everythingSet = false;
		}
		if($_POST['password'] != $_POST['checkpassword']){
			echo "You re-typed your password incorrectly!";
			$passwordCorrect = false;
		}
		else{
			$pas = $_POST['password'];
		}
		if($everythingSet == true && $passwordCorrect == true){
			$result = addUser($tableToAdd, $userRole, $pas, $email, $fname, $lname, $street);
			if($result == true){
				echo "Added User successfully!";
				//need to clear all data in form
				echo $tableToAdd, $userRole . " " . $pas . " " . $email . " " . $fname . " " . $lname . " " . $street;
			}
			else{
				echo "Adding User failed!";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
   <script src="../javascript/script.js"></script>
<link rel="stylesheet" type="text/css" href="../css/adminLoginPage.css">
</head>
<body>
<div id="hello">
	<h1>Admin Add User</h1>
</div>
<div id='addUserForm'>
	<form method = "POST" action = "">
	User Role<br><input type="text" name="userRole" size="40"></br>
	First Name<br><input type="text" name="firstname" size="40"></br>
	Last Name<br><input type="text" name="lastname" size="40"></br>
	Email<br><input type="text" name="email" size="40"></br>
	Address<br><input type="text" name="streetAddress" size="40"></br>
	Password<br><input type="password" name="password" size="40"></br>
	Re-Type Password<br><input type="password" name="checkpassword" size="40"></br>
	<input id="button" type="submit" name="submit" value="Enter">
	</form> 
</div>
</body>
</html>