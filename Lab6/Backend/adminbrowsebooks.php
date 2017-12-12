<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:backend/index.php");
}
?>

<!doctype html>
<html>
	<head>
		<title>BookABook</title>
		<meta name="description" content="This is my page" />
		<link rel="stylesheet" type="text/css" href="../stylefile.css"/>
		<meta charset="utf-8" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
		<?php include "../config.php";?>
	</head>
	<body>
		<header>
			<?php include "headerlogin.php";?>
		</header>
		<main>
			<h2>Admin Browse books</h2>
			<div class="containersearch">
				<form action="adminbrowsebooks.php" method="POST">
					<input type="text" id="title" name="searchtitle" placeholder="Search after a title">
				    <input type="text" id="author" name="searchauthor" placeholder="Search after the author">

				    <input class="button" type="submit" name="submit" value="Search">
		  		</form>
			</div>
            <?php
            	$searchtitle = "";
				$searchauthor = "";
	            #check if the GET/POST has been used, meaning if the Submit button has been pressed.
	            if (isset($_POST) && !empty($_POST)) {
	            # POST data from form

	            	# Protection form field. 
	            	$searchtitle= htmlentities($searchtitle);
					$searchtitle = mysqli_real_escape_string($db, $searchtitle);

					$searchauthor= htmlentities($searchauthor);
					$searchauthor = mysqli_real_escape_string($db, $searchauthor);
	                
	                #first trim the search, so no white spaces appear prior to the text entered
	                $searchtitle = trim($_POST['searchtitle']);
	                $searchauthor = trim($_POST['searchauthor']);
	            }
	                
	                #after that it is wise to use addslashes, it adds slashes if there's an aPOSTrophe or quotation mark
	                $searchtitle = addslashes($searchtitle);
	                $searchauhtor = addslashes($searchauthor);
	                
	                
	                 

	                # Open the database
					@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

					if ($db->connect_error) {
					    echo "could not connect: " . $db->connect_error;
					    printf("<br><a href=index.php>Return to home page </a>");
					    exit();
					}

					# Build the query. Users are allowed to search on title, author, or both

					$query = " select * from books";
					if ($searchtitle && !$searchauthor) { // Title search only
					    $query = $query . " where title like '%" . $searchtitle . "%'";
					}
					if (!$searchtitle && $searchauthor) { // Author search only
					    $query = $query . " where author like '%" . $searchauthor . "%'";
					}
					if ($searchtitle && $searchauthor) { // Title and Author search
					    $query = $query . " where title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'"; // unfinished
					}
					//echo "Running the query: $query <br/>"; # For debugging

					
					  # Here's the query using an associative array for the results
					  $result = $db->query($query);
					  echo "<p> $result->num_rows matching books found </p>";
					  /*echo "<table border=1>";
					  while($row = $result->fetch_assoc()) {
					  echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
					  }
					  echo "</table>";*/
					 

					# Here's the query using bound result parameters
					// echo "we are now using bound result parameters <br/>";
					$stmt = $db->prepare($query);
					$stmt->bind_result($bookid, $title, $author, $onloan);
					$stmt->execute();

					echo '<table bgcolor=white cellpadding="6">';
					echo '<tr><b><th>ID</th><th>Title</th> <th>Author</th> <th>Reserved ? </th> <th>Reserve</th> <th>Return</th><th>Delete</th></b> </tr>';
					while ($stmt->fetch()) {
						if($onloan == 0 )
							$onloan = "No";
						else $onloan = "Yes";

					    echo "<tr>";
					    echo "<td> $bookid </td><td> $title </td><td> $author </td><td> $onloan </td>";
					    echo '<td><a href="../reservebook.php?bookid=' . urlencode($bookid) . '"> Reserve </a></td>';
					    echo '<td><a href="../returnBook.php?bookid=' . urlencode($bookid) . '">Return</a></td>';
					    echo '<td><a href="deletebook.php?bookid=' . urlencode($bookid) . '"> Delete </a></td>';
					    echo "</tr>";
					}
					echo "</table>";
	                
	                #echo $id;

	               /* echo '<table cellpadding="10">';
                	echo '<tr><b><th>Title</th> <th>Author</th> <th>Reserve</th> </b> </tr>';
	                #now we check if we have the ID or not in our array. If the search was a hit, it will assign something to our DB, if not, then it will not work.
	                if (($id !== FALSE) || ($id2 !== FALSE)) {
	                	$book = $books[$id];
	                    if ($id2 !== FALSE){
	                    	$book = $books[$id2];
	                    }

	                    $title = $book['title'];
	                    $author = $book['author'];
	                    echo "<tr>";
	                    echo "<td> $title </td><td> $author </td>";
	                    echo '<td><a href="reserve.php?reservation=' .  urlencode($title) . '"> Reserve </a></td>';
	                    echo "</tr>";
	                }
	                echo "</table>";
	            } 
	            
	            
	            # in this else under, you basically show the book-list.
	            # above you checked in the POST method has been set, if it has display the results of the "search"
	            # if they have not been set, just display the list instead. In this case "book-list" is insufficient
	            # all you have to do is merge book-list.php with book-search.php and create one master page
	            # define the array at the start in PHP and manipulate it later on.
	            
	            else{                
	                echo '<table cellpadding="10">';
                	echo '<tr><b><th>Title</th> <th>Author</th> <th>Reserve</th> </b> </tr>';
	                foreach ($books as $book) {
	                    $title = $book['title'];
	                    $author = $book['author'];
	                    echo "<tr>";
	                    echo "<td> $title </td><td> $author </td>";
	                    echo '<td><a href="reserve.php?reservation=' . urlencode($title) . '"> Reserve </a></td>';
	                    echo "</tr>";
	                }
	                echo "</table>";*/

	           
            ?>

		</main>
		<footer>
			<?php include "footer.php";?>
		</footer>
	</body>
</html>



