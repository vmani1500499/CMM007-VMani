<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Welcome to my website</h1>
</header>
<nav>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Login</a></li>
    </ul>
</nav>
<main>
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
</main>
<footer>
    <p>&copy; VM2023 - All rights reserved.</p>
</footer>
</body>
</html>
