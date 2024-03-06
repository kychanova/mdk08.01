<?php  

session_start();
include "connect.php";

$prod_id = $_POST['product_id'];
$amount = $_POST['amount'];
$address = $_POST['address'];

$query = "SELECT amount from products where product_id=$prod_id";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);
if ($row['amount'] >= $amount && $amount>0){
    $query = "INSERT INTO orders(`address`, client_id) VALUES ('$address', $_SESSION[user])";
    $res = mysqli_query($conn, $query);
    if ($res){
        $order_id = mysqli_insert_id($conn);
        $query = "INSERT INTO order_prods(order_id, prod_id, amount) VALUE ($order_id, $prod_id, $amount)";
        $res = mysqli_query($conn, $query);
        if ($res){
            $query = "UPDATE products SET amount = (amount - $amount) WHERE product_id=$prod_id";
            $res = mysqli_query($conn, $query);
            if ($res){
                header("Location:../order_done.php");
            }
        }
    }
}
else{
    $_SESSION['order_error'] = "Недостаточно товара на складе";
    header("Location: ../checkout.php");
}




