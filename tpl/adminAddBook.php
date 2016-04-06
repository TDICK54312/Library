<?php
	session_start();
?>
<?php
	include 'api.php';
	$everythingSet = true;
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
		if($everythingSet == true){
			$result = addBook($_POST['isbn'], $_POST['authorfname'], $_POST['authorlname'], $_POST['pub'], $_POST['summary'], $_POST['genre'], $_POST['booktitle']);
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
   <link rel="stylesheet" href="style/addBook.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="js/menu_script.js"></script><title>Library Database System</title>
   <script src="http://use.edgefonts.net/berkshire-swash;noticia-text.js"></script>
</head>

<body>
<div id="wrapper">
<div id="header"><img src="images/header.jpg" style="width: 100%;"></div>
<div id="navarea" style="text-align: center; display: block; margin: 0 auto;">
	<?php include_once('navmenuTest.php'); ?>
</div>
<div id="content">
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
			<div class="center"><input type="submit" name="submit" id="loginbtn" value="Log In"></div>
		</form>
	</div>
</div>
</body>
</html>