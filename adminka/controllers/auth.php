<?php
session_start();
include "../../controllers/connect.php";

$email = $_POST['email'];
$pass = $_POST['pass_auth'];

$query = "SELECT * FROM credentials WHERE `email`='$email' AND `password`='$pass'";
$res = mysqli_query($conn, $query);

print_r($res);

$num_rows = mysqli_num_rows($res);

if ($num_rows>0){
    $_SESSION['isAdmin'] = true;
    header("Location:../dashboard.php");
}
else{
    $_SESSION['error_message'] = "Неверные логин или пароль";
    header("Location:../index.php");
}


