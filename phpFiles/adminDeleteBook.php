<?php
// Start the session
session_start();
?>
<?php
	include 'api.php';
	$everythingSet = true;
	if(!empty($_POST['submit'])){
		if(empty($_POST['isbnNumber'])){
			$everythingSet = false;
			echo "ISBN Number not entered!";
		}
		if(empty($_POST['removeNum'])){
			$everythingSet = false;
			echo "Number to remove not entered!";
		}
		if($everythingSet == true){
			//$result = deleteBook($_POST['isbnNumber'], $_POST['removeNum']);
			echo $result;
		}
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
   $("#removeNum").keypress(function (e) {
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
	ISBN Number<br><input type="text" name="isbnNumber" id="isbnNumber" size="40" maxlength="10"></br>
	Amount to Remove<br><input type="text" name="removeNum" id="removeNum" size="40" maxlength="10"></br>
	<input id="button" type="submit" name="submit" value="Enter">
	</form> 
</div>
</body>
</html>