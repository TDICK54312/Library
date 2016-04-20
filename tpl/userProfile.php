<?php
	
	include_once('header.php');
	include('inc_search.php');
	include('api.php');
?>


<div id="content">
	<p> <i><?php echo $_SESSION["user"][1] . " " . $_SESSION["user"][2]; ?></i> you last logged in on <i><?php echo $_SESSION["userinfo"][5]; ?></i> !</p>
	<?php
		getRentedBooks($_SESSION["userinfo"][0], $_SESSION["userinfo"][6], $_SESSION["userinfo"][1]);
		?>
</div>
<?php include_once('footer.php'); ?>