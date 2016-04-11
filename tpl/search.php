<?php 

	// search function
	include_once('header.php');
	include('api.php');	
	
	if($_POST['tp' ] == "Title")
		$type = 1;
	else if($_POST['tp'] == 'Author')
		$type = 2;
	else if($_POST['tp'] == 'ISBN')
		$type = 3;
	else {
		echo "Invalid input.";
		$type = 0;
	}
	
	$content = htmlspecialchars($_POST['c']);
	
		

?>
<div id="content">
	<?php 
	if(isset($type) && isset($content))
		search($type,$content);
	else
		echo $type;
		echo "<p>Invalid search.</p>";
		
	 ?>

</div>
<?php include_once('footer.php'); ?>