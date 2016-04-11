<?php 
	echo "$_POST['tp']";
	echo "$_POST['c']";
	
	if($_POST['tp' ] == "Title")
		$type = 1;
	else if($_POST['tp'] == "Author")
		$type = 2;
	else if($_POST['tp'] == "ISBN")
		$type = 3;
	else {
		echo "Invalid input.";
	}
	
	$content = htmlspecialchars($_POST['c']);
	// search function
	include_once('header.php');
	include('api.php');	
	
		

?>
<div id="content">
	<?php 
	echo "$type";
		search($type,$content);
		
	 ?>

</div>
<?php include_once('footer.php'); ?>