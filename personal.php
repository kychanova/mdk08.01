<?php
session_start();


if (!isset( $_SESSION['user'])){
    header("Location: auth.php");
}
else{
include("components/header.php");
$query = "SELECT * FROM clients WHERE client_id = '$_SESSION[user]'";
$res = mysqli_query($conn, $query);
$client_data = mysqli_fetch_array($res);
}
?>
<div class="breadcrumb-section">
		<div class="container">
			<div class="breadcrumb-text">
				<h1>Личный кабинет</h1>
			</div>
		</div>
</div>

<div class="user-info">
    <p><strong>Имя:</strong><?= htmlspecialchars($client_data['first_name']) ?></p>
    <p><strong>Фамилия:</strong><?= htmlspecialchars($client_data['last_name'] ?? '') ?></p>
    <p><strong>Адресс:</strong><?= htmlspecialchars($client_data['address'] ?? '') ?></p>
</div>

<a href="controllers/exit.php">Выход</a>
