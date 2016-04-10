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
					session_start();
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
<?php include_once('footer.php'); ?>