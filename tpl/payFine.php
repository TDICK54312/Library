<?php	
	include_once('header.php');
	include('inc_search.php');
	include('api.php');
?>
<div id="content">
	<h1>Pay Fine</h1>
    <?php
	if(!empty($_POST['submit'])){
		if(!empty($_POST['adminEmail']) && !empty($_POST['adminPassword'])){
			$adminResult = authenticateUser($_POST['adminEmail'], $_POST['adminPassword']);
			if(!empty($adminResult) && !empty($_POST['userEmail']) && !empty($_POST['isbn']) && $adminResult[1] == 1 && !empty($_POST['amount'])){
				$payFineResult = payFine($_POST['userEmail'], $_POST['isbn'], $_POST['amount']);
				switch($payFineResult){
					case 1:
						echo "Successfully removed fine!";
						break;
					case 2:
						echo "Could not find transaction!";
						break;
					default:
						echo "error";
						break;
				}
			}
		}
	}	
?>
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
			<label for="userEmail">User Email*:</label>
			<input type="text" name="userEmail" id="userEmail" class="txtfield" tabindex="1" required>
			<label for="isbn">ISBN Number*:</label>
			<input type="text" name="isbn" id="isbn" class="txtfield" tabindex="2" required>
			<label for="amount">Amount*:</label>
			<input type="number" name="amount" id="amount" class="txtfield" tabindex="3" required>
			<label for="adminEmail">Admin Email*:</label>
			<input type="text" name="adminEmail" id="adminEmail" class="txtfield" tabindex="4" required>
			<label for="adminPassword">Admin Password*:</label>
			<input type="password" name="adminPassword" id="adminPassword" class="txtfield" tabindex="5" required>
			<div class="center"><input type="submit" name="submit" id="loginbtn" value="send"></div>
		</form>
	</div>
</div>
<?php include_once('footer.php'); ?>