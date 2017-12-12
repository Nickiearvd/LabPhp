<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:backend/index.php");
}
?>
<?php
include("../config.php");
$title = "Add new book";
include("headerlogin.php");
?>

<?php
if (isset($_POST['newbooktitle'])) {
    // This is the postback so add the book to the database
    # Get data from form
    $newbooktitle = trim($_POST['newbooktitle']);
    $newbookauthor = trim($_POST['newbookauthor']);

    $newbooktitle = htmlentities($newbooktitle);
    $newbookauthor = htmlentities($newbookauthor);


    if (!$newbooktitle || !$newbookauthor) {
        printf("You must specify both a title and an author");
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    $newbooktitle = addslashes($newbooktitle);
    $newbookauthor = addslashes($newbookauthor);


    # Open the database using the "librarian" account
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    // Prepare an insert statement and execute it
    $stmt = $db->prepare("insert into books values (null, ?, ?, false)");
    $stmt->bind_param('ss', $newbooktitle, $newbookauthor);
    $stmt->execute();
    printf("<br>Book Added!");
    printf("<br><a href=index.php>Return to home page </a>");
    exit;
}

// Not a postback, so present the book entry form
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../stylefile.css"/>
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
    </head>
    <body>
        <h2>Add a new book</h2>
        <hr>
        <p>You must enter both a title and an author. </p>
        <form action="addbook.php" method="POST">
            <table bgcolor="#bdc0ff" cellpadding="6">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td><INPUT type="text" name="newbooktitle"></td>
                    </tr>
                    <tr>
                        <td>Author:</td>
                        <td><INPUT type="text" name="newbookauthor"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><INPUT type="submit" name="submit" value="Add Book"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>

<?php include("footer.php"); ?>