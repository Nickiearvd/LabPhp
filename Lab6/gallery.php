<!doctype html>
<html>
	<head>
		<title>BookABook</title>
		<meta name="description" content="This is my page" />
		<link rel="stylesheet" type="text/css" href="stylefile.css"/>
		<meta charset="utf-8" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
		<?php include "config.php";?>
	</head>
	<body>
		<header>
			<?php include "headernav.php";?>
		</header>
		<main>
			<h2>GALLERY</h2>
			<body>

			<div class="bilder">
			<!--SOURCE OF GALLERY https://stackoverflow.com/questions/11903289/pull-all-images-from-a-specified-directory-and-then-display-them --> 
			    <?php
					$files = glob("uploadedimages/*.*");
					for ($i = 0; $i < count($files); $i++) {
					    $image = $files[$i];
					    echo '<img src="' . $image . '" alt="Random image" class="bild"/>' . "<br /><br />";

					}
				?>
			</div>


		</main>
		<footer>
			<?php include "footer.php";?>
		</footer>
	</body>

</html>

	