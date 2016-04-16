<?php 
	include_once('header.php');
	include('api.php');	
	$theSearchResult = " ";
	$checker = false;
	if(!empty($_POST['searchEnter'])){
		if(!empty($_POST['searchText'])){
			$theSearchResult = searchBar($_POST['searchType'], $_POST['searchText']);
			//$checker1 = $_POST['searchText'];
			//$checker2 = $_POST['searchType'];
			print_r(array_values($theSearchResult));
		}
		else{
			echo "Wrong search";
		}
	}
	else{
		echo "NOTHING ENTERED!";
	}
?>
<div id="content">
	<?php
		while(list($key, $value) = each($theSearchResult)){
			//lookAtBook($value);
			echo "<h1>$value</h1>";
		}		
	?>
</div>
<?php include_once('footer.php'); ?>