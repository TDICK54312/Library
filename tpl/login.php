<?php
	include_once('header.php');
	
	include 'api.php';
	if(!empty($_POST['submit'])){
		if(!empty($_POST['email'])){
			if(!empty($_POST['password'])){
				$user = $_POST['email'];
				$pass = $_POST['password'];

				$result = authenticateUser($user, $pass);
				
				if(!empty($result)){
					
					$_SESSION["userinfo"] = $result;
					if($result[1] == 1){
						$result2 = getUserInfo($result[0], $result[1]);
						updateTimeLoggedIn($result[0]);
						$_SESSION["user"] = $result2;
						header("Location: adminProfile.php");
						exit;
					}
					if($result[1] == 2 || $result[1] == 3){
						$result2 = getUserInfo($result[0], $result[1]);
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
<div id="content">
	<h1>User Login</h1>
    <style type="text/css">
		.login-cont {
			width: 30%;
			display: block;
			margin: 0 auto;
		}
		.login-cont label {
			width: 100%;
		}
		.login-cont input[type=text], .login-cont input[type=password] {
			width: 100%;
			-webkit-box-shadow: inset 0px 0px 16px -7px rgba(255,0,0,0.49);
			-moz-box-shadow: inset 0px 0px 16px -7px rgba(255,0,0,0.49);
			box-shadow: inset 0px 0px 16px -7px rgba(255,0,0,0.49);
			border-radius: 15px 15px 15px 15px;
			-moz-border-radius: 15px 15px 15px 15px;
			-webkit-border-radius: 15px 15px 15px 15px;
			border: 1px solid #CF8283;
			height: 50px;
			margin-bottom: 20px;
			font-size: 20px;
			padding-left: 8px;
			color: 
		}
		.login-cont input[type=submit] {
			width: 100%;
			height: 30px;
			background-color: #CF8283;
			font-size: 18px;
			color: white;
			border: 0;
		}
	</style>
	<div class="login-cont">
		<form id ="loginForm" name="loginForm" method="POST" action="">
			<label for="email">Username:</label>
			<input type="text" name="email" id="email" class="txtfield" tabindex="1" value="E-Mail">
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" class="txtfield" tabindex="2">
			<div class="center"><input type="submit" name="submit" id="loginbtn" value="Log In"></div>
		</form>
	</div>
</div>
<?php include_once('footer.php'); ?>