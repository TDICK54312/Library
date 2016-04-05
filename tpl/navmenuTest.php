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
   		<li><a href="#">Login</a></li>
   		<div id="loginBox">                
                    <form id="loginForm">
                        <fieldset id="body">
                            <fieldset>
                                <label for="email">Email Address</label>
                                <input type="text" name="email" id="email" />
                            </fieldset>
                            <fieldset>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" />
                            </fieldset>
                            <input type="submit" id="login" value="Sign in" />
                            <label for="checkbox"><input type="checkbox" id="checkbox" />Remember me</label>
                        </fieldset>
                        <span><a href="#">Forgot your password?</a></span>
                    </form>
                </div>
    <?php } else { ?>
    <li><a href="#">My Account</a></li>
    <li><a href="#">Logout</a></li>
    <?php } ?>
</ul>
</div>