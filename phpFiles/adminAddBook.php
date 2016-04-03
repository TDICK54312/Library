<?php
// Start the session
session_start();
?>
<?php
	include 'api.php';
	
	if(!empty($_POST['submit'])){
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/adminLoginPage.css">
<script>
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#isbnNumber").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
</script>
</head>
<body>
<div id="hello">
	<h1>Admin Add Book</h1>
</div>
<div id='addBookForm'>
	<form method = "POST" action = "">
	Book Title<br><input type="text" name="bookTitle" size="40"></br>
	ISBN Number<br><input type="text" name="isbnNumber" id="isbnNumber" size="40" maxlength="10"></br>
	Author First Name<br><input type="text" name="authorFName" size="40"></br>
	Author Last Name<br><input type="text" name="authorLName" size="40"></br>
	Publisher<br><input type="text" name="publisher" size="40"></br>
	Genre<br><input type="text" name="genreTag" size="40"></br>
	Summary<br><textarea maxlength="255" placeholder="Only 255 characters allowed..." cols="50" rows="4" name="summary"></textarea></br>
	<input id="button" type="submit" name="submit" value="Enter">
	</form> 
</div>
</body>
</html>