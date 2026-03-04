<?php
include 'database.php';

$sql = "UPDATE students SET name=:name, email=:email, age=:age WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':name'=>$_POST['name'],
    ':email'=>$_POST['email'],
    ':age'=>$_POST['age'],
    ':id'=>$_POST['id']
]);

header("Location: index.php");
?>