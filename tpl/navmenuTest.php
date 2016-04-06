<?php
	function logoutUser(){
		session_unset();
		session_destroy();
	}
	if(isset($_GET["hi"])){
		logoutUser();
	}
?>
<div id="cssmenu" class="align-center">
<ul>
   <li><a href="indexx.php">Home</a></li>
   <li><a href="aboutUs.php">About</a></li>
   <li><a href="#">Library</a>
      <ul>
         <li><a href="#">View Books</a></li>
         <li><a href="#">View Authors</a></li>
      </ul>
   </li>
   <li><a href="#">Contact</a></li>
   <?php if(!$_SESSION["userinfo"])
   		{
			?>
   		<li><a href="login.php">Login</a></li>
    <?php } else { ?>
    <?php if($_SESSION["userinfo"][1] == 1){?>
	    	<li><a>Admin Functions</a>
	    		<ul>
		    		<li><a href="#">Check-In Book</a></li>
		    		<li><a href="#">Check-Out Book</a></li>
		    		<li><a href="adminAddUser.php">Add User</a></li>
		    		<li><a href="#">Add Book</a></li>
		    		<li><a href="#">Delete User</a></li>
		    		<li><a href="#">Delete Book</a></li>
		    		<li><a href="#">Reports</a></li>
	    		</ul>
	    	</li>
    <?php } ?> 
    <li><a href="#">My Account</a></li>
    <li><a href="login.php?hi=true">Logout</a></li>
    <?php } ?>
</ul>
</div>