<?php
	
	include_once('header.php');

	include 'api.php';
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
		if(!empty($_POST['image'])){
			$target_file = basename($_FILES['image']['name']);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			// Check if image file is a actual image or fake image
			/*if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["image"]["tmp_name"]);
				if($check !== false) {
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
    			} else {
					//echo "File is not an image.";
					$uploadOk = 0;
    			}
			}*/
			
			// Check if file already exists
			/*if (file_exists($target_file)) {
				//echo "Sorry, file already exists.";
				$uploadOk = 0;
			}*/
			// Check file size
			if ($_FILES['image']['size'] > 64000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
				
			// Allow certain file formats
			/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
				echo "Sorry, only JPG, JPEG, PNG files are allowed.";
				$uploadOk = 0;
			}*/
			
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
				
				// if everything is ok, try to upload file
			} 
		}
		if($everythingSet == true && $uploadOk == 1){
			$data = file_get_contents($_FILES['image']['tmp_name']);
            //$data = mysql_real_escape_string($data);
            
			$result = addBook($_POST['isbn'], $_POST['authorfname'], $_POST['authorlname'], $_POST['pub'], $_POST['summary'], $_POST['genre'], $_POST['booktitle'], $data);
			echo var_dump($_FILES['image']);
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
});
</script>
	<h1>Add Book</h1>
	<div class="login-cont">
		<form id ="loginForm" name="loginForm" method="POST" action="">
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