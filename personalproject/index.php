<?php include 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h1>Student Manager</h1>

<a href="add.php"><button>Shto Student</button></a>

<br><br>

<table>
<tr>
    <th>ID</th>
    <th>Emri</th>
    <th>Email</th>
    <th>Mosha</th>
    <th>Veprime</th>
</tr>

<?php
$stmt = $conn->query("SELECT * FROM students ORDER BY id DESC");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($students as $student) {
    echo "<tr>";
    echo "<td>".$student['id']."</td>";
    echo "<td>".$student['name']."</td>";
    echo "<td>".$student['email']."</td>";
    echo "<td>".$student['age']."</td>";
    echo "<td>
            <a class='edit' href='edit.php?id=".$student['id']."'>Edit</a>
            <a class='delete' href='delete.php?id=".$student['id']."'>Delete</a>
          </td>";
    echo "</tr>";
}
?>

</table>
</div>

</body>
</html>