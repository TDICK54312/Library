<?php
	include 'api.php';
	session_start();
?>
<?php
	if(!empty($_POST['submit'])){
		if($_SESSION["userinfo"][1] == 1 || $_SESSION["userinfo"][1] == 2 || $_SESSION["userinfo"][1] == 3){
			$result = addToUserRental($_SESSION["userinfo"][0], $_POST['isbn']);
		}
		else{
			echo "<p>Please Login in order to add this book.</p>";
		}
	}
?>
<!doctype html>
<html>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="style/menu-styleTest.css">
   <link rel="stylesheet" href="style/aboutUs.css">
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
<h1><?php echo $_GET['title']; ?> </h1>
<div id="content">
	<?php
		$aISBN = $_GET['isbn'];
		lookAtBook($aISBN);
	?>
</div>
</div>
</body>
</html>