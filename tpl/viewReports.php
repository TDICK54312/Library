<?php
	include('api.php');
	include_once('header.php');
	include('inc_search.php');
?>
<div id="content">
	<h1>Run and View Report!</h1>
	<ul style="text-align: left; margin-left: 5%;">
		<li><a href="viewUsersReport.php">View Users</a></li><br>
		<li><a href="viewTransactionsReport.php">View Transactions</a></li><br>
		<li><a href="viewOldTransactionsReport.php">View Old Transactions</a></li><br>
		<li><a href="viewBooksReport">View Books</a></li><br>
	</ul>
</div>
<?php include_once('footer.php'); ?>
