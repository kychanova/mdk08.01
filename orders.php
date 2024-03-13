<?php
session_start();
if (!isset( $_SESSION['user'])){
    header("Location: auth.php");
}
include 'components/header.php';

$query = "SELECT order_id, order_date, `address` FROM orders WHERE client_id='$_SESSION[user]';";
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

    <div class="order-section">
    <?php
        while($row = mysqli_fetch_array($res)){
            $order_item_html = <<<_ITEM
                                <div class="order-item" id=$row[order_id]>
                                    <h3>Заказ №$row[order_id]</h3>
                                    <p>Дата заказа:$row[order_date] </p>
                                    <p>Адрес доставки:$row[address] </p>
                                    <div class='order_row'>
            _ITEM;
            echo $order_item_html;
            $query = "SELECT * FROM order_prods AS op JOIN products AS p ON op.prod_id = p.product_id WHERE order_id = $row[order_id]";
            $res_prods = mysqli_query($conn, $query);

            while($prod = mysqli_fetch_array($res_prods)){
                // echo "<pre>";
                // print_r($prod);
                // echo "</pre>";
				echo "<a href='single-product.php?prod_id=$prod[product_id]' class='account-order__a'><img class='account-order__img' src='assets/img/products/$prod[image_path]'></a>";
            }
            echo "</div></div>";
        }
    ?>

        
    </div>