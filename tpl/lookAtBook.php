<?php
	include 'api.php';
	include_once('header.php');
	include('inc_search.php');
?>

<div id="content">
<?php if(!empty($_POST['submit'])){
		if($_SESSION["userinfo"][1] == 1 || $_SESSION["userinfo"][1] == 2 || $_SESSION["userinfo"][1] == 3){
			$result = addToUserRental($_SESSION["userinfo"][0], $_POST['isbn']);
			echo "<p>$result</p>";
		}
		else{
			echo "<p>Please Login in order to add this book.</p>";
		}
	}
?>
<h1><?php echo $_GET['title']; ?> </h1>
	<?php
		$aISBN = $_GET['isbn'];
		lookAtBook($aISBN);
	?>
</div>
<?php include_once('footer.php'); ?>