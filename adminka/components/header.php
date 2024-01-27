<?php
// session_start();
// if (!$_SESSION['user']) {
// 		header("Location:/adminka");
// 	}
include './../controllers/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Панель администратора</title>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="name_admin">
				Панель администратора
			</div>
			<div class="welcome">
				МВЕУ
			</div>
			<div>
				<a href="/" target="_blank">Перейти на сайт</a> Привет, Админ <a href="controllers/exit.php">Выход</a>
			</div>
		</header>