<?php
// Start the session
session_start();
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
	User Role<br><input type="password" name="checkpassword" size="40"></br>
	<input id="button" type="submit" name="submit" value="Login">
	</form> 
</div>
</body>
</html>