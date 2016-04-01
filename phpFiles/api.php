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

	function addUser($addThisTable, $role, $pWord, $Email, $fname, $lname, $street, $maxBooks){
		include 'dbConnection.php';
		$tableName = $addThisTable;
		$didItWork = " ";
		$addUserQuery = "INSERT INTO User (USER_ROLE, PASSWORD, USER_EMAIL, HOLD) VALUES ('$role', '$pWord', '$Email', 0);";
		$emailCheckQuery = "SELECT USER_EMAIL FROM User WHERE USER_EMAIL = '$Email'";
		$getUserIDQuery = "SELECT USER_ID FROM User WHERE USER_EMAIL = '$Email'";
		
		//Checks if a user is created for this email address
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$checker = mysqli_query($con, $emailCheckQuery);
		$arrayCheck = mysqli_fetch_row($checker);
		
		if(empty($arrayCheck)){
			//Insert into User table
			$result = mysqli_query($con, $addUserQuery);
			
			//Get the ID assigned to the user entered
			$user_ID = mysqli_insert_id($con);
			//Assigning the USER_ID to the correct table ID
			$addUserToCorrectTableQuery = "INSERT INTO $tableName (USER_ID, FIRSTNAME, LASTNAME, MAX_TRANSACTION, ADDRESS) VALUES ('$user_ID', '$fname', '$lname', '$maxBooks', '$street');";
			//$didItWork = $addUserToCorrectTableQuery;	
			
			if (!mysqli_query($con,$addUserToCorrectTableQuery)){
				$didItWork = mysqli_error($con);
  			}
		}
		else{
			return false;
		}
		
		
		
		//return $didItWork;
		return $user_ID;
	}
	
	
?>
