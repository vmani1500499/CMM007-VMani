<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "storyspace";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user input
$username = $_POST["uname"];
$password
?>