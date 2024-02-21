<?php
include "components/header.php";

?>

<div class="breadcrumb-section">
		<div class="container">
			<div class="breadcrumb-text">
				<h1>Регистрация</h1>
			</div>
		</div>
	</div>

<div class="reg-section">
    <form action="controllers/registr.php" method="post" class="reg-form">
        <p class="error-message">
            <?php
             $error = $_SESSION['errors']['first-name'] ?? '';
             echo $error;
             ?>
        </p>
        <label for="first-name">Введите имя</label>
        <input type="text" name="first-name" id="first-name">
        <label for="second-name">Введите фамилию</label>
        <input type="text" name="second-name" id="second-name">
        <small class="error-message">
            <?php
                $error = $_SESSION['errors']['email'] ?? '';
                unset($_SESSION['errors']['email']);
                echo $error;
            ?>
        </small>
        <label for="email">Введите почту</label>
        <input type="email" name="email" id="email">
        <small class="error-message">
        <?php
             $error = $_SESSION['errors']['pass'] ?? '';
             echo $error;
             ?>
        </small>
        <label for="pass">Введите пароль</label>
        <input type="password" name="pass" id="pass">
        <label for="repass">Повтор пароля</label>
        <input type="password" name="repass" id="repass">
        <small class="error-message">
        <?php
             $error = $_SESSION['errors']['agreement'] ?? '';
             echo $error;
             ?>
        </small>
        <div class="galochka">
            <input type="checkbox" name="agreement" id="agreement">
            <label for="agreement">Я согласен на обратку данных</label>
        </div>
        <input type="submit" value="Зарегестрироваться" name='btn'>
    </form>
</div>