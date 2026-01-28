<?php
session_start();
require 'config.php';

if(isset($_POST['submit'])){
    $username = $_POST['username']
    $password = $_POST['password']
}

if(empty($username) || empty($password)){
    echo "fill all the fields"
    header ("refresh:2 url-login.php")
}else{
    $sql ="SELECT * FROM users WHERE username=:username";
       $insertSql = $conn->prepare($sql);
        $insertSql = bindParam->prepare('username' , $username);
         $insertSql = execute();
}


?>