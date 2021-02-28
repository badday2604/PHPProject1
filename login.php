<?php # Script 12.3 - login.php
// This page processes the login form submission.
// Upon successful login, the user is redirected.
// Two included files are necessary.
// Send NOTHING to the Web browser prior to the setcookie() lines!

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// For processing the login:

	// Need the database connection:
	require('mysqli_connect.php');
    
    $page_title = "Home"; 
	include("includes/header.html");
	//......................code
    // Process login
	$errors = [];
	$u = $_POST['username'];
	$p = $_POST['password'];

    // Validate username
    if(empty($u)) {
        $errors[] = "You forgot to enter username";
    } else {
        $u = mysqli_real_escape_string($dbc, trim($u));
    }
    // Validate password
    if(empty($p)) {
        $errors[] = "You forgot to enter password";
    } else {
        $p = mysqli_real_escape_string($dbc, trim($p));
    }

	// Register new contact in the database...
    if(empty($errors)) {
        // Make the query:
        $qry_str = "SELECT username, password FROM account WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($dbc, $qry_str);
        
        mysqli_stmt_bind_param($stmt, "ss", $u, $p);
        // Run the query.
        mysqli_stmt_execute($stmt);
        //$r = @mysqli_query($dbc, $qry_str);
        
		if(mysqli_affected_rows($dbc) == 1) {
            // fetch the record
            $row = mysqli_stmt_store_result($stmt);
			
			// Set session variables
			session_start();
			$_SESSION["login"] = true;
			$_SESSION["username"] = $u;
			echo "Session variables are set.";

			$url = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
			$url = rtrim($url, '/\\');
			$url .= "/"."account.php";

			// Redirect the user
			header("Location: $url");

        } else {
			// Debugging message:
            //echo mysqli_error($dbc).'<br/> Query: '.$qry_str;
            echo "<p class='error'>System error!! Username and password do not match</p>";
			echo "<br/><br/><a href='index.php'>Return</a>";
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
		echo "<br/><br/><a href='index.php'>Return</a>";
    }
	 // End of if (empty($errors)) IF.    
    
	mysqli_close($dbc); // Close the database connection.

} // End of the main submit conditional.
include("includes/footer.html");
?>