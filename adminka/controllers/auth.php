<?php 
session_start();
include "../../controllers/connect.php";

$емаил = $_POST['email'] ?? '';
$pass = $_POST['pass_auth'] ?? '';
$role_id = 1;

$query = "SELECT client_id FROM credentials WHERE email=? AND `password`=? AND role_id=?";
$stmt = mysqli_prepare($conn, $query);
if(!$stmt) die("Упали на prepare");

mysqli_stmt_bind_param($stmt, "ssi", $емаил,$pass,$role_id);

mysqli_stmt_execute($stmt);
echo "bind_resilt<br>";
print_r(mysqli_stmt_bind_result($stmt, $client_id));
echo "<br>fetch<br>";

mysqli_stmt_store_result($stmt);

$num_rows = mysqli_stmt_num_rows($stmt);
echo "<br>Количество строк: $num_rows<br>";


if ($num_rows > 0){
    // echo 'good';
    $_SESSION['isAdmin'] = true;
    header("Location: ../dashboard.php");
}
else{
    // echo 'problem';
    $_SESSION['error_message'] = 'Неверные логин или пароль';
    header("Location:../");    
}


// echo "<br>client_id = ".$client_id;


// $num_rows = mysqli_num_rows($res);

// if ($num_rows>0){
//     $_SESSION['isAdmin'] = true;
//     header("Location: ../dashboard.php");
// }
// else{
//     $_SESSION['error_message'] = 'Неверные логин или пароль';
//     header("Location:../");
// }


?>

