<?php

$username=$_POST["name"];
$password=$_POST["password"];
$OK="no";
//echo $OK;


if( $username=="username" && $password=="password" ) {
    //echo "here";
    setcookie("access_level_cookie", "standard");

}
else{setcookie("access_level_cookie", "not_set");}

header('Location: loggedIn.php');
?>