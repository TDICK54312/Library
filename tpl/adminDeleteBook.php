<?php
// Start the session
session_start();
?>
<?php
	include 'api.php';
	$everythingSet = true;
	if(!empty($_POST['submit'])){
		if(empty($_POST['isbn'])){
			$everythingSet = false;
			echo "ISBN Number not entered!";
		}
		if(empty($_POST['removeNum'])){
			$everythingSet = false;
			echo "Number to remove not entered!";
		}
		if($everythingSet == true){
			$result = deleteBook($_POST['isbn'], $_POST['removeNum']);
			echo $result;
		}
	}
	
?>
<!doctype html>
<html>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="style/menu-styleTest.css">
   <link rel="stylesheet" href="style/deleteBook.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="js/menu_script.js"></script><title>Library Database System</title>
   <script src="http://use.edgefonts.net/berkshire-swash;noticia-text.js"></script>
</head>
<script>
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#isbn").keypress(function (e) {
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
<body>
<div id="wrapper">
<div id="header"><img src="images/header.jpg" style="width: 100%;"></div>
<div id="navarea" style="text-align: center; display: block; margin: 0 auto;">
	<?php include_once('navmenuTest.php'); ?>
</div>
<div id="content">
	<h1>Delete User</h1>
	<div class="login-cont">
		<form id ="loginForm" name="loginForm" method="POST" action="">
			<label for="isbn">ISBN Number:</label>
			<input type="text" name="isbn" id="isbn" class="txtfield" tabindex="1">
			<label for="removeNum">Amount to Remove:</label>
			<input type="text" name="removeNum" id="removeNum" class="txtfield" tabindex="2">
			<div class="center"><input type="submit" name="submit" id="loginbtn" value="send"></div>
		</form>
	</div>
</div>
</body>
</html>