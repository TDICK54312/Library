<?php 
	include_once('header.php');
	include('api.php');	
	$theSearchResult = " ";
	$checker = false;
	if(!empty($_POST['searchEnter'])){
		if(!empty($_POST['searchType'])){
			//$theSearchResult = search($_POST['searchType'], $_POST['searchText']);
			$checker1 = $_POST['searchText'];
			$checker2 = $_POST['searchType'];
			echo "<h1>$checker1</h1>";
			echo "<h1>$checker2</h1>";
		}
		else{
			echo "Wrong search";
		}
	}
	else{
		echo "NOTHING ENTERED!";
	}
	
	//$content = htmlspecialchars($_POST['c']);
	// search function
	
	
		

?>
<div id="content">

</div>
<?php include_once('footer.php'); ?>