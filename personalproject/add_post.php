<?php
include 'database.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $title = trim($_POST['title']);
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO posts (title, content, user_id) VALUES (:title, :content, :user_id)");
    $stmt->execute([':title'=>$title, ':content'=>$content, ':user_id'=>$user_id]);
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Post</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
<h2>Add Post</h2>
<form method="POST">
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="content" placeholder="Content" required></textarea>
    <button type="submit" class="btn btn-success">Save</button>
</form>
<a href="dashboard.php" class="btn btn-primary">Back</a>
</div>
</body>
</html>