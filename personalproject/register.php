<?php
include 'database.php';
session_start();
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    try {
        $stmt->execute([':username'=>$username, ':password'=>$hash]);
        header("Location: login.php");
        exit();
    } catch(PDOException $e) {
        $error = "Username already taken.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Register</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
<h2>Admin Register</h2>
<?php if($error) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" class="btn btn-success">Register</button>
</form>
<a href="login.php">Login</a>
</div>
</body>
</html>