<?php
	function authenticateUser($username, $password){
		include 'dbConnection.php';
		$tableName = "User";
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		$result = mysqli_query($con,"SELECT * FROM $tableName WHERE USER_EMAIL = '$username' AND PASSWORD = '$password'");
		$array = mysqli_fetch_row($result);

	//	echo json_encode($array);
		return $array;
	}

	function addUser($addThisTable, $role, $pWord, $Email, $fname, $lname, $street){
		include 'dbConnection.php';
		$tableName = $addThisTable;
		$query1 = "INSERT INTO User (USER_ROLE, PASSWORD, USER_EMAIL, FIRSTNAME, LASTNAME, ADDRESS) VALUES ('$role', '$pWord', '$Email', '$fname', '$lname', '$street');";
		//Need to edit this so we can send data to the coresponding table
	
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		$result = mysqli_query($con, $query1);
		$errorStuffs = mysqli_error($con);
		return $errorStuffs;
	}
	
	
?>
