<?php
	
	include_once('header.php');
?>


<div id="content">
	<h1>Welcome <i><?php echo $_SESSION["user"][1] . " " . $_SESSION["user"][2]; ?></i> you last logged in on <i><?php echo $_SESSION["userinfo"][5]; ?></i> !</h1>
	<?php
		//put current checked out books and stuff here. 
		?>
</div>
<?php include_once('footer.php'); ?>