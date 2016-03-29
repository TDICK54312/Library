<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="../css/adminLoginPage.css">
</head>
<body>
<div id="hello">
	<h1>Welcome <?php echo $_SESSION["admininfo"][5];?>, to the Admin Library Console</h1>
</div>
<div id='cssmenu'>
	<ul>
		<li class='active'><a href='#'><span>Home</span></a></li>
		<li><a href='#'><span>Products</span></a></li>
		<li><a href='#'><span>Company</span></a></li>
		<li class='last'><a href='#'><span>Contact</span></a></li>
	</ul>
</div>
</body>
</html>