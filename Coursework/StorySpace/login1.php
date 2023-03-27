<?php
$mysqli = new mysqli("localhost","root","","storyspace");
// Check if the user is logged in
if (isset($_SESSION['user']) && isset($_SESSION['password'])) {


// Get the user's username and password from the session
    $username = $_SESSION['user'];
    $password = $_SESSION['password'];
    echo "Username". $username;
    echo "Password". $password;

// Check if the user's username and password match the database
    $query = "SELECT * FROM login WHERE Username = '$username' AND password = '$password'";
    $result = mysqli_query($mysqli, $query);

// Check if there is a result
    if (mysqli_num_rows($result) == 1) {

// The user is logged in
    } else {

// The user is not logged in
    }

// End the session
    session_destroy();

// Redirect the user to the homepage
    header('Location: article.html');

} else {
    echo "User not logged in";
// The user is not logged in
// Redirect the user to the login page
    header('Location: checkdbconnec1.php');

}

?>
