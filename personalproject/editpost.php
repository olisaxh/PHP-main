<?php
include '../database.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM posts WHERE id=:id");
$stmt->execute([':id'=>$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = $_POST['content'];
    $stmt = $conn->prepare("UPDATE posts SET title=:title, content=:content WHERE id=:id");
    $stmt->execute([':title'=>$title, ':content'=>$content, ':id'=>$id]);
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Post</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
<h2>Edit Post</h2>
<form method="POST">
    <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
    <textarea name="content" required><?php echo htmlspecialchars($post['content']); ?></textarea>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<a href="dashboard.php" class="btn btn-success">Back</a>
</div>
</body>
</html>