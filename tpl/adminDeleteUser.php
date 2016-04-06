<?php 
	session_start();
?>
<?php
	include 'api.php';
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
<!doctype html>
<html>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="style/menu-styleTest.css">
   <link rel="stylesheet" href="style/deleteUser.css">
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
	<h1>Delete User</h1>
	<div class="login-cont">
		<form id ="loginForm" name="loginForm" method="POST" action="">
			<label for="email">Email:</label>
			<input type="text" name="email" id="email" class="txtfield" tabindex="1">
			<label for="user_ID">User ID:</label>
			<input type="text" name="user_ID" id="user_ID" class="txtfield" tabindex="2">
			<div class="center"><input type="submit" name="submit" id="loginbtn" value="send"></div>
		</form>
	</div>
</div>
</body>
</html>