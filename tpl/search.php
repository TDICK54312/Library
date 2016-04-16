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
?>
<div id="content">
	<?php  
		foreach($theSearchResult){
			lookAtBook($value);
		}
	?>
</div>
<?php include_once('footer.php'); ?>