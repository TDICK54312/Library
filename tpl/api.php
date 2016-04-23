<?php
	function authenticateUser($username, $password){
		include 'dbConnection.php';
		$tableName = "User";
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$username = mysqli_real_escape_string($con, $username);
		$password = mysqli_real_escape_string($con, $password);
		
		$result = mysqli_query($con,"SELECT * FROM $tableName WHERE USER_EMAIL = '$username' AND PASSWORD = '$password'");
		$array = mysqli_fetch_row($result);
		mysqli_close($con);

	//	echo json_encode($array);
		return $array;
	}
	function transactionReport(){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$getTransactionsQueryAdmin = "SELECT Administrator.FIRSTNAME, Administrator.LASTNAME, User.USER_EMAIL, Inventory.ISBN_NUMBER, Book.TITLE, Transactions.RETURN_DATE FROM User INNER JOIN Administrator ON User.USER_ID = Administrator.USER_ID INNER JOIN Transactions ON User.USER_ID = Transactions.USER_ID INNER JOIN Inventory ON Transactions.INVENTORY_ID = Inventory.INVENTORY_ID INNER JOIN Book ON Inventory.ISBN_NUMBER = Book.ISBN_NUMBER;";
		
		$getTransactionAdminResult = mysqli_query($con, $getTransactionsQueryAdmin);
		echo "<h2>Admin</h2>";
		echo "<table>";
		echo "<tr>";
			echo "<th>Firstname</th>";
			echo "<th>Lastname</th>";
			echo "<th>Email</th>";
			echo "<th>ISBN</th>";
			echo "<th>Title</th>";
			echo "<th>Return Date</th>";
		echo "</tr>\n";
		while($row = mysqli_fetch_row($getTransactionAdminResult)){
			echo "<tr>";
			foreach($row as $cell){
				echo "<td>$cell</td>";
			}
			echo "</tr>\n";
		}
		echo "</table>";
		
		$getTransactionTeacherQuery = "SELECT Teacher.FIRSTNAME, Teacher.LASTNAME, User.USER_EMAIL, Inventory.ISBN_NUMBER, Book.TITLE, Transactions.RETURN_DATE FROM User INNER JOIN Teacher ON User.USER_ID = Teacher.USER_ID INNER JOIN Transactions ON User.USER_ID = Transactions.USER_ID INNER JOIN Inventory ON Transactions.INVENTORY_ID = Inventory.INVENTORY_ID INNER JOIN Book ON Inventory.ISBN_NUMBER = Book.ISBN_NUMBER;";
		$getTransactionTeacherResult = mysqli_query($con, $getTransactionTeacherQuery);
		echo "<h2>Teacher</h2>";
		echo "<table>";
		echo "<tr>";
			echo "<th>Firstname</th>";
			echo "<th>Lastname</th>";
			echo "<th>Email</th>";
			echo "<th>ISBN</th>";
			echo "<th>Title</th>";
			echo "<th>Return Date</th>";
		echo "</tr>\n";
		while($row = mysqli_fetch_row($getTransactionTeacherResult)){
			echo "<tr>";
			foreach($row as $cell){
				echo "<td>$cell</td>";
			}
			echo "</tr>\n";
		}
		echo "</table>";
		
		$getTransactionStudentQuery = "SELECT Student.FIRSTNAME, Student.LASTNAME, User.USER_EMAIL, Inventory.ISBN_NUMBER, Book.TITLE, Transactions.RETURN_DATE FROM User INNER JOIN Student ON User.USER_ID = Student.USER_ID INNER JOIN Transactions ON User.USER_ID = Transactions.USER_ID INNER JOIN Inventory ON Transactions.INVENTORY_ID = Inventory.INVENTORY_ID INNER JOIN Book ON Inventory.ISBN_NUMBER = Book.ISBN_NUMBER;";
		$getTransactionStudentResult = mysqli_query($con, $getTransactionStudentQuery);
		echo "<h2>Teacher</h2>";
		echo "<table>";
		echo "<tr>";
			echo "<th>Firstname</th>";
			echo "<th>Lastname</th>";
			echo "<th>Email</th>";
			echo "<th>ISBN</th>";
			echo "<th>Title</th>";
			echo "<th>Return Date</th>";
		echo "</tr>\n";
		while($row = mysqli_fetch_row($getTransactionStudentResult)){
			echo "<tr>";
			foreach($row as $cell){
				echo "<td>$cell</td>";
			}
			echo "</tr>\n";
		}
		echo "</table>";
		mysqli_close($con);
		
	}
	function adminUserReport(){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$getAdminUserQuery = "SELECT Administrator.FIRSTNAME, Administrator.LASTNAME, Administrator.ADDRESS, User.USER_EMAIL, User.HOLD, User.LAST_ACTIVITY, User.MAX_TRANSACTION FROM User, Administrator WHERE User.USER_ID = Administrator.USER_ID;";
		$getAdminUserResult = mysqli_query($con, $getAdminUserQuery);
		echo "<table>";
		echo "<tr>";
			echo "<th>Firstname</th>";
			echo "<th>Lastname</th>";
			echo "<th>Address</th>";
			echo "<th>Email</th>";
			echo "<th>Hold</th>";
			echo "<th>Last Activity</th>";
			echo "<th>Available Transactions</th>";
		echo "</tr>\n";
		while($row = mysqli_fetch_row($getAdminUserResult)){
			echo "<tr>";
			foreach($row as $cell){
				echo "<td>$cell</td>";
			}
			echo "</tr>\n";
		}
		echo "</table>";
		mysqli_close($con);
	}
	function teacherUserReport(){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$getAdminUserQuery = "SELECT Teacher.FIRSTNAME, Teacher.LASTNAME, Teacher.ADDRESS, User.USER_EMAIL, User.HOLD, User.LAST_ACTIVITY, User.MAX_TRANSACTION FROM User, Teacher WHERE User.USER_ID = Teacher.USER_ID;";
		$getAdminUserResult = mysqli_query($con, $getAdminUserQuery);
		echo "<table>";
		echo "<tr>";
			echo "<th>Firstname</th>";
			echo "<th>Lastname</th>";
			echo "<th>Address</th>";
			echo "<th>Email</th>";
			echo "<th>Hold</th>";
			echo "<th>Last Activity</th>";
			echo "<th>Available Transactions</th>";
		echo "</tr>\n";
		while($row = mysqli_fetch_row($getAdminUserResult)){
			echo "<tr>";
			foreach($row as $cell){
				echo "<td>$cell</td>";
			}
			echo "</tr>\n";
		}
		echo "</table>";
		mysqli_close($con);
	}
	function studentUserReport(){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$getAdminUserQuery = "SELECT Student.FIRSTNAME, Student.LASTNAME, Student.ADDRESS, User.USER_EMAIL, User.HOLD, User.LAST_ACTIVITY, User.MAX_TRANSACTION FROM User, Student WHERE User.USER_ID = Student.USER_ID;";
		$getAdminUserResult = mysqli_query($con, $getAdminUserQuery);
		echo "<table>";
		echo "<tr>";
			echo "<th>Firstname</th>";
			echo "<th>Lastname</th>";
			echo "<th>Address</th>";
			echo "<th>Email</th>";
			echo "<th>Hold</th>";
			echo "<th>Last Activity</th>";
			echo "<th>Available Transactions</th>";
		echo "</tr>\n";
		while($row = mysqli_fetch_row($getAdminUserResult)){
			echo "<tr>";
			foreach($row as $cell){
				echo "<td>$cell</td>";
			}
			echo "</tr>\n";
		}
		echo "</table>";
		mysqli_close($con);
	}
	function payFine($userEmail, $isbn, $amount){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$userEmail = mysqli_real_escape_string($con, $userEmail);
		$isbn = mysqli_real_escape_string($con, $isbn);
		$amount = mysqli_real_escape_string($con, $amount);
		$userID = 0;
		$inventoryID = 0;
		$didReturnNumber = 0;
		$transactionID = 0;
		
		//get USER_ID by username entered
		$getUserIDQuery = "SELECT USER_ID FROM User WHERE USER_EMAIL = '$userEmail';";
		$getUserIDResult = mysqli_query($con, $getUserIDQuery);
		$getUserIDArray = mysqli_fetch_row($getUserIDResult);
		if(empty($getUserIDArray)){
			$error = mysqli_error($con);
			mysqli_close($con);
			return $error;
		}
		else{
			$userID = $getUserIDArray[0];
		}
		
		//get Inventory_ID
		$getInvIDQuery = "SELECT INVENTORY_ID FROM Inventory WHERE ISBN_NUMBER = '$isbn';";
		$getInvIDResult = mysqli_query($con, $getInvIDQuery);
		$getInvIDArray = mysqli_fetch_row($getInvIDResult);
		if(empty($getInvIDArray)){
			$error = mysqli_error($con);
			mysqli_close($con);
			return $error;
		}
		else{
			$inventoryID = $getInvIDArray[0];
		}
		
		//get transaction with the same isbn and username
		$getUserTransactionQuery = "SELECT TRANSACTION_ID, DID_RETURN FROM Transactions WHERE INVENTORY_ID = '$inventoryID' AND USER_ID = '$userID' AND DID_RETURN = '2';";
		$userTransactionResult = mysqli_query($con, $getUserTransactionQuery);
		$userTransactionArray = mysqli_fetch_row($userTransactionResult);
		
		if(empty($userTransactionArray)){
			$error = mysqli_error($con);
			mysqli_close($con);
			return $error;
		}
		else{
			$transactionID = $userTransactionArray[0];
			$didReturnNumber = $userTransactionArray[1];
			//mysqli_close($con);
		}
		//pay the fine of the user by this transaction id
		if($didReturnNumber == 2){
			mysqli_close($con);
			$fineResult = payOffFine($inventoryID, $userID, $transactionID);
			return $fineResult;
		}
		else{
			//return 2 if there was not a 2 in the field
			mysqli_close($con);
			return 2;
		}
	}
	function payOffFine($invID, $userID, $transID){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$payFineQuery = "UPDATE Transactions SET AMOUNT_DUE = 0, DID_RETURN = 1 WHERE TRANSACTION_ID = '$transID';";
		if(!mysqli_query($con, $payFineQuery)){
			$error = mysqli_error($con);
			mysqli_close($con);
			return $error;
		}
		else{
			$updateInventoryQuery = "UPDATE Inventory SET AMOUNT_IN = AMOUNT_IN + 1 , AMOUNT_OUT = AMOUNT_OUT - 1 WHERE INVENTORY_ID = '$invID';";
			if(!mysqli_query($con, $updateInventoryQuery)){
				$error = mysqli_error($con);
				mysqli_close($con);
				return $error;
			}
			else{
				$updateUserMaxTransQuery = "UPDATE User SET MAX_TRANSACTION = MAX_TRANSACTION + 1, HOLD = 0 WHERE USER_ID = '$userID';";
				if(!mysqli_query($con, $updateUserMaxTransQuery)){
					$error = mysqli_error($con);
					mysqli_close($con);
					return $error;
				}
				else{
					return 1;
				}
			}
		}
	}
	function checkInBook($userEmail, $isbn){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$userEmail = mysqli_real_escape_string($con, $userEmail);
		$isbn = mysqli_real_escape_string($con, $isbn);
		$userID = 0;
		$inventoryID = 0;
		$didReturnNumber = 0;
		
		//get USER_ID by username entered
		$getUserIDQuery = "SELECT USER_ID FROM User WHERE USER_EMAIL = '$userEmail';";
		$getUserIDResult = mysqli_query($con, $getUserIDQuery);
		$getUserIDArray = mysqli_fetch_row($getUserIDResult);
		if(empty($getUserIDArray)){
			$error = mysqli_error($con);
			mysqli_close($con);
			return $error;
		}
		else{
			$userID = $getUserIDArray[0];
		}
		
		//get Inventory_ID
		$getInvIDQuery = "SELECT INVENTORY_ID FROM Inventory WHERE ISBN_NUMBER = '$isbn';";
		$getInvIDResult = mysqli_query($con, $getInvIDQuery);
		$getInvIDArray = mysqli_fetch_row($getInvIDResult);
		if(empty($getInvIDArray)){
			$error = mysqli_error($con);
			mysqli_close($con);
			return $error;
		}
		else{
			$inventoryID = $getInvIDArray[0];
		}
		
		//get transaction with the same isbn and username
		$getUserTransactionQuery = "SELECT DID_RETURN FROM Transactions WHERE INVENTORY_ID = '$inventoryID' AND USER_ID = '$userID';";
		$userTransactionResult = mysqli_query($con, $getUserTransactionQuery);
		$userTransactionArray = mysqli_fetch_row($userTransactionResult);
		
		if(empty($userTransactionArray)){
			$error = mysqli_error($con);
			mysqli_close($con);
			return $error;
		}
		else{
			$didReturnNumber = $userTransactionArray[0];
			mysqli_close($con);
		}
		
		//switch cases based on what the didReturnNumber is
		switch($didReturnNumber){
			//If = 0; Set Transaction DID_RETURN  = 1 : This means the book was returned on time.
			case 0:
				$result = updateTransactionToOne($inventoryID, $userID);
				break;
			//If = 1; Return back the user already returned this book.
			case 1:
				$result = 1;
				break;
			//If = 2; User has a fine and must pay the fine.
			case 2:
				$result = 2;
				break;
			//Error happened.	
			default:
				$result = "Error happened!";
				break;
		}
		
		return $result;
	}
	function updateTransactionToOne($invID, $userID){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$updateTransactionQuery = "UPDATE Transactions SET DID_RETURN = '1' WHERE INVENTORY_ID = '$invID' AND USER_ID = '$userID';";
		
		if(!mysqli_query($con, $updateTransactionQuery)){
			$error = mysqli_error($con);
			mysqli_close($con);
			return $error;
		}
		else{
			//update Inventory.AMOUNT_IN = AMOUNT_IN + 1; Inventory.AMOUNT_OUT = AMOUNT_OUT - 1;
			$updateInventoryQuery = "UPDATE Inventory SET AMOUNT_IN = AMOUNT_IN + 1 , AMOUNT_OUT = AMOUNT_OUT - 1 WHERE INVENTORY_ID = '$invID';";
			if(!mysqli_query($con, $updateInventoryQuery)){
				$error = mysqli_error($con);
				mysqli_close($con);
				return $error;
			}
			else{
				$result = 0;
				$updateUserMaxTransQuery = "UPDATE User SET MAX_TRANSACTION = MAX_TRANSACTION + 1 WHERE USER_ID = '$userID';";
				if(!mysqli_query($con, $updateUserMaxTransQuery)){
					$error = mysqli_error($con);
					mysqli_close($con);
					return $error;
				}
				
				return $result;
			}
		}
		
	}
	function getRentedBooks($userID, $amountOfCheckedOut, $userRole){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		$fine = 0;
		$userID = mysqli_real_escape_string($con, $userID);
		
		//Query to get all rented books
		$getRentedBooksTransactionQuery = "SELECT Transactions.ACTUAL_DATE, Transactions.RETURN_DATE, Transactions.DID_RETURN, Transactions.AMOUNT_DUE, Inventory.ISBN_NUMBER FROM Transactions, Inventory WHERE Transactions.USER_ID = '$userID' AND Transactions.INVENTORY_ID = Inventory.INVENTORY_ID AND Transactions.DID_RETURN != '1';";
		$getRentedBooksTransactionResult = mysqli_query($con, $getRentedBooksTransactionQuery);
		
		
		//Query to use the getRentedBookArray to get all the books from the ISBN field
		while($row = mysqli_fetch_array($getRentedBooksTransactionResult)){
			$isbnNum = $row['ISBN_NUMBER'];
			$returnDate = $row['RETURN_DATE'];
			$dateRented = $row['ACTUAL_DATE'];
			$fine = $row['AMOUNT_DUE'] + $fine;
			
			//need to pull books checked out by the user
			$getRentedBookQuery = "SELECT IMAGE, TITLE FROM Book WHERE ISBN_NUMBER = '$isbnNum';";
			$getRentedBookResult = mysqli_query($con, $getRentedBookQuery);
			$getRentedBookArray = mysqli_fetch_row($getRentedBookResult);
			
			$image = $getRentedBookArray[0];
			$title = $getRentedBookArray[1];
			
			echo '<div class="book-cont">';
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'"/><br>';
			echo "<strong>$title</strong><br>";
			echo '<ul style="text-align: left; margin-left: 5%;">';
			echo '<li><strong>Date Checked Out: </strong>: '.$dateRented.'</li>';
			echo '<li><strong>Return Date: </strong>: '.$returnDate.'</li>';
			echo '</ul>';
			echo '</div>';
		}
		echo "<p><strong> Outstanding Fines:</strong> $" . $fine . "</p>";
		mysqli_close($con);	
	}
	function addToUserRental($userID, $isbn){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		$date = date('Y-m-d', strtotime("+7 days"));
		$date = $date . " 21:00:00";
		
		$date = mysqli_real_escape_string($con, $date);
		$userID = mysqli_real_escape_string($con, $userID);
		$isbn = mysqli_real_escape_string($con, $isbn);
		$getinventoryIDQuery = "SELECT INVENTORY_ID FROM Inventory WHERE Inventory.ISBN_NUMBER = $isbn;";
		
		$invId = mysqli_query($con, $getinventoryIDQuery);
		$arrayInvID = mysqli_fetch_row($invId);
		$invID_NEW = $arrayInvID[0];
		
		//Check if the user has gone over max transactions if not update max transaction of the user
		$checkIfMaxTransQuery = "SELECT MAX_TRANSACTION FROM User WHERE USER_ID = '$userID';";
		$userMaxTransResult = mysqli_query($con, $checkIfMaxTransQuery);
		$arrayMaxTrans = mysqli_fetch_row($userMaxTransResult);
		
		if($arrayMaxTrans[0] == 0){
			$maxMessage = "You have maxed out the amount of rentals you can have. Please return your books in order to checkout more!";
			return $maxMessage;
		}
		else{
			$updateMaxTransQuery = "UPDATE User SET MAX_TRANSACTION = (MAX_TRANSACTION - 1) WHERE USER_ID = '$userID';";
			if(!mysqli_query($con, $updateMaxTransQuery)){
				$maxUpdateError = mysqli_error($con);
				return $maxUpdateError;
			}
		}
		
		//Add to Transactions and update Inventory table
		$addTransactionQuery = "INSERT INTO Transactions (INVENTORY_ID, USER_ID, RETURN_DATE, DID_RETURN, AMOUNT_DUE) VALUES ('$invID_NEW', '$userID', '$date', '0', '0.00');";
		
		if (!mysqli_query($con,$addTransactionQuery)){
				$didItWork = mysqli_error($con);
  		}
  		else{
	  		$moveToOutQuery = "UPDATE Inventory SET AMOUNT_IN = (AMOUNT_IN - 1), AMOUNT_OUT = (AMOUNT_OUT + 1) WHERE ISBN_NUMBER = '$isbn';";
	  		//$updateUserAllowedRentalsQuery = "UPDATE User SET "
	  		if (!mysqli_query($con,$moveToOutQuery)){
				$didItWork = mysqli_error($con);
  			}
  		}
		
		mysqli_close($con);
		return $didItWork;
	}
	function lookAtBook($isbn){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$isbn = mysqli_real_escape_string($con, $isbn);
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
	function getSearchResults($isbn){
		include 'dbConnection.php';
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$query = "SELECT Book.ISBN_NUMBER, Book.TITLE, Book.AUTHOR_FNAME, Book.AUTHOR_LNAME, Book.IMAGE FROM Book, Inventory WHERE Book.ISBN_NUMBER = Inventory.ISBN_NUMBER AND Inventory.AMOUNT_IN != '0' AND Book.ISBN_NUMBER = '$isbn';";
		
		$result = mysqli_query($con, $query);
		mysqli_close($con);
		$row = mysqli_fetch_array($result);
		
		if(empty($row)){
			$noResults = "No result found.";
			return $noResults;
		}
		else{
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
		
		$userID = mysqli_real_escape_string($con, $userID);
		$query = "UPDATE User SET LAST_ACTIVITY = now() WHERE USER_ID = '$userID';";
		
		$result = mysqli_query($con, $query);
		mysqli_close($con);
		
	}
	function getUserInfo($userID, $role){
		include 'dbConnection.php';
		
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$userID = mysqli_real_escape_string($con, $userID);
		$role = mysqli_real_escape_string($con, $role);
		
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
		
		//Make connection and find the role of this user
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		//Need to check if the user has any fines or transactions still
		$userID = mysqli_real_escape_string($con, $userID);
		$usersEmail = mysqli_real_escape_string($con, $usersEmail);
		
		//query
		$getRoleQuery = "SELECT USER_ROLE FROM User WHERE USER_ID = '$usersID' AND USER_EMAIL = '$usersEmail'";
		$deleteUserQuery = "DELETE FROM User WHERE User.USER_ID = '$usersID' AND User.USER_EMAIL = '$usersEmail';";
		$deleteQuery = "";
		$didItWork = "";
		$didItWork2 = "";
		
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
		$message = "";
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$isbn = mysqli_real_escape_string($con, $isbn);
		$numToRemove = mysqli_real_escape_string($con, $numToRemove);
		
		$checkInventoryQuery = "SELECT AMOUNT_IN, AMOUNT_OUT FROM Inventory WHERE ISBN_NUMBER = '$isbn';";
		
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
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		$didItWork = " ";
		$didItwork2 = " ";
		
		$isbn = mysqli_real_escape_string($con, $isbn);
		$authorFname = mysqli_real_escape_string($con, $authorFname);
		$authorLname = mysqli_real_escape_string($con, $authorLname);
		$publisher = mysqli_real_escape_string($con, $publisher);
		$summary = mysqli_real_escape_string($con, $summary);
		$tag = mysqli_real_escape_string($con, $tag);
		$title = mysqli_real_escape_string($con, $title);
		$image = mysqli_real_escape_string($con, $image);
		
		$authorFULLName = $authorFname . " " . $authorLname;
		
		$query = "INSERT INTO Book (ISBN_NUMBER, AUTHOR_FNAME, PUBLISHER, SUMMARY, TAG, TITLE, AUTHOR_LNAME, IMAGE, AUTHOR_FULL_NAME) VALUES ('$isbn','$authorFname','$publisher','$summary','$tag','$title','$authorLname', '$image', '$authorFULLName');";
		$checkIfBookExistQuery = "SELECT ISBN_NUMBER FROM Book WHERE ISBN_NUMBER = '$isbn';";
		
		
		$checkBook = mysqli_query($con,$checkIfBookExistQuery);
		
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
	function searchBar($stype, $cnt) {
		include ('dbConnection.php');
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);

		$query = " ";
		$stype = mysqli_real_escape_string($con, $stype);
		$cnt = mysqli_real_escape_string($con, $cnt);
		
		
		if($stype == 1) {
			$query = "SELECT Book.ISBN_NUMBER FROM Book WHERE Book.TITLE LIKE '%$cnt%';"; 
		}
		else if($stype == 2) {
			$query = "SELECT Book.ISBN_NUMBER FROM Book WHERE Book.AUTHOR_FULL_NAME LIKE '%$cnt%';"; 
		}
		else if($stype == 3) {
			$query = "SELECT Book.ISBN_NUMBER FROM Book WHERE Book.ISBN_NUMBER LIKE '%$cnt%';"; 
		}
		else{
			$errors = "Invalid input";
			return $errors;
		}
		
		$errors = "FAILED TO RUN";
		$result = mysqli_query($con, $query);
		if(empty($result)){
			mysqli_error($con);
		}
		else{
			while($row = mysqli_fetch_assoc($result)){
				$arrayResult[] = $row;
			}
			mysqli_close($con);
			return $arrayResult;
		}
		mysqli_close($con);
		return $errors;
		
	}
	
	function addUser($addThisTable, $role, $pWord, $Email, $fname, $lname, $street, $maxBooks){
		include 'dbConnection.php';
		
		//Checks if a user is created for this email address
		$con = mysqli_connect($host, $user, $pass);
		$dbs = mysqli_select_db($con, $databaseName);
		
		//variables
		$tableName = $addThisTable;
		$didItWork = " ";
		
		
		$addThisTable = mysqli_real_escape_string($con, $addThisTable);
		$role = mysqli_real_escape_string($con, $role);
		$pWord = mysqli_real_escape_string($con, $pWord);
		$Email = mysqli_real_escape_string($con, $Email);
		$fname = mysqli_real_escape_string($con, $fname);
		$lname = mysqli_real_escape_string($con, $lname);
		$street = mysqli_real_escape_string($con, $street);
		$maxBooks = mysqli_real_escape_string($con, $maxBooks);
		
		//queries
		$addUserQuery = "INSERT INTO User (USER_ROLE, PASSWORD, USER_EMAIL, HOLD, MAX_TRANSACTION) VALUES ('$role', '$pWord', '$Email', 0, 0);";
		$emailCheckQuery = "SELECT USER_EMAIL FROM User WHERE USER_EMAIL = '$Email'";
		$getUserIDQuery = "SELECT USER_ID FROM User WHERE USER_EMAIL = '$Email'";
		
		
		$checker = mysqli_query($con, $emailCheckQuery);
		$arrayCheck = mysqli_fetch_row($checker);
		
		if(empty($arrayCheck)){
			//Insert into User table
			$result = mysqli_query($con, $addUserQuery);
			
			//Get the ID assigned to the user just entered
			$user_ID = mysqli_insert_id($con);
			
			//Assigning the USER_ID to the correct table ID
			$addUserToCorrectTableQuery = "INSERT INTO $tableName (USER_ID, FIRSTNAME, LASTNAME, ADDRESS) VALUES ('$user_ID', '$fname', '$lname', '$street');";
			
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
