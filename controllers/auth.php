<?php
session_start();
include "connect.php";

$email = $_POST['email'] ?? '';
$pass = $_POST['pass'] ?? '';

$query = "SELECT client_id, email, `password` FROM credentials WHERE `email`=? AND role_id=2";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
if ($user = mysqli_fetch_array($res)){
    if (password_verify($pass,$user['password'])){
        $_SESSION['user'] = $user['client_id'];
        header("Location:../account.php");
    }
    else{
        $_SESSION['error_message'] = "Неверные логин или пароль";
        header("Location:../auth.php");
    }
}
else{
    $_SESSION['error_message'] = "Неверные логин или пароль";
    header("Location:../auth.php");
}

