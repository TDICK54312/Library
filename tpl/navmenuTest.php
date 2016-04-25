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
   <li><a href="index.php">Home</a></li>
   <li><a href="aboutUs.php">About</a></li>
   <li><a href="#">Library</a>
      <ul>
         <li><a href="viewLibrary.php">View Books</a></li>
      </ul>
   </li>
   <li><a href="contactUs.php">Contact</a></li>
   <?php if(!$_SESSION["userinfo"]){ ?>
   		<li><a href="login.php">Login</a></li>
    <?php } else { ?>
    <?php if($_SESSION["userinfo"][1] == 1){?>
	    	<li><a>Admin Functions</a>
	    		<ul>
		    		<li><a href="checkInBook.php">Check-In Book</a></li>
		    		<li><a href="viewLibrary.php">Check-Out Book</a></li>
		    		<li><a href="payFine.php">Pay Fines</a></li>
		    		<li><a href="adminAddUser.php">Add User</a></li>
		    		<li><a href="adminAddBook.php">Add Book</a></li>
		    		<li><a href="adminDeleteUser.php">Delete User</a></li>
		    		<li><a href="adminDeleteBook.php">Delete Book</a></li>
		    		<li><a href="viewReports.php">Reports</a></li>
	    		</ul>
	    	</li>
	    	<li><a href="adminProfile.php">My Account</a></li>
    <?php } ?>
    <?php if($_SESSION["userinfo"][1] == 2 || $_SESSION["userinfo"][1] == 3){?> 
    	<li><a href="userProfile.php">My Account</a></li>
    	<?php } ?>
    <li><a href="login.php" id="logout">Logout</a></li>
    <?php } ?>
</ul>
</div>