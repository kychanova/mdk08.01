<?php
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

<a href="controllers/exit.php">Выход</a>