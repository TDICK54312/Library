<?php
	include('api.php');
	include_once('header.php');
	include('inc_search.php');
?>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
</style>
<div id="content">
	<h1>User Report</h1>
	<h2>Admins</h2>
	<?php
		adminUserReport();
	?>
</div>
<?php include_once('header.php'); ?>