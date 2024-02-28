<?php
session_start();


if (!isset( $_SESSION['user'])){
    header("Location: auth.php");
}
else{

	include("components/header.php");
	$query = "SELECT first_name, email FROM clients AS cl JOIN credentials AS cr ON cl.client_id = cr.client_id WHERE cl.client_id = '$_SESSION[user]'";
	$res = mysqli_query($conn, $query);
	$client_data = mysqli_fetch_array($res);

	print_r($client_data);
}
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
				<h4><?php echo htmlspecialchars($client_data['first_name']);  ?></h4>
			</div>
			<div class="account-item__bottom">
				<p class="account-item__text">Email <span class="account-item__client-data" ><?= htmlspecialchars($client_data['email']) ?></span></p>
				<a href="controllers/exit.php">Выход</a>
			</div>
		</div>
		<div class="account-item item-2">
			<div class="account-item__top">
				<div class="account-item__icon">
					<svg fill="#000000" width="30px" height="30px" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"><path d="M15.48 12c-.13.004-.255.058-.347.152l-2.638 2.63-1.625-1.62c-.455-.474-1.19.258-.715.712l1.983 1.978c.197.197.517.197.715 0l2.995-2.987c.33-.32.087-.865-.367-.865zM.5 16h3c.277 0 .5.223.5.5s-.223.5-.5.5h-3c-.277 0-.5-.223-.5-.5s.223-.5.5-.5zm0-4h3c.277 0 .5.223.5.5s-.223.5-.5.5h-3c-.277 0-.5-.223-.5-.5s.223-.5.5-.5zm0-4h3c.277 0 .5.223.5.5s-.223.5-.5.5h-3C.223 9 0 8.777 0 8.5S.223 8 .5 8zm24 11c-1.375 0-2.5 1.125-2.5 2.5s1.125 2.5 2.5 2.5 2.5-1.125 2.5-2.5-1.125-2.5-2.5-2.5zm0 1c.834 0 1.5.666 1.5 1.5s-.666 1.5-1.5 1.5-1.5-.666-1.5-1.5.666-1.5 1.5-1.5zm-13-1C10.125 19 9 20.125 9 21.5s1.125 2.5 2.5 2.5 2.5-1.125 2.5-2.5-1.125-2.5-2.5-2.5zm0 1c.834 0 1.5.666 1.5 1.5s-.666 1.5-1.5 1.5-1.5-.666-1.5-1.5.666-1.5 1.5-1.5zm-5-14C5.678 6 5 6.678 5 7.5v11c0 .822.678 1.5 1.5 1.5h2c.676.01.676-1.01 0-1h-2c-.286 0-.5-.214-.5-.5v-11c0-.286.214-.5.5-.5h13c.286 0 .5.214.5.5V19h-5.5c-.66 0-.648 1.01 0 1h7c.66 0 .654-1 0-1H21v-9h4.227L29 15.896V18.5c0 .286-.214.5-.5.5h-1c-.654 0-.654 1 0 1h1c.822 0 1.5-.678 1.5-1.5v-2.75c0-.095-.027-.19-.078-.27l-4-6.25c-.092-.143-.25-.23-.422-.23H21V7.5c0-.822-.678-1.5-1.5-1.5z"/></svg>
				</div>
				<h4>Доставки</h4>
			</div>
			<div class="account-item__bottom">
				<p class="account-item__text">Ближайшая <span class="account-item__client-data" >не ожидается</span></p>
			</div>
		</div>
		<div class="account-item">
			<div class="account-item__top">
				<div class="account-item__icon account-item__icon-dark">
					11%
				</div>
				<h4>Скидка покупателя</h4>
			</div>
			<div class="account-item__bottom">
				<p class="account-item__text">Сумма выкупа <span class="account-item__client-data" >100 000руб</span></p>
			</div>
		</div>
	</div>

	<div class="account-line">
		<div class="account-item account-item-2">
			<h4>Заказы</h4>
		</div>
		<div class="account-item account-item-2">
			<h4>Избранное</h4>
		</div>
	</div>
</div>

