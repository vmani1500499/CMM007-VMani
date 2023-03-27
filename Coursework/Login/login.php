<?php        //------------------------------------------------------------------------------>PHP VALIDATION
$mysqli = new mysqli("localhost","root","","storyspace");
$user="";
$pass="";
$nameErr="";
$passErr="";
//$pattern='/^[a-zA-Z0-9@_ ]*$/';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(empty($_POST['uname']))
    {
        $nameErr='Enter Your Name!';
    }
    else
    {
        $user = test_input($_POST['uname']);
        if(!preg_match('/^[a-zA-Z0-9@_]*$/',$user))
        {
            $nameErr=' Re-Enter Your Name! Format Inccorrect!( only alpha, numbers,@_ are allowed)';
        }
    }
    if(empty($_POST['pas']))
    {
        $passErr='Enter Your Password!';
    }
    else
    {
        $user = test_input($_POST['pas']);
        if(!preg_match('/^[a-zA-Z0-9@_]*$/',$pass))
        {
            $passErr='Invalid Format! Re-Enter Password!';
        }
    }
}



function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

HTML:
<html>
<body>
<div id='shw'><?php echo $user;?></div>
<fieldset id='fld'>
    <form method='post' name='f1' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'>
        <table>
            <tr>
                <td>
                    User Name:<input type='text' id='uname' name='uname' class='uname' placeholder='USERNAME' autocomplete='off' autofocus maxlength='25'><span class='error'>*</span>
                    Password:<input type='password' id='pass' class='pass' name='pas' placeholder='PASSWORD' autocomplete='off'>
                    <input type='submit' name='submit' id='loggin' value='LOGIN' class='login' onclick='val()'>
                </td>
            </tr>
        </table>
    </form>
</fieldset>
<div class='errormsg' id='errmsg'><?php echo $nameErr;?></div>
</div>
</body>
</html>