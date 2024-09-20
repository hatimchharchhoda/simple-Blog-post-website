<?php
include 'database.php';

$sql = "SELECT id, title, content, created_at FROM posts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Blog</title>
</head>
<body>
    <h1>Simple Blog</h1>
    <a href="add_post.php">Add New Post</a>
    <hr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["title"] . "</h2>";
            echo "<p>" . $row["content"] . "</p>";
            echo "<p><a href='edit_post.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete_post.php?id=" . $row["id"] . "'>Delete</a></p>";
            echo "<hr>";
        }
    } else {
        echo "No posts available.";
    }
    ?>
</body>
</html>
