<?php 
session_start();
include "connect.php";


print_r($_POST);
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$email = $_POST['email'] ?? '';
$pass = $_POST['pass'] ?? '';
$repass = $_POST['repass'] ?? '';

if ($pass != $repass){
    $_SESSION['error_message'] = "Пароли не совпадают";
    header("Location:../registr.php");
}

$pass = password_hash($pass, PASSWORD_DEFAULT );

// $russia = "INSERT INTO clients(first_name, last_name) VALUES(?,?)";
// $stmt = mysqli_prepare($conn, $russia);
// mysqli_stmt_bind_param($stmt, "ss", $first_name, $last_name);

// if (mysqli_stmt_execute($stmt)){
//     $query = "INSERT INTO credentials(client_id, email, `password`, role_id) VALUES(?,?,?,?)";
//     $stmt1 = mysqli_prepare($conn, $query);
//     $client_id = mysqli_stmt_insert_id($stmt);
//     $role_id = 2;
//     mysqli_stmt_bind_param($stmt1, "issi",$client_id, $email, $pass,$role_id);
//     mysqli_stmt_execute($stmt1);
// }




