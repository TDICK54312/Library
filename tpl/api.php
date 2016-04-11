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
	function addToUserRental($userID, $isbn){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		$date = date('Y-m-d', strtotime("+7 days"));
		$date = $date . " 21:00:00";
		
		$getinventoryIDQuery = "SELECT INVENTORY_ID FROM Inventory WHERE Inventory.ISBN_NUMBER = $isbn;";
		
		$invId = mysqli_query($con, $getinventoryIDQuery);
		$arrayInvID = mysqli_fetch_row($invId);
		$invID_NEW = $arrayInvID[0];
		
		//$dueDate = date

		$addTransactionQuery = "INSERT INTO Transaction (INVENTORY_ID, USER_ID, RETURN_DATE, DID_RETURN, AMOUNT_DUE) VALUES ('$invID_NEW', '$userID', '$date', '0', '0.00');";
		
		if (!mysqli_query($con,$addTransactionQuery)){
				$didItWork = mysqli_error($con);
  		}
		
		mysqli_close($con);
		return $didItWork;
	}
	function lookAtBook($isbn){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		//$query = "SELECT  FROM Book WHERE ISBN_NUMBER = '$isbn';";
		$query = "SELECT Book.TAG, Book.PUBLISHER, Book.AUTHOR_FNAME, Book.AUTHOR_LNAME, Book.SUMMARY, Inventory.AMOUNT_IN, Inventory.INVENTORY_ID, Book.IMAGE, Book.TITLE FROM Book, Inventory WHERE Book.ISBN_NUMBER = '$isbn' AND Inventory.ISBN_NUMBER = '$isbn';";
		
		$stuff = mysqli_query($con, $query);
		$result = mysqli_fetch_row($stuff);
		mysqli_close($con);
		
		$author = $result[2] . " " . $result[3];
		$genre = $result[0];
		$publisher = $result[1];
		$summary = $result[4];
		$in = $result[5];
		$invID = $result[6];
		$image = $result[7];
		$title = $result[8];
		
		
		echo '<div class="book-cont">';
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'"/>';
		echo '<form class="inv-form" name="aBook" method="POST" action=""';
		echo '<ul style="text-align: left; margin-left: 5%;">';
		echo '<li><strong>Title</strong>: '.$title.'</li>';
		echo '<li><strong>Author</strong>: '.$author.'</li>';
		echo '<li><strong>Genre</strong>: '.$genre.'</li>';
		echo '<li><strong>Publisher</strong>: '.$publisher.'</li>';
		echo '<li><strong>Summary</strong>: '.$summary.'</li>';
		echo '</ul>';
		echo '<br><br>';
		echo '<p><strong>Books in Inventory:</strong> '.$in.'</p>';
		echo '<p><strong>Inv. ID:</strong> '.$invID.'</p>';
		echo "<input type='hidden' name='genre' id='genre' class='txtfield' value='$genre' readonly tabindex='1'>";
		
		echo "<input type='hidden' name='isbn' id='isbn' class='txtfield' value='$isbn' readonly tabindex='2'>";
		
		echo "<input type='hidden' name='author' id='author' class='txtfield' value='$author' readonly tabindex='3'>";
		
		echo "<input type='hidden' name='publisher' id='publisher' class='txtfield' value='$publisher' readonly tabindex='4'>";
		
		echo "<input type='hidden' name='in' id='in' class='txtfield' value='$in' readonly tabindex='5'>";
		
		echo "<input type='hidden' name='summary' id='summary' class='txtfield' value='$summary' readonly cols='30' rows='4' tabindex='6'>";
		echo "<input type='hidden' name='invID' id='invID' class='txtfield' value='$invID' readonly>";
		echo '<input type="submit" name="submit" id="loginbtn" value="Check out">';
		echo '</form>';
		echo '</div>';
	}
	function getBookInventory(){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		//This finds all the books that are in the inventory that the amount in is not 0
		$queryBookTable = "SELECT Book.ISBN_NUMBER, Book.TITLE, Book.AUTHOR_FNAME, Book.AUTHOR_LNAME, Book.IMAGE FROM Book, Inventory WHERE Book.ISBN_NUMBER = Inventory.ISBN_NUMBER AND Inventory.AMOUNT_IN != '0';";
		
		$result = mysqli_query($con, $queryBookTable);
		mysqli_close($con);
		while($row = mysqli_fetch_array($result)){
			$isbn = $row['ISBN_NUMBER'];
			$title = $row['TITLE'];
			$author = $row['AUTHOR_FNAME'] . " " . $row['AUTHOR_LNAME'];
			$image = $row['IMAGE'];
			
			echo '<div class="book-cont">';
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'"/><br>';
			echo "<strong>$title</strong><br>";
			echo $author;
			echo '<form class="inv-form" name="inv" method="POST" action=""';
			echo "<input type='hidden' name='title' id='title' class='txtfield' value='$title' readonly tabindex='1'>";
			echo "<input type='hidden' name='author' id='author' class='txtfield' value='$author' readonly tabindex='2'>";
			echo "<input type='hidden' name='isbn' id='isbn' class='txtfield' value='$isbn' readonly>";
			echo '<input type="submit" name="submit" id="loginbtn" value="View Book">';
			echo '</form>';
			echo '</div>';
			
		}
	}
	function getNewBooksInventory(){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$queryBookTable = "SELECT Book.ISBN_NUMBER, Book.TITLE, Book.AUTHOR_FNAME, Book.AUTHOR_LNAME, Book.IMAGE FROM Book, Inventory, NewBooks WHERE Book.ISBN_NUMBER = Inventory.ISBN_NUMBER AND Inventory.AMOUNT_IN != '0' AND Book.BOOK_ID = NewBooks.BOOK_ID;";
		
		$result = mysqli_query($con, $queryBookTable);
		mysqli_close($con);
		
		while($row = mysqli_fetch_array($result)){
			$isbn = $row['ISBN_NUMBER'];
			$title = $row['TITLE'];
			$author = $row['AUTHOR_FNAME'] . " " . $row['AUTHOR_LNAME'];
			$image = $row['IMAGE'];
			
			echo '<div class="book-cont">';
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'"/><br>';
			echo "<strong>$title</strong><br>";
			echo $author;
			echo '<form class="inv-form" name="inv" method="POST" action=""';
			echo "<input type='hidden' name='title' id='title' class='txtfield' value='$title' readonly tabindex='1'>";
			echo "<input type='hidden' name='author' id='author' class='txtfield' value='$author' readonly tabindex='2'>";
			echo "<input type='hidden' name='isbn' id='isbn' class='txtfield' value='$isbn' readonly>";
			echo '<input type="submit" name="submit" id="loginbtn" value="View Book">';
			echo '</form>';
			echo '</div>';
			
		}
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
	function addBook($isbn, $authorFname, $authorLname, $publisher, $summary, $tag, $title, $image){
		include 'dbConnection.php';
		
		$didItWork = " ";
		$didItwork2 = " ";
		$query = "INSERT INTO Book (ISBN_NUMBER, AUTHOR_FNAME, PUBLISHER, SUMMARY, TAG, TITLE, AUTHOR_LNAME, IMAGE) VALUES ('$isbn','$authorFname','$publisher','$summary','$tag','$title','$authorLname', '$image');";
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
  			$newBookID = mysqli_insert_id($con);
  			if (!mysqli_query($con,$addToInventoryQuery)){
				$didItWork2 = mysqli_error($con);
  			}
  			$newBookQuery = "INSERT INTO NewBooks (BOOK_ID) VALUES ('$newBookID');";
  			if (!mysqli_query($con,$newBookQuery)){
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
