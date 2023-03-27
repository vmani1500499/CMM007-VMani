<?php
$mysqli = new mysqli("localhost","root","","storyspace");
$user= "veera";
$password= "mani";
echo "Username " . $user;

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// Perform query
if ($result1 = mysqli_query($mysqli , "SELECT * FROM login")) {
    echo "\nReturned rows are: " . mysqli_num_rows($result1);
    // Free result set
    mysqli_free_result($result1);
}
?>

<?php


// Perform query
if ($result2 = mysqli_query($mysqli , "SELECT * FROM login WHERE Username = '".$user."'"))
  {
    echo "\nThe user name ".$user . mysqli_num_rows($result2)." exists";
    // Free result set
    mysqli_free_result($result2);
   }

$query = "SELECT * FROM login WHERE Username = '$user' AND password = '$password'";
$result3 = mysqli_query($mysqli, $query);
echo "\nR3 The user name ".$user . mysqli_num_rows($result3)." exists";
// Check if there is a result
if (mysqli_num_rows($result3) > 0) {
  echo "\n User name password correct";

  while($row = mysqli_fetch_assoc($result3)) {
      echo "\n"."id: " . $row["StoryTeller_Yes"] . " - Name: " . $row["Username"] . " " . $row["password"] ;
  }
// The user is logged in
} else {
    echo "\n User name password not correct";
// The user is not logged in
}

mysqli_close($mysqli);
?>