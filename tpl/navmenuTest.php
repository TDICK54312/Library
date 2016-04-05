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
   <?php if(!$_SESSION['logged_in'])
   		{
			?>
   		<li><a href="login.php">Login</a></li>
    <?php } else { ?>
    <li><a href="#">My Account</a></li>
    <li><a href="#">Logout</a></li>
    <?php } ?>
</ul>
</div>