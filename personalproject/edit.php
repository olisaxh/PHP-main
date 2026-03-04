<?php include 'database.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM students WHERE id=:id");
$stmt->execute([':id'=>$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="style.css">
<div class="container">
<h2>Edit Student</h2>

<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
    <input type="text" name="name" value="<?php echo $student['name']; ?>" required>
    <input type="email" name="email" value="<?php echo $student['email']; ?>" required>
    <input type="number" name="age" value="<?php echo $student['age']; ?>" required>
    <button type="submit">Update</button>
</form>
</div>