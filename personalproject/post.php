<?php
include 'database.php';

$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("SELECT posts.*, users.username FROM posts LEFT JOIN users ON posts.user_id = users.id WHERE posts.id=:id");
$stmt->execute([':id'=>$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($post['title']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<?php if($post): ?>
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
    <p>by <?php echo htmlspecialchars($post['username'] ?? 'Unknown'); ?> on <?php echo $post['created_at']; ?></p>
    <div>
        <?php echo nl2br(htmlspecialchars($post['content'])); ?>
    </div>
<?php else: ?>
    <p>Post not found.</p>
<?php endif; ?>

<a href="index.php" class="btn btn-primary">Back to Blog</a>
</div>

</body>
</html>