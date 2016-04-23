<?php
	include('api.php');
	include_once('header.php');
	include('inc_search.php');
?>
<div id="content">
	<h1>User Report</h1>
	<h2>Admins</h2>
	<?php
		adminUserReport();
	?>
</div>
<?php include_once('header.php'); ?>