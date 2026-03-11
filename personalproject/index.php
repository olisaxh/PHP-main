<?php
include 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h1>My Blog</h1>

<?php
$stmt = $conn->query("SELECT posts.*, users.username FROM posts LEFT JOIN users ON posts.user_id = users.id ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<div class='card'>";
    echo "<h2><a href='post.php?id=".$post['id']."'>".htmlspecialchars($post['title'])."</a></h2>";
    echo "<p>by ".htmlspecialchars($post['username'] ?? 'Unknown')." on ".$post['created_at']."</p>";
    echo "<p>".substr(strip_tags($post['content']), 0, 200)."...</p>";
    echo "<a href='post.php?id=".$post['id']."' class='btn btn-primary'>Read More</a>";
    echo "</div>";
}
?>

</div>

</body>
</html>