<?php
	include('api.php');
	include_once('header.php');
?>

<div id="content">
	<h1>Welcome to our Library!</h1>
    <p> Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipiscing elit. Vestibulum in euismod nisl. Proin et ultrices est. Fusce mattis ligula a tellus dignissim, bibendum cursus magna aliquam. Fusce ullamcorper, sapien at dignissim dictum, odio purus placerat lorem, ac eleifend lectus ex vel urna. Vivamus porta accumsan tincidunt. Sed facilisis, erat eu fringilla lacinia, dui velit euismod lectus, tincidunt condimentum sem turpis in leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam convallis pharetra ligula vel maximus. Quisque sem nibh, aliquam non nibh scelerisque, fringilla finibus neque. Sed sagittis sagittis lorem a sagittis. Nulla eget enim sit amet erat commodo aliquet eu eu enim.
</p><p>
Fusce at iaculis urna. Cras sagittis, quam nec porttitor finibus, purus felis efficitur leo, non rhoncus urna turpis a ligula. Curabitur condimentum libero vel augue iaculis, ut imperdiet erat fringilla. Aenean id finibus neque. Nullam imperdiet maximus mollis. Cras aliquam molestie est id congue. Fusce congue nunc eget sodales vestibulum. Integer eget dictum velit. Donec consequat vel ipsum sed interdum. Proin ut diam at lacus lobortis tristique. Donec commodo tellus sed nunc malesuada, quis ullamcorper augue consequat. In maximus facilisis iaculis. </p>

	<h1>New Additions</h1>
	<div>
	<?php getNewBooksInventory(); ?>
    	<!--<div class="book-cont">
        	<img src="http://placehold.it/150x120.jpg"><br>
            <a href="#">Book Title</a><br>
            Publisher
        </div>
        <div class="book-cont">
        	<img src="http://placehold.it/150x120.jpg"><br>
            <a href="#">Book Title</a><br>
            Publisher
        </div>
        <div class="book-cont">
        	<img src="http://placehold.it/150x120.jpg"><br>
            <a href="#">Book Title</a><br>
            Publisher
        </div>
        <div class="book-cont">
        	<img src="http://placehold.it/150x120.jpg"><br>
            <a href="#">Book Title</a><br>
            Publisher
        </div>
        <div class="book-cont">
        	<img src="http://placehold.it/150x120.jpg"><br>
            <a href="#">Book Title</a><br>
            Publisher
        </div>
        <div class="book-cont">
        	<img src="http://placehold.it/150x120.jpg"><br>
            <a href="#">Book Title</a><br>
            Publisher
        </div>-->
    </div>
</div>
<?php include_once('footer.php'); ?>