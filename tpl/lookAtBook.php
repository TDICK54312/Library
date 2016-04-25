<?php
	include 'api.php';
	include_once('header.php');
	include('inc_search.php');
?>

<div id="content">
<?php if(!empty($_POST['submit'])){
		if($_SESSION["userinfo"][1] == 1 || $_SESSION["userinfo"][1] == 2 || $_SESSION["userinfo"][1] == 3 && $_SESSION["userinfo"][6] > 0){
			if($_SESSION["userinfo"][4] != 1){
				$result = addToUserRental($_SESSION["userinfo"][0], $_POST['isbn']);
				echo "<p>$result</p>";
			}
		}
		else{
			echo "<font color="red">Please Login in order to add this book.</font>";
		}
		if($_SESSION["userinfo"][6] == 0){
			echo "You have checked out the max number of books please return your books!";
		}
		if($_SESSION["userinfo"][4] == 1){
			echo "You have a hold on your account due to unpaid fines! Please pay your fines and then you can check out another book!";
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