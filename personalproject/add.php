<?php include 'database.php'; ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Shto Student</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Emri" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="number" name="age" placeholder="Mosha" required>
    <button type="submit">Ruaj</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO students (name,email,age) VALUES (:name,:email,:age)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':age' => $_POST['age']
    ]);
    header("Location: index.php");
}
?>

</div>
</body>
</html>