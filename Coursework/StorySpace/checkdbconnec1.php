<?php
$user = '';
$password = '';
$nameErr ='';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['uname'];
    $password = $_POST['pass'];
}

$mysqli = new mysqli("localhost","root","","storyspace");
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
    //session_destroy();
    header('Location: article1.html');
} else {
    echo "\n User name password not correct";

// The user is not logged in
}

mysqli_close($mysqli);
?>

HTML:
<html>
<body>
<div id='shw'><?php echo htmlspecialchars($user);?></div>
<fieldset id='fld'>
    <form method='post' name='f1' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'>
        <table>
            <tr>
                <td>
                    User Name:<input type='text' id='uname' name='uname' class='uname' placeholder='USERNAME' autocomplete='off' autofocus maxlength='25'><span class='error'>*</span>
                    Password:<input type='password' id='pass' class='pass' name='pass' placeholder='PASSWORD' autocomplete='off'>
                    <input type='submit' name='submit' id='loggin' value='LOGIN' class='login' onclick='val()'>
                </td>
            </tr>
        </table>
    </form>
</fieldset>
<div class='errormsg' id='errmsg'><?php echo htmlspecialchars($nameErr);?></div>
</body>
</html>
