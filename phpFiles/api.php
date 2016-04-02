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
	
	function deleteUser($usersID, $usersEmail){
		include 'dbConnection.php';
		
		//query
		$getRoleQuery = "SELECT USER_ROLE FROM User WHERE USER_ID = '$usersID' AND USER_EMAIL = '$usersEmail'";
		$deleteUserQuery = "DELETE FROM User WHERE User.USER_ID = '$usersID' AND User.USER_EMAIL = '$usersEmail';";
		$deleteQuery = "";
		$didItWork = "";
		$didItWork2 = "";
		
		//Make connection and find the role of this user
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$usersRoleResult = mysqli_query($con, $getRoleQuery);
		$array = mysqli_fetch_row($usersRoleResult);
		
		if($array[0] == 1){
			$deleteQuery = "DELETE FROM Administrator WHERE Administrator.USER_ID = '$usersID';"
			if (!mysqli_query($con,$deleteQuery)){
				$didItWork = mysqli_error($con);
  			}
  			if (!mysqli_query($con,$deleteUserQuery)){
				$didItWork2 = mysqli_error($con);
  			}		
		}
		
		if($array[0] == 2){
			$deleteQuery = "DELETE FROM Teacher WHERE Teacher.USER_ID = '$usersID';" 
			if (!mysqli_query($con,$deleteQuery)){
				$didItWork = mysqli_error($con);
  			}
  			if (!mysqli_query($con,$deleteUserQuery)){
				$didItWork2 = mysqli_error($con);
  			}			
  		}
  		
		if($array[0] == 3){
			$deleteQuery = "DELETE FROM Student WHERE Student.USER_ID = '$usersID';"
			if (!mysqli_query($con,$deleteQuery)){
				$didItWork = mysqli_error($con);
  			}
  			if (!mysqli_query($con,$deleteUserQuery)){
				$didItWork2 = mysqli_error($con);
  			}		
  		}
  		
  		return $didItWork;	
	}

	function addUser($addThisTable, $role, $pWord, $Email, $fname, $lname, $street, $maxBooks){
		include 'dbConnection.php';
		
		//variables
		$tableName = $addThisTable;
		$didItWork = " ";
		
		//queries
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
			
			//Get the ID assigned to the user just entered
			$user_ID = mysqli_insert_id($con);
			
			//Assigning the USER_ID to the correct table ID
			$addUserToCorrectTableQuery = "INSERT INTO $tableName (USER_ID, FIRSTNAME, LASTNAME, MAX_TRANSACTION, ADDRESS) VALUES ('$user_ID', '$fname', '$lname', '$maxBooks', '$street');";
			
			if (!mysqli_query($con,$addUserToCorrectTableQuery)){
				$didItWork = mysqli_error($con);
  			}
		}
		else{
			$duplicate = "A user is already entered with the same email.";
			return $duplicate;
		}

		//return $didItWork;
		return $didItWork;
	}
?>
