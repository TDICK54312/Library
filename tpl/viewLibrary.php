<?php
	
	include_once('header.php');
	
	include 'api.php';
	$everythingSet = true;
	if(!empty($_POST['submit'])){
		if(empty($_POST['isbn'])){
			$everythingSet = false;
			echo "ISBN Number not entered!";
		}
		else{
			$theISBN = $_POST['isbn'];
			$theTitle = $_POST['title'];
			header("Location: lookAtBook.php?isbn=$theISBN &title=$theTitle");
			exit;
		}
	}
?>
<div id="content">
<h1>Book Catalog</h1>
	<?php
		getBookInventory();
	?>
</div>
<?php include_once('header.php'); ?>