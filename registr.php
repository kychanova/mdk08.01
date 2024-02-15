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

<div class="reg-section">
    <h2>Регистрация</h2>
    <form action="controllers/registr.php" method="POST">
        <label for="first-name-input">Имя: </label>
        <input type="text" name="first_name" id="first-name-input">
        <label for="last-name-input">Фамилия: </label>
        <input type="text" name="last_name" id="last-name-input" >

        <label for="email">Почта: </label>
        <input type="email" name="email" id="email" >
        <label for="pass">Пароль: </label>
        <input type="password" name="pass" id="pass">
        <label for="pass-repeat">Повторите пароль: </label>
        <input type="password" name="pass-repeat" id="pass-repeat" >
        <div class="allowance">
            <input type="checkbox" name="aggrement" id="aggrement">
            <label for="aggrement">Я согласен на обработку персональных данных</label>
        </div>

        <input type="submit" name="btn">
        


    </form>
    <script>
        // <script>alert("Dead vibe");
        // alert("Не плачьте, уже ниего не восстановить");
    </script>
</div>