<?php 
	$theSearchResult = " ";
	$checker = false;
	if(!empty($_POST['submitEnter'])){
		if(!empty($_POST['searchType'])){
			$theSearchResult = search($_POST['searchType'], $_POST['searchText']);
			$checker = true;
			//echo "<h1>$theSearchResult</h1>";
		}
		else{
			echo "Wrong search";
		}
	}
	
	//$content = htmlspecialchars($_POST['c']);
	// search function
	include_once('header.php');
	include('api.php');	
	
		

?>
<div id="content">
	<?php 
	 if($checker == true){
		 echo "<h1>$theSearchResult</h1>";
	}	
	 ?>

</div>
<?php include_once('footer.php'); ?>