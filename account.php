<?php 
// Set session variables
session_start();

if(!isset($_SESSION['login'])) {
    $url = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    $url = rtrim($url, '/\\');
    $url .= "/"."index.php";

    // Redirect the user
    header("Location: $url");
    exit();
}
//Set the page
$page_title = "Logged in";
include('includes/header.html');
echo "<h1>Logged in</h1>";
echo "<p>Welcome to your account! {$_SESSION['username']}!</p>";

echo "<p><a href='index.php'>Log out</a></p>";

include('includes/footer.html');

?>