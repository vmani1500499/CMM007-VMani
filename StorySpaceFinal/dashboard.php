<?php
// start the session
session_start();

// check if the user is logged in
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// get the username from the session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">


