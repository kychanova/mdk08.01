<?php  
session_start();
include 'connect.php';


$address = $_POST['address'];
$prod_id = $_POST['prod_id'];
$user_id = $_SESSION['user'];
$amount = $_POST['amount'];

$query = "SELECT amount FROM products WHERE product_id = $prod_id";
$res = mysqli_query($conn, $query);
if ($row = mysqli_fetch_array($res)){
    $amount_from_bd = $row['amount'];
    if ($amount_from_bd >= $amount && $amount>0){
        $query = "INSERT INTO orders(`address`, `client_id`) VALUES (?, '$user_id')";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 's', $address);
        if(mysqli_stmt_execute($stmt)){
            $order_id = mysqli_stmt_insert_id($stmt);
            $query = "INSERT INTO order_prods(`order_id`, `prod_id`, `amount`) VALUES ($order_id, $prod_id, $amount)";
            $res = mysqli_query($conn, $query);
            if ($res){
                $query = "UPDATE products SET amount = (amount - $amount) WHERE product_id=$prod_id";
                $res = mysqli_query($conn, $query);
                if ($res){

                    header("Location:../order_success.php");
                }
                
            }
            
        }
    }
    else{
        $_SESSION['order_message'] = "Недостаточно товара на складе";
        header("Location:../checkout.php");
    }
}





?>