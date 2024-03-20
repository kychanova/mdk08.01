<?php
session_start();
if (!isset($_SESSION['user'])){
    header("Location: auth.php");
}
include "components/header.php";

$query = "SELECT * FROM orders WHERE client_id='$_SESSION[user]'";
$res = mysqli_query($conn, $query);
?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb-text">
            <h1>Заказы</h1>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<div class="orders-section">
    <?php
    while($order = mysqli_fetch_array($res)){
        $query = "SELECT product_id, image_path FROM order_prods AS op JOIN products AS p ON p.product_id = op.prod_id WHERE order_id=$order[order_id]";
        $res_prods = mysqli_query($conn, $query);
        $order_item = <<<_ITEM
                    <div class="order-item" id=$order[order_id]>
                            <h3> Заказ №$order[order_id]</h3>
                            <p>Дата:$order[order_date] </p>
                            <p>Адрес:$order[address] </p>
                            <div class='order-row'>
                

        _ITEM; 
        echo $order_item;
        while ($row=mysqli_fetch_array($res_prods)){
            echo "<a href='single-product.php?prod_id=$row[product_id]' class='account-order__a'><img class='account-order__img' src='assets/img/products/$row[image_path]' alt='$row[image_path]'></a>";
        }
        echo '</div></div>';
    }

    ?>
    
</div>