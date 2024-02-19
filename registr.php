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
        <label for="second-name">Фамилия:</label>
        <input type="text" name="second_name" id="second-name">
        <label for="email">Почта:</label>
        <input type="email" name="email" id="email">
        <label for="pass">Пароль:</label>
        <input type="password" name="pass" id="pass">
        <label for="repass">Повтор пароля:</label>
        <input type="password" name="repass" id="repass">
        <input type="submit" value="Зарегестрироваться" class="reg-btn" style="border-radius:5px;">
    </form>
</div>