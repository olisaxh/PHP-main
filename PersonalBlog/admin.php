<?php
include "config.php";

if(!isset($_SESSION['admin'])){
header("Location:login.php");
}

?>

<h1>Admin Panel</h1>

<a href="add_post.php">Add Post</a> |
<a href="logout.php">Logout</a>

<hr>

<?php

$sql="SELECT * FROM posts";
$result=$conn->query($sql);

while($row=$result->fetch_assoc()){

echo "<h3>".$row['title']."</h3>";

echo "<a href='edit_post.php?id=".$row['id']."'>Edit</a> | ";

echo "<a href='delete_post.php?id=".$row['id']."'>Delete</a>";

echo "<hr>";

}

?>