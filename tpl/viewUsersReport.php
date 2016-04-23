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
    <a href="viewReports.php">&lt;&lt; Back to Reports</a><br><br>
	<h2>Admins</h2>
	<?php
		adminUserReport();
	?>
	<h2>Teachers</h2>
	<?php
		teacherUserReport();
	?>
	<h2>Students</h2>
	<?php
		studentUserReport();
	?>
</div>
<?php include_once('header.php'); ?>