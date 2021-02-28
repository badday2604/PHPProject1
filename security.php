<?php 
$page_title = "Comment";
include("includes/header.html");
require('mysqli_connect.php');

print_comments($dbc);

if(($_SERVER['REQUEST_METHOD'] == 'POST')) {
    $errors = [];
    if(empty($_POST['comment'])) {
        $errors[] = "Please enter comment"; 
    } else {
        $c = mysqli_real_escape_string($dbc, trim(strip_tags(filter_var($_POST['comment'], FILTER_SANITIZE_STRING))));
    }
    if(empty($errors)) {
        // Make the query:
        $q = "INSERT INTO message(comment) VALUES ('$c')";
        // Run the query.
        $res = @mysqli_query($dbc, $q);

        if($res) {
            echo "Thank you, new comment has been added";
        } else {
            echo "Error!!! Comment has not been added";
        }

        // Close the database connection
        mysqli_close($dbc);
        exit();
    } else {
       // Report the errors.
        echo 'Errors!! <p> The following errors occured: </p>';
        foreach($errors as $msg) {
        echo "-$msg<br/>\n";
        }
    }
}

function print_comments($dbc) {
    // Make the query:
    $qry_str = "SELECT * FROM message";
    // Run the query.
    $r = @mysqli_query($dbc, $qry_str);
    if($r) {
        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo "- ".$row["comment"]."<br/>";
        }
    }
}

mysqli_close($dbc); // Close the database connection.

?>

<form action="security.php" method="post">
    <p>Enter a comment: <input type="text" name="comment" size="60" maxlength="200"></p>
    <p><input type="submit" name="submit" value="Add Comment"></p>
</form>

<?php 
include("includes/footer.html")

?>