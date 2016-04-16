<?php 
	include_once('header.php');
	include('api.php');	
	$theSearchResult = " ";
	$checker = false;
	if(!empty($_POST['searchEnter'])){
		if(!empty($_POST['searchType'])){
			$theSearchResult = searchBar($_POST['searchType'], $_POST['searchText']);
			$checker1 = $_POST['searchText'];
			$checker2 = $_POST['searchType'];
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
	<!--<?php getSearchResult($theSearchResult); ?>-->
</div>
<?php include_once('footer.php'); ?>