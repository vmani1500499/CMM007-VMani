<?php
$mysqli = new mysqli("localhost","root","","storyspace");

// Get the user's username and password from the session
$username = $_SESSION['username'];
$password = $_SESSION['password'];

// Check if the user's username and password match the database
$query = "SELECT username, password FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($database, $query);

// Check if there is a result
if (mysqli_num_rows($result) == 1) {

// The user is logged in
} else {

// The user is not logged in
}

// End the session
session_destroy();

// Redirect the user to the homepage
header('Location: index.php');

} else {

// The user is not logged in
// Redirect the user to the login page
header('Location: login.php');

}

?>