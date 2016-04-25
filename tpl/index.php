<?php
	include('api.php');
	include_once('header.php');
	include('inc_search.php');
	//$checker = false;
	$everythingSet = true;
	if(!empty($_POST['submit'])){
		if(empty($_POST['isbn'])){
			$everythingSet = false;
			echo "ISBN Number not entered!";
		}
		else{
			$theISBN = $_POST['isbn'];
			$theTitle = $_POST['title'];
			header("Location: lookAtBook.php?isbn=$theISBN");
			exit;
		}
	}
?>
<div id="content">
	<h1>Welcome to our Library!</h1>
	<body link="blue">
    <p> Our Digital Library is well known throughout the database class in Spring 2016. This website is solely for database project. If you attempt to check out a book for real, sorry, we are unable to satisfied you. However, you can listen to some pop music while staring at our background that is created by our web developer lead, Albien. It looks really cool and Albien is a coold dude! So we will keep it cool like that! Moreover, you can enjoy our main database features that allow you to view books, search books, log in, check out, and etc. Our database lead is Tim who is a very down to earth man. Tim does not complain, Tim does not care, Tim is easygoing, be like Tim. Cody and Geoffry worked on our database and did some really cool stuff to get this site working. Sok helped Albein with all the cool design stuff and making the site look cool. Well thats about it for all of us here in Team 3 and we hope you enjoy yourself! <a href="http://dev.tdickson.co/tpl/aboutUs.php">HERE</a>
</p></body>
	<h1>New Additions</h1>
	<div>
	<?php getNewBooksInventory(); ?>
    </div>
</div>
<?php include_once('footer.php'); ?>