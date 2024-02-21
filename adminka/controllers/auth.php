<?php
session_start();
include "../../controllers/connect.php";

$email = $_POST['email'];
$pass = $_POST['pass_auth'];

$query = "SELECT * FROM credentials WHERE `email`=? AND `password`=? AND role_id=1";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
mysqli_stmt_execute($stmt);

mysqli_stmt_store_result($stmt);

$num_rows = mysqli_stmt_num_rows($stmt);

if ($num_rows>0){
    $_SESSION['isAdmin'] = true;
    header("Location:../dashboard.php");
}
else{
    $_SESSION['error_message'] = "Неверные логин или пароль";
    header("Location:../index.php");
}


