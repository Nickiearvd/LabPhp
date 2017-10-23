<?php include "headernav.php";?>
<?php include "config.php";?>

<?php

	@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);



	if (isset($_POST['username'], $_POST['userpass'])) {

		$uname = mysqli_real_escape_string($db, $_POST['username']);
		$upass = sha1($_POST['userpass']);

		$query = ("SELECT * FROM Userinfo WHERE Username = '{$uname}' "."AND Userpass = '{$upass}'");

		$stmt = $db->prepare($query);
	    $stmt->execute();
	   	$stmt->store_result(); 

	   	$totalcount = $stmt->num_rows();

	}
?>


<!doctype html>
<html>
	<head>
		<title>BookABook</title>
		<link rel="stylesheet" type="text/css" href="stylefile.css"/>
		<meta charset="utf-8" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
		
		<main>
			<?php

			if(isset($totalcount)){
				if($totalcount == 0){
					echo "Wrong password!";
				} else{
					echo "Welcome here is the link";
					 echo "<script>location.href='fileUpload.php';</script>";
				}
			}

			?>

			<h2>Login</h2>
			<form method="POST" action="">
	            <input type="text" name="username" placeholder="Username">
	            <input type="password" name="userpass" placeholder="Password">
	            <input type="submit" value="Go">
	        </form>

		</main>
	</body>
</html>