<?php
include "config.php";

if(isset($_POST['login'])){

$username=$_POST['username'];
$password=$_POST['password'];

if($username=="admin" && $password=="1234"){

$_SESSION['admin']=true;
header("Location:admin.php");

}else{
echo "Wrong login";
}

}
?>

<form method="POST">

<h2>Admin Login</h2>

<input type="text" name="username" placeholder="Username">

<br><br>

<input type="password" name="password" placeholder="Password">

<br><br>

<button name="login">Login</button>

</form>