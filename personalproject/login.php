<?php
require "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid credentials!";
    }
}
?>

<h2>Login</h2>

<form method="POST">
    <input type="text" name="username" required><br><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>

<a href="register.php">Create account</a>
