<section id= "header">
	<h1>BookABook</h1>
</section>
<nav class="nav">
	<ul>
		<li><a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php"> Home</a></li>
		<li><a class="<?php echo $current_page == 'aboutus.php' ? 'active' : NULL ?>" href="aboutus.php">About us</a></li>
		<li><a class="<?php echo $current_page == 'browsebooks.php' ? 'active' : NULL ?>" href="browsebooks.php">Browse books</a></li>
		<li><a class="<?php echo $current_page == 'mybooks.php' ? 'active' : NULL ?>" href="mybooks.php">My books</a></li>
		<li><a class="<?php echo $current_page == 'gallery.php' ? 'active' : NULL ?>" href="gallery.php">Gallery</a></li>
		<li><a class="<?php echo $current_page == 'contact.php' ? 'active' : NULL ?>" href="contact.php">Contact</a></li>
	</ul>
</nav>


<style>
	.active {
		background-color: rgba(255, 140, 0,0.5);

    	border-radius: 10px;
    	padding:0px;

	}
	.active a{
		background-color: rgba(255, 140, 0,0.5);

    	border-radius: 10px;
    	padding:0px;

	}

	header{
	overflow: hidden;

	}
	#header{
		height:150px;
		background-image: url("imgheader.png");
		background-size: 100%;
	    background-repeat: no-repeat;
	    background-position: center; 
	}

	h1{
		font-family: "open sans",sans-serif;
		font-weight: 800;
		text-transform: uppercase;
		text-align: left;
		font-size: 100px;
		margin:0;
		padding:50px 20px ;
		color:white;
	}

	/* NAVIGATION */

	nav{
		
		border-bottom: solid #eeeeee 1px;
		border-top:solid #eeeeee 1px;
		background-color: white;
	}

	.nav{
		text-align: left;
	}

	nav ul{
		list-style:none;
		margin:0;
		padding:0;
	}

	.nav li, .nav > ul > li > a {
		font-family: "open sans",sans-serif;
		font-weight: 300;
		display:inline;
		text-transform: uppercase;
		padding: 15px;
	}

	.nav a{
		text-decoration:none;
		color:black;
		line-height: 42px;
	}
	a:hover{
		color:orange;
	}
</style>