<?php
// Start the session
session_start();
?>
<?php
echo $_SESSION["userinfo"][7];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/indexStyle.css">
<script src="javascript/jquery-1.12.0.js"></script>
</head>
<body>
<div id="div1"><h2>User Profile Page</h2></div>
</div>
<div id="userpanelwrapper">
	<h3>Welcome <?php echo $_SESSION["userinfo"][7];?>, to the Library App Home Page</h3>
	<div id="usernav">
		<div id="usercheckout">
			<a href="userCheckout.php">Checkout Books</a>
		</div>
		<div id="userreturn">
			<a href="userReturn.php">Return Books</a>
		</div>
	</div>
</div>
<footer id="footer">&copy; 2016 Dickson and Team LLC.</footer>
</body>
</html>