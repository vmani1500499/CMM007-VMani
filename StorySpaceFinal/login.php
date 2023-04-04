<?php
// start the session
session_start();

// check if the user is already logged in
if(isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

// check if the form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // connect to the database
    $servername = "localhost";
    $db_username = "your_username";
    $db_password = "your_password";
    $db_name = "your_database_name";

    $conn = mysqli_connect($servername, $db_username, $db_password, $db_name);

    // check if the connection is successful
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // create a query to check if the user exists in the database
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    // check if the query returns any rows
    if(mysqli_num_rows($result) == 1) {
        // the user is authenticated, set the session variables and redirect to the dashboard
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        // the user is not authenticated, show an error message
        $error_msg = "Invalid username or password.";
    }
}
?>

<!-- add the HTML code for the login form here -->

