<?php
	function authenticateUser($username, $password){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		$result = mysqli_query($con,"SELECT * FROM $tableName WHERE USER_EMAIL = '$username' AND PASSWORD = '$password'");
		$array = mysqli_fetch_row($result);

	//	echo json_encode($array);
		return $array;
	}

	function authenticateAdmin($username, $password){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		$result = mysqli_query($con, "SELECT * FROM $tableName WHERE EMAIL = '$username' AND PASSWORD = '$password'");
		$array = mysqli_fetch_row($result);

	//	echo json_encode($array);
		return $array;
	}
?>
