<!DOCTYPE html>
<html>
<?php
	include 'phpFiles/api.php';
	if(!empty($_POST['submit'])){
		if(!empty($_POST['email'])){
			if(!empty($_POST['password'])){
				$user = $_POST['email'];
				$pass = $_POST['password'];

				$result = authenticateUser($user, $pass);
				
				if(!empty($result)){
					
					echo $result[7];
				}
				else{
					echo "Sorry invalid username or password! Try again!";
				}
			}
		}
	}
			
		
?>
<head>
<link rel="stylesheet" type="text/css" href="css/indexStyle.css">
<script src="javascript/jquery-1.12.0.js"></script>
</head>
<body>
<div id="div1"><h2>User Login Page</h2></div>
<div id="output">
<form method = "POST" action = "">
Username<br><input type="text" name="email" size="40"></br>
Password<br><input type="password" name="password" size="40"></br>
<input id="button" type="submit" name="submit" value="Login">
</form> 
</div>
<a href="phpFiles/adminLogin.php">Are you an admin?</a>
</body>
</html>
