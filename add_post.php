<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];

    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

    if ($conn->query($sql) === TRUE){
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Post</title>
</head>
<body>
    <h1>Add New Post</h1>
    <form method="post" action="add_post.php">
        <label>Title:</label><br>
        <input type="text" name="title"><br>
        <label>Content:</label><br>
        <textarea name="content"></textarea><br>
        <input type="submit" value="Add Post">
    </form>
    <a href="index.php">Back to Blog</a>
</body>
</html>
