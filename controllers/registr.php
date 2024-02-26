<?php 
session_start();
include "connect.php";


$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$email = $_POST['email'] ?? '';
$pass = $_POST['pass'] ?? '';
$repass = $_POST['repass'] ?? '';



if (strlen($pass) <= 6){
    $_SESSION['errors']['pass'] = "Слишком слабый пароль.";  
}
else{
    if ($pass != $repass){
        $_SESSION['errors']['pass'] = "Пароли не совпадают";
        // header("Location:../registr.php");
    }
}

$query = "SELECT email FROM credentials WHERE email = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);

mysqli_stmt_store_result($stmt);
$num_rows = mysqli_stmt_num_rows($stmt);
if ($num_rows > 0){
    $_SESSION['errors']['email'] = "Пользователь с такой почтой уже существует.";
}

if (isset($_SESSION['errors'])){
    if ($_SESSION['errors']){
        header("Location: ../registr.php");
    }
}

$pass = password_hash($pass, PASSWORD_DEFAULT );

$russia = "INSERT INTO clients(first_name, last_name) VALUES(?,?)";
$stmt = mysqli_prepare($conn, $russia);
mysqli_stmt_bind_param($stmt, "ss", $first_name, $last_name);

if (mysqli_stmt_execute($stmt)){
    $query = "INSERT INTO credentials(client_id, email, `password`, role_id) VALUES(?,?,?,?)";
    $stmt1 = mysqli_prepare($conn, $query);
    $client_id = mysqli_stmt_insert_id($stmt);
    $role_id = 2;
    mysqli_stmt_bind_param($stmt1, "issi",$client_id, $email, $pass,$role_id);
    mysqli_stmt_execute($stmt1);
    header("Location:../auth.php");
}




