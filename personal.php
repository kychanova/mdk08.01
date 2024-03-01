<?php
session_start();
if (!isset($_SESSION['user'])){
    header("Location:auth.php");
}

include "components/header.php";


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
				<h3>Имя</h3>
			</div>
			<div class="account-item__bottom">
				<p>Телефон <span>89126753472</span></p>
				<p>Email <span>mail@mail.ru</span></p>
				<a href="controllers/exit.php" class="exit-link">Выход</a>
			</div>
		</div>

		<div class="account-item account-item-main">
			<div class="account-item__top">
				<div class="account-item__div-icon">
					<img class="account-item__icon" src="assets\img\icons8-delivery-50.png" alt="Изображение пользователя">
				</div>
				
				<h3>Доставки</h3>
			</div>
			<div class="account-item__bottom">
				<p>Ближайшая <span>не ожидается</span></p>
			</div>
		</div>

		<div class="account-item">
			<div class="account-item__top">
				<img class="account-item__img" src="assets/img/avatars/default.png" alt="Изображение пользователя">
				<h3>Имя</h3>
			</div>
			<div class="account-item__bottom">
				<p>Телефон <span>89126753472</span></p>
				<p>Email <span>mail@mail.ru</span></p>
				<a href="controllers/exit.php" class="exit-link">Выход</a>
			</div>
		</div>
	</div>
</div>

