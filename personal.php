<?php
session_start();
if (!isset($_SESSION['user'])){
    header("Location:auth.php");
}

include "components/header.php";

$query = "SELECT * FROM clients AS c JOIN credentials AS cr ON c.client_id=cr.client_id WHERE c.client_id='$_SESSION[user]'";
$res = mysqli_query($conn, $query);
$user = mysqli_fetch_array($res);


$query_orders = "SELECT o.order_id, image_path FROM order_prods AS op JOIN products AS p ON op.prod_id=p.product_id JOIN orders AS o ON op.order_id = o.order_id WHERE client_id = '$_SESSION[user]' LIMIT 5;";
$res_orders = mysqli_query($conn, $query_orders);

$query_order_count = "SELECT count(*) AS 'order_count' FROM orders WHERE client_id='$_SESSION[user]'";
$res_order_count = mysqli_query($conn, $query_order_count);
$num_orders = mysqli_fetch_array($res_order_count)['order_count'];
// $num_orders = $num_orders;


?>

<div class="breadcrumb-section">
		<div class="container">
			<div class="breadcrumb-text">
				<h1>Личный кабинет</h1>
			</div>
		</div>
	</div>


<div class="account-section">
	<div class="account-line">
		<div class="account-item">
			<div class="account-item__top">
				<img class="account-item__img" src="assets/img/avatars/default.png" alt="Изображение пользователя">
				<h3><?= $user['first_name']?></h3>
			</div>
			<div class="account-item__bottom">
				<p>Телефон <span>89126753472</span></p>
				<p>Email <span><?= $user['email']?></span></p>
				<a href="controllers/exit.php" class="exit-link">Выход</a>
			</div>
		</div>

		<div class="account-item account-item-main">
			<div class="account-item__top">
				<div class="account-item__div-icon">
					<img class="account-item__icon" src="assets\img\icons8-delivery-50.png" alt="Д">
				</div>
				
				<h3>Доставки</h3>
			</div>
			<div class="account-item__bottom">
				<p>Ближайшая <span>не ожидается</span></p>
			</div>
		</div>

		<div class="account-item">
			<div class="account-item__top">
				<div class="account-item__div-icon-skid">
					<p class="account-item__text"><strong>10%</strong><p>
				</div>
				<h3>Скидка покупателя</h3>
			</div>
			<div class="account-item__bottom">
				<p>Сумма выкупа <span class="vikup_size">67.000 Руб</span></p>
			</div>
		</div>
	</div>

	<div class="account-line">
		<div class="account-item">
			<h3>Заказы</h3>
			<div class="order-row">
				<?php
				while ($row=mysqli_fetch_array($res_orders)){
					echo "<a href='orders.php#$row[order_id]' class='account-order__a'><img class='account-order__img' src='assets/img/products/$row[image_path]' alt='$row[image_path]'></a>";
				}
				?>
				<a href='orders.php' class='account-order__a'>
					<div class="remain-orders-count">
						+<?= $num_orders-5 ?>
					</div>
				</a>
			</div>
			
		</div>
		<div class="account-item">
			<h3>Избранное</h3>
		</div>
	</div>
</div>

