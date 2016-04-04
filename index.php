<!DOCTYPE html>
<html>
<?php
// Start the session
session_start();
?>
<?php
	include 'phpFiles/api.php';
	if(!empty($_POST['submit'])){
		if(!empty($_POST['email'])){
			if(!empty($_POST['password'])){
				$user = $_POST['email'];
				$pass = $_POST['password'];

				$result = authenticateUser($user, $pass);
				
				if(!empty($result)){
					if($result[1] == 1){
						$_SESSION["userinfo"] = $result;
						header("Location: /phpFiles/adminProfile.php");
						exit;
					}
					if($result[1] == 2 || $result[1] == 3){
						$_SESSION["userinfo"] = $result;
						header("Location: /phpFiles/userLogin.php");
						exit;
					}
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
<footer id="footer">&copy; 2016 Dickson and Team LLC.</footer>
</body>
</html>
