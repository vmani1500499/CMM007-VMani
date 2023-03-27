<?php
/**
 * Created by PhpStorm.
 * User: Stewart
 * Date: 20/02/2021
 * Time: 12:47
 */

   if( $_POST["name"] || $_POST["age"] ) {
       if (preg_match("/[^A-Za-z'-]/",$_POST['name'] )) {
           die ("invalid name and name should be alpha");
       }
       echo "Superhero ". $_POST['name']. "<br />";
       echo "Has ". $_POST['power']. " powers.";

       exit();
   }
?>
<html>
<body>

<form action = "<?php $_PHP_SELF ?>" method = "POST">
    Name: <input type = "text" name = "name" />
    Power: <input type = "text" name = "power" />
    <input type = "submit" />
</form>

</body>
</html>