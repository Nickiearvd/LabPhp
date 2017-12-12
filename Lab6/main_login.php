<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:backend/index.php");
}
?>
<?php 
include("config.php"); 
include("headernav.php"); 

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

	if ($db->connect_error) {
		echo "could not connect: " . $db->connect_error;
		exit();
	}
?>

<?php 
	if (isset($_POST['myusername'], $_POST['mypassword'])):
	$myusername =  stripslashes($_POST['myusername']);
	$mypassword =  stripslashes($_POST['mypassword']);

	$myusername = mysqli_real_escape_string($db, $_POST['myusername']);
	$mypassword = mysqli_real_escape_string($db, $_POST['mypassword']);
	

	$stmt = $db->prepare("SELECT Username, Userpass FROM Userinfo WHERE Username = ?");
	$stmt->bind_param('s', $myusername);
	$stmt->execute();
	
    $stmt->bind_result($username, $password);

    while ($stmt->fetch()) {
        if (sha1($mypassword) == $password)
		{
			$_SESSION['username'] = $myusername;
			header("location:backend/index.php");
			exit();
		}
    }

?>

<?php endif;?>


<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="stylefile.css"/>
</head>
<body>
	<h2>Login</h2>
	<div class="container">
	    <form action="backend/index.php" method="POST">
			<input type="text" id="Username" name="myusername" placeholder="Write your username">
		    <input type="text" id="Userpass" name="mypassword" placeholder="Enter your password">
		    <input class="button" type="submit" name="submit" value="Search">
		</form>
	</div>
</body>
<footer>
	<?php include("footer.php"); ?>
</footer>
</html>
