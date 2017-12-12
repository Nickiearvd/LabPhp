<?php include "config.php";?>
<?php include "headernav.php";?>
<?php
	
	

?>

<!doctype html>
<html>
	<head>
		<title>BookABook</title>
		<meta name="description" content="This is my page" />
		<link rel="stylesheet" type="text/css" href="stylefile.css"/>
		<meta charset="utf-8" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
	</head>
	<body>
		<main>

		<h2>Contact</h2>
		<div class="containercontact">
			<form action="" method ="POST">
			    <label for="fname">First Name</label>
			    <input type="text" id="fname" name="firstname" placeholder="Enter your firstname">

			    <label for="lname">Last Name</label>
			    <input type="text" id="lname" name="lastname" placeholder="Enter your lastname">

			    <label for="subject">Subject</label>
			    <textarea id="subject" name="subject" placeholder="Write something here" style="height:100px"></textarea>

			    <input class="button" type="submit" value="Submit">
			</form>
		</div>
		</main>
		<footer>
			<?php include "footer.php";?>
		</footer>
	</body>
</html>