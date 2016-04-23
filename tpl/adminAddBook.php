<?php
	
	include_once('header.php');

	include 'api.php';
	include('inc_search.php');
	$everythingSet = true;
	$uploadOk = 1;
	if(!empty($_POST['submit'])){
		if(empty($_POST['booktitle'])){
			$everythingSet = false;
			echo "Title not entered!";
		}
		if(empty($_POST['isbn'])){
			$everythingSet = false;
			echo "ISBN Number not entered!";
		}
		if(empty($_POST['authorfname'])){
			$everythingSet = false;
			echo "Author First name not entered!";
		}
		if(empty($_POST['authorlname'])){
			$everythingSet = false;
			echo "Author Last name not entered!";
		}
		if(empty($_POST['pub'])){
			$everythingSet = false;
			echo "Publisher name not entered!";
		}
		if(empty($_POST['genre'])){
			$everythingSet = false;
			echo "Genre First not entered!";
		}
		if(empty($_POST['summary'])){
			$everythingSet = false;
			echo "Summary not entered!";
		}		
		if($everythingSet == true && $uploadOk == 1){
			$data = file_get_contents($_FILES['image']['tmp_name']);
            $dataimage = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $isbn = $_POST['isbn'];
            
			$result = addBook($isbn, $_POST['authorfname'], $_POST['authorlname'], $_POST['pub'], $_POST['summary'], $_POST['genre'], $_POST['booktitle'], $dataimage);
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
});
</script>
	<h1>Add Book</h1>
	<style type="text/css">
		.login-cont {
			width: 30%;
			display: block;
			margin: 0 auto;
		}
		.login-cont label {
			width: 100%;
		}
		.login-cont input, .login-cont input[type=email], .login-cont input[type=password] {
			width: 95%;
			-webkit-box-shadow: inset 0px 0px 16px -7px rgba(255,0,0,0.49);
			-moz-box-shadow: inset 0px 0px 16px -7px rgba(255,0,0,0.49);
			box-shadow: inset 0px 0px 16px -7px rgba(255,0,0,0.49);
			border-radius: 15px 15px 15px 15px;
			-moz-border-radius: 15px 15px 15px 15px;
			-webkit-border-radius: 15px 15px 15px 15px;
			border: 1px solid #CF8283;
			height: 25px;
			margin-bottom: 20px;
			font-size: 15px;
			padding-left: 8px;
			color: #848484;
			text-shadow: 2px 2px 1px rgba(150, 150, 150, 1);
		}
		.login-cont input[type=submit] {
			width: 100%;
			height: 30px;
			background-color: #CF8283;
			font-size: 18px;
			color: white;
			border: 0;
		}
		.login-cont input[type=submit]:active {
			background-color: #5A0507;
			color: #848484;
			padding-top: 5px;
			webkit-box-shadow:  0px 0px 16px -7px rgba(255,0,0,0.49);
			-moz-box-shadow:  0px 0px 16px -7px rgba(255,0,0,0.49);
			box-shadow:  0px 0px 16px -7px rgba(255,0,0,0.49);
		}
	</style>
	<div class="login-cont">
		<form id ="loginForm" name="loginForm" method="POST" enctype="multipart/form-data" action="">
			<label for="booktitle">Book Title:</label>
			<input type="text" name="booktitle" id="booktitle" class="txtfield" tabindex="1">
			<label for="isbn">ISBN Number:</label>
			<input type="text" name="isbn" id="isbn" class="txtfield" tabindex="2">
			<label for="authorfname">Author First Name:</label>
			<input type="text" name="authorfname" id="authorfname" class="txtfield" tabindex="3">
			<label for="authorlname">Author Last Name:</label>
			<input type="text" name="authorlname" id="authorlname" class="txtfield" tabindex="4">
			<label for="pub">Publisher:</label>
			<input type="text" name="pub" id="pub" class="txtfield" tabindex="5">
			<label for="genre">Genre:</label>
			<input type="text" name="genre" id="genre" class="txtfield" tabindex="6">
			<label for="summary">Summary:</label>
			<textarea maxlength="255" placeholder="Only 255 characters allowed..." cols="30" rows="4" name="summary" tabindex="7"></textarea>
			<label for="image">Image:</label>
			<input type="file" name="image" id="image">
			<div class="center"><input type="submit" name="submit" id="loginbtn" value="Enter"></div>
		</form>
	</div>
</div>
<?php include_once('footer.php'); ?>