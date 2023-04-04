<?php
if(isset($_POST['submit'])){

    //Image upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");

    if(in_array($imageFileType, $allowed_extensions)){
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){

            //Text upload
            $text_content = $_POST['text'];

            //Connect to database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "stories";
            $conn = new mysqli("localhost","root","","storyspace");

            //Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            //Insert data into database
            $sql = "INSERT INTO story (image_path, text_content) VALUES ('$target_file', '$text_content')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    }
    else{
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
}
?>

<form method="POST" action="" enctype="multipart/form-data">
    <input type="file" name="image">
    <textarea name="text"></textarea>
    <input type="submit" name="submit" value="Upload">
</form>
