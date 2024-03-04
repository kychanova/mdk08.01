<?php  
session_start();
include 'connect.php';


$address = $_POST['address'];
$prod_id = $_POST['prod_id'];
$user_id = $_SESSION['user'];

$query = "INSERT INTO orders(`address`, `client_id`) VALUES (?, '$user_id')";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 's', $address);
if(mysqli_stmt_execute($stmt)){
    $order_id = mysqli_stmt_insert_id($stmt);
    $query = "INSERT INTO order_prods(`order_id`, `prod_id`, `amount`) VALUES ($order_id, $prod_id, 1)";
    $res = mysqli_query($conn, $query);
    if ($res){
        header("Location:../order_success.php");
    }
    
}



?>