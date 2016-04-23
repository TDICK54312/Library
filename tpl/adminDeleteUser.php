<?php 
	session_start();
?>
<?php
	include 'api.php';
	include 'header.php';
	include('inc_search.php');
	$userID = 0;
	$userEmail = " ";
	$userIDSet = false;
	$userEmailSet = false;
	
	if(!empty($_POST['submit'])){
		if(empty($_POST['user_ID'])){
			echo "User ID was not entered!";
		}
		else{
			$userID = $_POST['user_ID'];
			$userIDSet = true;
		}
		if(empty($_POST['email'])){
			echo "User email was not entered!";
		}
		else{
			$userEmail = $_POST['email'];
			$userEmailSet = true;
		}
	}
	if($userEmailSet == true && $userIDSet == true){
		$result = deleteUser($userID, $userEmail);
		echo $result;
	}
?>
<div id="content">
	<h1>Delete User</h1>
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
			<label for="email">Email:</label>
			<input type="text" name="email" id="email" class="txtfield" tabindex="1">
			<label for="user_ID">User ID:</label>
			<input type="text" name="user_ID" id="user_ID" class="txtfield" tabindex="2">
			<div class="center"><input type="submit" name="submit" id="loginbtn" value="Enter"></div>
		</form>
	</div>
</div>
<?php include 'footer.php';