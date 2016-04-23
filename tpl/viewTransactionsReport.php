<?php
	include('api.php');
	include_once('header.php');
	include('inc_search.php');
?>
<div id="content">
	<h1>Transactions</h1>
	<?php
		transactionReport();
	?>
</div>
<?php include_once('header.php'); ?>
