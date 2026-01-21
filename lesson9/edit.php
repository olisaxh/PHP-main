<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <style>
        form>inpur{
            margin-bottom:10px;
            font-size:2px;
            padding: 5px;
        }

        button{
            border:1px solid black;
            padding:10px 40px;
            font-size:20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>"><br>
        <input type="text" name="username" value="<?php echo $data['username']; ?>"><br>
        <input type="text" name="name" value="<?php echo $data['name']; ?>"><br>
        <input type="email" name="email" value="<?php echo $data['email']; ?>"><br>
        
        <br><br>

        <button type="submit" name="name">Update</button>
    </form>

    <a href="dashboard.php">Dashboard</a>
</body>
</html>