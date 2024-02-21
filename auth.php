<?php
include "components/header.php";

?>

<div class="breadcrumb-section">
		<div class="container">
			<div class="breadcrumb-text">
				<h1>Авторизация</h1>
			</div>
		</div>
	</div>

<div class="reg-section">
    <form action="controllers/auth.php" method="post" class="reg-form">
        <small class="error-message">
            <?php
                $error = $_SESSION['error_message'] ?? '';
                echo $error;
                unset($_SESSION['error_message']);
            ?>
        </small>
        <label for="email">Введите почту</label>
        <input type="email" name="email" id="email">
        <label for="pass">Введите пароль</label>
        <input type="password" name="pass" id="pass">
        <input type="submit" value="Войти" name='btn'>
        <p> Нет аккаунта? <a href = 'registr.php'>зарегестрировться</a>
    </form>
</div>
