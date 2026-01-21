<?php
include_once('config.php');

if(isset($_POST['Uptade']))
    {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET username=:username, name=:name, email=:email WHERE id=:id";
 $prep= $conn->prepare($sql);
  $prep->bindParam('id', $id);
   $prep->bindParam('username', $username);
    $prep->bindParam('name', $name);
     $prep->bindParam('email', $email);

    $prep->execute();

     header("location:dashboard.php");

}
