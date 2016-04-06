<?php
	function authenticateUser($username, $password){
		include 'dbConnection.php';
		$tableName = "User";
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		$result = mysqli_query($con,"SELECT * FROM $tableName WHERE USER_EMAIL = '$username' AND PASSWORD = '$password'");
		$array = mysqli_fetch_row($result);
		mysqli_close($con);

	//	echo json_encode($array);
		return $array;
	}
	function updateTimeLoggedIn($userID){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$query = "UPDATE User SET LAST_ACTIVITY = now() WHERE USER_ID = '$userID';";
		
		$result = mysqli_query($con, $query);
		mysqli_close($con);
		
	}
	function getUserInfo($userID, $role){
		include 'dbConnection.php';
		
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		if($role == 1){
			$query = "SELECT * FROM Administrator WHERE USER_ID = '$userID';";
		}
		if($role == 2){
			$query = "SELECT * FROM Teacher WHERE USER_ID = '$userID';";
		}
		if($role == 3){
			$query = "SELECT * FROM Student WHERE USER_ID = '$userID';";
		}
		
		$result = mysqli_query($con, $query);
		$array = mysqli_fetch_row($result);
		mysqli_close($con);
		return $array;
	}
	
	function deleteUser($usersID, $usersEmail){
		include 'dbConnection.php';
		
		//Need to check if the user has any fines or transactions still
		
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
			$deleteQuery = "DELETE FROM Administrator WHERE Administrator.USER_ID = '$usersID';";
			if (!mysqli_query($con,$deleteQuery)){
				$didItWork = mysqli_error($con);
  			}
  			if (!mysqli_query($con,$deleteUserQuery)){
				$didItWork2 = mysqli_error($con);
  			}		
		}
		
		if($array[0] == 2){
			$deleteQuery = "DELETE FROM Teacher WHERE Teacher.USER_ID = '$usersID';"; 
			if (!mysqli_query($con,$deleteQuery)){
				$didItWork = mysqli_error($con);
  			}
  			if (!mysqli_query($con,$deleteUserQuery)){
				$didItWork2 = mysqli_error($con);
  			}			
  		}
  		
		if($array[0] == 3){
			$deleteQuery = "DELETE FROM Student WHERE Student.USER_ID = '$usersID';";
			if (!mysqli_query($con,$deleteQuery)){
				$didItWork = mysqli_error($con);
  			}
  			if (!mysqli_query($con,$deleteUserQuery)){
				$didItWork2 = mysqli_error($con);
  			}		
  		}
  		mysqli_close($con);
  		return $didItWork;	
	}
	function deleteBook($isbn, $numToRemove){
		include 'dbConnection.php';
		$checkInventoryQuery = "SELECT AMOUNT_IN, AMOUNT_OUT FROM Inventory WHERE ISBN_NUMBER = '$isbn';";
		$message = "";
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$result = mysqli_query($con, $checkInventoryQuery);
		$arrayInventory = mysqli_fetch_row($result);
		$checkAmountIn = $arrayInventory[0] - $numToRemove;
		
		if(empty($arrayInventory)){
			$message = "No Books with this ISBN number where found!";
			return $message;
		}
		elseif($checkAmountIn >= 0){
			//If AMOUNT_IN and AMOUNT_OUT will be equal to 0 then remove from Inventory and Book table
			if($checkAmountIn == 0 && $arrayInventory[1] == 0){
				$deleteBookFromInventoryQuery = "DELETE FROM Inventory WHERE ISBN_NUMBER = '$isbn';";
				$deleteBookFromLibraryQuery = "DELETE FROM Book WHERE ISBN_NUMBER = '$isbn';";
				
				if (!mysqli_query($con,$deleteBookFromInventoryQuery)){
					$message = mysqli_error($con);
  				}
  				if (!mysqli_query($con,$deleteBookFromLibraryQuery)){
					$message = mysqli_error($con);
  				}
  				mysqli_close($con);
  				return $message;				
			}
			//If AMOUNT_IN will be 0 BUT there are books still out then UPDATE Inventory table AMOUNT_IN to be 0 but still leave row in Inventory and Book tables
			elseif($checkAmountIn == 0 && $arrayInventory[1] > 0){
				$deleteBookFromInventoryQuery = "UPDATE Inventory SET AMOUNT_IN = $checkAmountIn WHERE ISBN_NUMBER = '$isbn';";
				
				if (!mysqli_query($con,$deleteBookFromInventoryQuery)){
					$message = mysqli_error($con);
  				}
  				mysqli_close($con);
  				return $message;
			}
			//If AMOUNT_IN will still be positive then UPDATE Inventory table to new amount
			elseif($checkAmountIn > 0 && $arrayInventory[1] >= 0){
				$deleteBookFromInventoryQuery = "UPDATE Inventory SET AMOUNT_IN = $checkAmountIn WHERE ISBN_NUMBER = '$isbn';";
				
				if (!mysqli_query($con,$deleteBookFromInventoryQuery)){
					$message = mysqli_error($con);
  				}
  				mysqli_close($con);
  				return $message;
			}
			else{
				$message = "Im missing a case...";
				mysqli_close($con);
				return $message;
			}
		}
		else{
			$message = "You entered a number that does not make sense please retry.";
			mysqli_close($con);
			return message;
		}	
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
			$addToInventoryQuery = "UPDATE Inventory SET AMOUNT_IN = AMOUNT_IN + 1 WHERE ISBN_NUMBER = '$isbn';";
			if (!mysqli_query($con,$addToInventoryQuery)){
				$didItWork2 = mysqli_error($con);
  			}
		}
		mysqli_close($con);
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
			mysqli_close($con);
			return $duplicate;
		}
		mysqli_close($con);
		//return $didItWork;
		return $didItWork;
	}
?>
