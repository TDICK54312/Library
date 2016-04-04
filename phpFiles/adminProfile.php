<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="../javascript/script.js"></script>
<link rel="stylesheet" type="text/css" href="../css/adminLoginPage.css">
</head>
<body>
<div id="hello">
	<h1>Welcome <i><?php echo $_SESSION["admininfo"][5];?></i>, to the Admin Library Console!</h1>
</div>
<div id='cssmenu'>
	<ul>
		<li class='active'><a href='#'><span>Home</span></a></li>
		<li><a href='#'><span>Library Info</span></a></li>
		<li><a href='adminDeleteBook.php'><span>Admin Operations</span></a></li>
		<li class='last'><a href='#'><span>Contact Us</span></a></li>
	</ul>
</div>
</body>
</html>