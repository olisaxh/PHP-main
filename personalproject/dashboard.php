<?php
include '../database.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$stmt = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1>Admin Dashboard</h1>
<p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> | <a href="logout.php">Logout</a></p>

<a href="add_post.php" class="btn btn-success">Add Post</a>

<table>
<tr>
<th>Title</th>
<th>Date</th>
<th>Actions</th>
</tr>

<?php foreach($posts as $post): ?>
<tr>
<td><?php echo htmlspecialchars($post['title']); ?></td>
<td><?php echo $post['created_at']; ?></td>
<td>
<a class="btn btn-primary" href="edit_post.php?id=<?php echo $post['id']; ?>">Edit</a>
<a class="btn btn-danger" href="delete_post.php?id=<?php echo $post['id']; ?>">Delete</a>
</td>
</tr>
<?php endforeach; ?>

</table>
</div>
</body>
</html>