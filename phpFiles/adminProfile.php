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
	<h1>Welcome <?php $_SESSION['userAdminInfo'][7]; ?>, to the Admin Library Console</h1>
</div>
<div id="output">

</div>
</body>
</html>