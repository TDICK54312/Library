<?php
// Start the session
	session_start();
	include_once('header.php');
	
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
<div id="content">
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
	<h1>Delete Book</h1>
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
<?php include_once('footer.php'); ?>