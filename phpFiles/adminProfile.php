<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/adminLoginPage.css">
</head>
<body>
<div id="hello">
	<h1>Welcome <?php echo $_SESSION["admininfo"][7];?>, to the Admin Library Console</h1>
</div>
<div id="output">
	<a href="phpFiles/adminCreateUser.php">Create User</a>
	<a href="phpFiles/adminCheckInventory.php">Inventory</a>
</div>
</body>
</html>