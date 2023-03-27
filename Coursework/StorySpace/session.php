<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
    $user = $_SESSION['user'];
    $password = $_SESSION['password'];

    // Authenticate user
    if ($user == 'myusername' && $password == 'mypassword') {
        // User is authenticated, do something
        echo 'Welcome, ' . $user;
    } else {
        // User is not authenticated, redirect to login page
        header('Location: login.php');
        exit;
    }
} else {
    // User is not logged in, redirect to login page
    header('Location: login.php');
    exit;
}
?>

