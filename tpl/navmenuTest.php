<script>
$(function(){
  $("#logout").click(function(){
        $.post("logout.php",function(data){
        // if you want you can show some message to user here
     });
	});
});
</script>
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
   <?php if(!$_SESSION["userinfo"]){ ?>
   		<li><a href="login.php">Login</a></li>
    <?php } else { ?>
    <?php if($_SESSION["userinfo"][1] == 1){?>
	    	<li><a>Admin Functions</a>
	    		<ul>
		    		<li><a href="#">Check-In Book</a></li>
		    		<li><a href="#">Check-Out Book</a></li>
		    		<li><a href="adminAddUser.php">Add User</a></li>
		    		<li><a href="adminAddBook.php">Add Book</a></li>
		    		<li><a href="adminDeleteUser.php">Delete User</a></li>
		    		<li><a href="#">Delete Book</a></li>
		    		<li><a href="#">Reports</a></li>
	    		</ul>
	    	</li>
	    	<li><a href="adminProfile.php">My Account</a></li>
    <?php } ?>
    <?php if($_SESSION["userinfo"][1] == 2 || $_SESSION["userinfo"][1] == 3){?> 
    	<li><a href="#">My Account</a></li>
    	<?php } ?>
    <li><a href="login.php" id="logout">Logout</a></li>
    <?php } ?>
</ul>
</div>