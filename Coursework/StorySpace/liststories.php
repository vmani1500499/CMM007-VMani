<?php
// Create database connection
$conn = new mysqli("localhost","root","","storyspace");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute SQL query to fetch stories from database
$sql = "SELECT * FROM stories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output each story
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>By " . $row["author"] . "</p>";
        echo "<p>Published on " . $row["publication_date"] . "</p>";
        echo "<p>" . $row["story"] . "</p>";
        echo "<br><br>";
    }
} else {
    echo "No stories found.";
}

// Close database connection
$conn->close();
?>
<html>
<div class="footer-container">
    <span class>2023 Robert Gordon University. This project does contain content of external sites that are free media
      content and is used for assingment purpose only. All external linking are marked.</span>
    <!-- Navigation to contact us page is placed at the footer element -->
    <a class="Home" href="home1.html">Home</a>
</div>
</body>
</html>