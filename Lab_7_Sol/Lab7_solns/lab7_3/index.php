<!DOCTYPE html>
<html>
<head>
    <title>selfreference</title>
</head>
<body>

<?php
if($_SERVER['REQUEST_METHOD'] === 'GET') {
?>
    <form action = "<?php $_PHP_SELF ?>" method = "POST">
        Name: <input type = "text" name = "name" />
        Age: <input type = "text" name = "age" />
        <input type = "submit" />
    </form>

<?php
}

elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Welcome ". $_POST['name']. "<br />";
    echo "You are ". $_POST['age']. " years old.";
    exit();
}
else {echo "how did we get here";}

?>
</body>
</html>