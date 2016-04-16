<?php 
	include_once('header.php');
	include('api.php');	
	$theSearchResult = " ";
	$checker = false;
	if(!empty($_POST['searchEnter'])){
		if(!empty($_POST['searchText'])){
			$theSearchResult = searchBar($_POST['searchType'], $_POST['searchText']);
			//print_r(array_values($theSearchResult));
		}
		else{
			echo "Wrong search";
		}
	}
	else{
		echo "NOTHING ENTERED!";
	}
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
	<?php
		foreach($theSearchResult as $value){
			getSearchResults($value['ISBN_NUMBER']);
			//$som = $value['ISBN_NUMBER'];
			//echo "<h1>$som</h1>";
		}		
	?>
</div>
<?php include_once('footer.php'); ?>