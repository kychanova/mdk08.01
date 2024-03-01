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
					<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5.5 8C6.88071 8 8 6.88071 8 5.5C8 4.11929 6.88071 3 5.5 3C4.11929 3 3 4.11929 3 5.5C3 6.88071 4.11929 8 5.5 8ZM5.5 8V16M5.5 16C4.11929 16 3 17.1193 3 18.5C3 19.8807 4.11929 21 5.5 21C6.88071 21 8 19.8807 8 18.5C8 17.1193 6.88071 16 5.5 16ZM18.5 16V8.7C18.5 7.5799 18.5 7.01984 18.282 6.59202C18.0903 6.21569 17.7843 5.90973 17.408 5.71799C16.9802 5.5 16.4201 5.5 15.3 5.5H12M18.5 16C19.8807 16 21 17.1193 21 18.5C21 19.8807 19.8807 21 18.5 21C17.1193 21 16 19.8807 16 18.5C16 17.1193 17.1193 16 18.5 16ZM12 5.5L14.5 8M12 5.5L14.5 3" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
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

