<?php
include 'database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $conn->prepare($sql);

    try {
        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);
        header("Location: login.php");
    } catch(PDOException $e) {
        echo "Username already taken.";
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Register</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>
<a href="login.php">Already have account? Login</a>
</div>