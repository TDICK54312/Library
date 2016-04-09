<?php
	session_start();
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
<div id="content">
	<h1>About Us</h1>
	<div class="about-cont">
		<p> This is Team 3's Database project for the Spring 2016 Semester. This simple and very intuitive web application lets you manage a virtual library and it's users!</p> 
	</div>
	<h1>Tim Dickson : Team Leader</h1>
	<div class="aboutprofile-cont">
		<div id="aboutpic">
			<img src="images/TimDBPhoto.jpg" style="width: 20%; height: 3%;">
			<p> Tim is a native Houstonian who is ready to graduate this semester and be done... </p>
		</div>
	</div>
	<h1>Albien Fezga : Web Developer</h1>
	<div class="aboutprofile-cont">
		<div id="aboutpic">
			<img src="http://placehold.it/150x120.jpg">
			<p> Stuff about Albien </p>
		</div>
	</div>
	<h1>Geoffrey Charleston : Database Administrator</h1>
	<div class="aboutprofile-cont">
		<div id="aboutpic">
			<img src="http://placehold.it/150x120.jpg">
			<p> Stuff about Geoffrey </p>
		</div>
	</div>
	<h1>Sok Chiv : Web Developer</h1>
	<div class="aboutprofile-cont">
		<div id="aboutpic">
			<img src="http://placehold.it/150x120.jpg">
			<p> Stuff about Sok </p>
		</div>
	</div>
	<h1>Cody Coomes : Database Administrator</h1>
	<div class="aboutprofile-cont">
		<div id="aboutpic">
			<img src="http://placehold.it/150x120.jpg">
			<p> Stuff about Cody </p>
		</div>
	</div>
</div>
</body>
</html>