<?php
include '../database.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM posts WHERE id=:id");
$stmt->execute([':id'=>$id]);

header("Location: dashboard.php");
exit();
?>