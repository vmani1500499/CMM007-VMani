<?php

// Create database connection
$conn = new mysqli("localhost","root","","storyspace");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
// Handle POST request
// Get form data
    $author = $_POST['author'];
    $pub_date = $_POST['pub_date'];
    $title = $_POST['title'];
    $story = $_POST['story'];

// Prepare and execute SQL query to insert data into database
    $sql = "INSERT INTO stories (author, publication_date, title, story) VALUES ('$author', '$pub_date', '$title', '$story')";
    if ($conn->query($sql) === TRUE) {
        echo "Story added successfully!";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

// Close database connection
    $conn->close();

}
else {
    // Handle missing form fields here
    echo "Please fill in all required fields.";
}
?>

<html>
<head>
    <title>Add Story</title>
</head>
<body>
<h1>Add Story</h1>
<form action="TakeInput.php" method="post">
    <label for="author">Author:</label>
    <input type="text" id="author" name="author"><br><br>

    <label for="pub_date">Publication Date:</label>
    <input type="date" id="pub_date" name="pub_date"><br><br>

    <label for="title">Title:</label>
    <input type="text" id="title" name="title"><br><br>

    <label for="story">Story:</label><br>
    <textarea id="story" name="story" rows="10" cols="50"></textarea><br><br>

    <input type="submit" value="Submit">

</form>
<div class="footer-container">
    <span class>2023 Robert Gordon University. This project does contain content of external sites that are free media
      content and is used for assingment purpose only. All external linking are marked.</span>
    <!-- Navigation to contact us page is placed at the footer element -->
    <a class="Home" href="home1.html">Home</a>
</div>
</body>
</html>

