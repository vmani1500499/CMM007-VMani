<?php
session_start();
$username=$_POST["name"];
$password=$_POST["password"];
$OK="no";
//echo $OK;


if( $username=="username" || $password=="password" ) {
    //echo "here";
   // setcookie("access_level_cookie", "standard");
    $_SESSION['access'] = "standard";
   // echo $_SESSION['access'] ;
}
header('Location: loggedIn.php');
?>