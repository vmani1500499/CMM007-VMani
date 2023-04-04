<?php

if (isset($_COOKIE['Login_Status'])==1) {
    echo "The cookie". $_COOKIE['Username_C']."is set";
    echo "The cookie". $_COOKIE['Password_C']."is set";
    echo "The cookie". $_COOKIE['Login_Status']."is set";
    $user = $_COOKIE['Username_C'];
    $password= $_COOKIE['Password_C'];
    $nameErr ='';
    header("Location: article4.html");
} else {
    echo "The cookie named 'username' is not set.";
    $user = '';
    $password = '';
    $nameErr ='';
    header("Location: login.php");
}
?>

