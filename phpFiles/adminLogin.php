<?php
	session_start();
?>
<?php
	include 'phpFiles/api.php';
	if(!empty($_POST['submit'])){
		if(!empty($_POST['email'])){
			if(!empty($_POST['password'])){
				$user = $_POST['email'];
				$pass = $_POST['password'];
				
				$result = authenticateAdmin($user, $pass);
				
				if(!empty($result)){
					if($result[2] == 1){
						echo " please login under the user page!";
					}
					if($result[2] == 2){
						$_SESSION["userAdminInfo"] = $result;
						header("Location: /phpFiles/adminProfile.php");
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
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/adminLoginPage.css">
</head>
<body>
<div id="hello">
	<h1>ADMIN LOGIN PAGE</h1>
</div>
<div id="output">
<form method = "POST" action = "">
Username<br><input type="text" name="email" size="40"></br>
Password<br><input type="password" name="password" size="40"></br>
<input id="button" type="submit" name="submit" value="Login">
</form> 
</div>
</body>
</html>
