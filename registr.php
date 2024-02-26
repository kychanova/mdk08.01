<?php
include "components/header.php";

?>


<!-- breadcrumb-section -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb-text">
            <h1>Регистрация</h1>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<div class='reg-section'>
    <form method="POST" action="controllers/registr.php" class="reg-form">
        <label for="first-name">Имя:</label>
        <input type="text" name="first_name" id="first-name">
        <label for="last-name">Фамилия:</label>
        <input type="text" name="last_name" id="last-name">
        
        <label for="email">Почта:</label>
        <input type="email" name="email" id="email">
        <small class="error-message">
            <?php
                $mes = $_SESSION['errors']['email'] ?? '';
                echo $mes;
            ?>
        </small>

        <label for="pass">Пароль:</label>
        <input type="password" name="pass" id="pass">
        <label for="repass">Повтор пароля:</label>
        <input type="password" name="repass" id="repass">
        <small class="error-message">
            <?php
                $mes = $_SESSION['errors']['pass'] ?? '';
                echo $mes;
            ?>
        </small>

        <input type="submit" value="Зарегестрироваться" class="reg-btn" style="border-radius:5px;">
        <?php
            unset($_SESSION['errors']);
        ?>
    </form>
</div>