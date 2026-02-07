<?php
    $user="root";
    $pass="";
    $server="localhost";
    $dbname="mms";


    try{

        //jena tu u lidhe me databaz me PDO connect
        $conn= new PDO("mysql:host=$server;dbname=$dbname",$user,$pass);
        echo("conected");


    }catch(PDOExecption $e){
        echo "error" . $e->getMessage();

    }


?>