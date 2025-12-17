<?php

$host="localhost";
$user="root";
$pass="";

try{

    $conn=new PDO("mysql:host=$host",$user,$pass);
    $sql="Create database testdb2";
    $conn->exec($sql);
   
    echo "Database created successfully";
    echo "Connected";

}catch(exception $e){
    echo $e . "not connected";
}

?>