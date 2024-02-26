<?php
include "components/header.php";


?>
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>Авторизация</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="auth-section container">
    <form action='controllers/auth.php' method='POST' class="auth-form">
        <input type='email' name='email' id='email' placeholder='Email' required>
        <input type='password' name='password' id='password' placeholder='Пароль' required>
        <p>Вы ещё не с нами? <a href="register.php">Зарегистрируйтесь</a></p>
        <input type='submit' name='btn' id='btn' >
    </form>
</div>
