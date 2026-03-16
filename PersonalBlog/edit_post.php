<?php
include "config.php";

$id=$_GET['id'];

$sql="SELECT * FROM posts WHERE id=$id";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
?>

<h2>Edit Post</h2>

<form action="update_post.php" method="POST">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<input type="text" name="title" value="<?php echo $row['title']; ?>">

<br><br>

<textarea name="content"><?php echo $row['content']; ?></textarea>

<br><br>

<button type="submit">Update</button>

</form>