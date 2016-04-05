<div id="cssmenu" class="align-center">
<ul>
   <li><a href="#">Home</a></li>
   <li><a href="#">About</a></li>
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
	    	<li><a href="#">Admin Functions</a>
	    		<ul>
		    		<li><a href="#">Check-In Book</a></li>
		    		<li><a href="#">Check-Out Book</a></li>
		    		<li><a href="#">Add User</a></li>
		    		<li><a href="#">Add Book</a></li>
		    		<li><a href="#">Delete User</a></li>
		    		<li><a href="#">Delete Book</a></li>
		    		<li><a href="#">Reports</a></li>
	    		</ul>
	    	</li>
    <?php } ?> 
    <li><a href="#">My Account</a></li>
    <li><a href="#">Logout</a></li>
    <?php } ?>
</ul>
</div>