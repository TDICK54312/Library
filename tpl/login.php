<?php
	include 'api.php';
	if(!empty($_POST['submit'])){
		if(!empty($_POST['email'])){
			if(!empty($_POST['password'])){
				$user = $_POST['email'];
				$pass = $_POST['password'];

				$result = authenticateUser($user, $pass);
				
				if(!empty($result)){
					session_start();
					$_SESSION["userinfo"] = $result;
					if($result[1] == 1){
						$result2 = getUserInfo($result[0], $result[1])
						updateTimeLoggedIn($result[0]);
						$_SESSION["user"] = $result2;
						header("Location: adminProfile.php");
						exit;
					}
					if($result[1] == 2 || $result[1] == 3){
						$result2 = getUserInfo($result[0], $result[1])
						updateTimeLoggedIn($result[0]);
						$_SESSION["user"] = $result2;
						header("Location: userProfile.php");
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
<!doctype html>
<html>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="style/menu-styleTest.css">
   <link rel="stylesheet" href="style/login.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="js/menu_script.js"></script><title>Library Database System</title>
   <script src="http://use.edgefonts.net/berkshire-swash;noticia-text.js"></script>
</head>

<body>
<div id="wrapper">
<div id="header"><img src="images/header.jpg" style="width: 100%;"></div>
<div id="navarea" style="text-align: center; display: block; margin: 0 auto;">
	<?php include_once('navmenuTest.php'); ?>
</div>
<div id="content">
	<h1>User Login</h1>
	<div class="login-cont">
		<form id ="loginForm" name="loginForm" method="POST" action="">
			<label for="email">Username:</label>
			<input type="text" name="email" id="email" class="txtfield" tabindex="1">
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" class="txtfield" tabindex="2">
			<div class="center"><input type="submit" name="submit" id="loginbtn" value="Log In"></div>
		</form>
	</div>
</div>
</body>
</html>