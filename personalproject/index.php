<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>My Tasks</h2>

<a href="logout.php">Logout</a>

<form action="add_task.php" method="POST">
    <input type="text" name="title" placeholder="New Task" required>
    <button type="submit">Add Task</button>
</form>

<?php foreach($tasks as $task): ?>
    <div class="task">
        <span><?= htmlspecialchars($task['title']) ?></span>
        <a href="delete_task.php?id=<?= $task['id'] ?>">Delete</a>
    </div>
<?php endforeach; ?>

</div>
</body>
</html>
