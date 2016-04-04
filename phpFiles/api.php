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
	
	function addBook($isbn, $authorFname, $authorLname, $publisher, $summary, $tag, $title){
		include 'dbConnection.php';
		
		$didItWork = " ";
		$didItwork2 = " ";
		$query = "INSERT INTO Book (ISBN_NUMBER, AUTHOR_FNAME, PUBLISHER, SUMMARY, TAG, TITLE, AUTHOR_LNAME) VALUES ('$isbn','$authorFname','$publisher','$summary','$tag','$title','$authorLname');";
		$checkIfBookExistQuery = "SELECT ISBN_NUMBER FROM Book WHERE ISBN_NUMBER = '$isbn';";
		//$addToInventoryQuery = "";
		
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$checkBook = mysqli_query($con,$checkIfBookExistQuery);
		$array = mysqli_fetch_row($checkBook);
		
		if(empty($array)){
			$addToInventoryQuery = "INSERT INTO Inventory (ISBN_NUMBER, AMOUNT_IN, AMOUNT_OUT) VALUES ('$isbn', '1', '0');";
			if (!mysqli_query($con,$query)){
				$didItWork = mysqli_error($con);
  			}
  			if (!mysqli_query($con,$addToInventoryQuery)){
				$didItWork2 = mysqli_error($con);
  			}
		}
		else{
			addToInventoryQuery = "UPDATE Inventory SET AMOUNT_IN = AMOUNT_IN + 1 WHERE ISBN_NUMBER = '$isbn';";
			if (!mysqli_query($con,$addToInventoryQuery)){
				$didItWork2 = mysqli_error($con);
  			}
		}
		
  		return $didItWork2;
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
