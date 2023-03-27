<?php
// define the database connection details
$user = '';
$password = '';
$StoryTeller_Yes='';
$StorySeeker_Yes='';
$nameErr ='';

// create a new connection to the database
$mysqli = new mysqli("localhost","root","","storyspace");

// check if the connection is successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// get the user input for the new username and password
$user = $_POST['uname'];
$password = $_POST['pass'];
$StoryTeller_Yes= $_POST['STY'];
$StorySeeker_Yes= $_POST['SSY'];

// Perform query
if ($result2 = mysqli_query($mysqli , "SELECT * FROM login WHERE Username = '".$user."'"))
{
    echo "\nThe user name ".$user . mysqli_num_rows($result2)." exists";
    // Free result set
    mysqli_free_result($result2);
}
else {
// encrypt the password using a secure algorithm like bcrypt
//$encrypted_password = password_hash($password, PASSWORD_DEFAULT);

// create a new user record in the database
    $sql = "INSERT INTO login (Username, password, StoryTeller_Yes, StorySeeker_Yes) VALUES ('$user', '$password', '$StoryTeller_Yes','$StorySeeker_Yes' )";
    $query = "SELECT * FROM login WHERE Username = '$user' AND password = '$password'";
    if ($mysqli->query($sql) === TRUE) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// close the database connection
$mysqli->close();
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
                    StoryTeller_Yes:<input type='text' id='STY' name='uname' class='uname' placeholder='StoryTeller_Yes' autocomplete='off' autofocus maxlength='25'><span class='error'>*</span>
                    StorySeeker_Yes:<input type='text' id='SSY' name='uname' class='uname' placeholder='StorySeeker_Yes' autocomplete='off' autofocus maxlength='25'><span class='error'>*</span>
                    <input type='submit' name='submit' id='loggin' value='LOGIN' class='login' onclick='val()'>
                </td>
            </tr>
        </table>
    </form>
</fieldset>
<div class='errormsg' id='errmsg'><?php echo htmlspecialchars($nameErr);?></div>
</body>
</html>
