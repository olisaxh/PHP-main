<?php
require_once "config.php";

try {
    $conn = new PDO(
        "mysql:host=localhost" ,
        ";dbname=task_db",
         ""
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
