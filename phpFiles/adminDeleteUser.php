<?php
// Start the session
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
<!DOCTYPE html>
<html>
<head>
   <!--<script src="../javascript/script.js"></script> -->
<link rel="stylesheet" type="text/css" href="../css/adminLoginPage.css">
</head>
<body>
<div id="hello">
	<h1>Admin Delete User</h1>
</div>
<div id='addUserForm'>
	<form method = "POST" action = "">
	User ID<br><input type="text" name="user_ID" size="40"></br>
	Email<br><input type="text" name="email" size="40"></br>
	<input id="button" type="submit" name="submit" value="Enter">
	</form> 
</div>
</body>
</html>