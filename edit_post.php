<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET["id"];
    $sql = "SELECT title, content FROM posts WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form method="post" action="edit_post.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Title:</label><br>
        <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
        <label>Content:</label><br>
        <textarea name="content"><?php echo $row['content']; ?></textarea><br>
        <input type="submit" value="Update Post">
    </form>
    <a href="index.php">Back to Blog</a>
</body>
</html>
