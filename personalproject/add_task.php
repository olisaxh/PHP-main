<?php
require "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {

    $title = $_POST['title'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO tasks (user_id, title) VALUES (?, ?)");
    $stmt->execute([$user_id, $title]);
}

header("Location: index.php");
exit();
