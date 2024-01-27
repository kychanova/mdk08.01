<!-- Пример для того, чтобы вспомнить. Начинаем с переменных и условий -->
<!-- 
    сначала вспомним php. Начнём с простого примера. Ест форма ввода количества

    Создать массив с данными о человеке и вывести всё с заголовками по центру.


    Чтобы что-то вывести используем echo;
    php работает как калькулятор: операции
    соединение строк
    переменные

 -->




<?php
    $color = 'magenta';

    if (isset($_POST['count_input']) &&
        isset($_POST['name_input'])){
        $message = ctype_alpha($_POST['name_input']) 
                    ? 'У вас очень красивое имя.' 
                    : 'Цифры в имени. Подозрительно....';
        $count = $_POST['count_input'];
        if ($count <= 0){
            $message .= "Количество должно быть больше нуля";
            $color = 'red';
        }
        else{
            echo $count[1];
            
            $message .= "Заказано $count штук";
        }
    }
    else{
        $message = "";
    }



    $person = array('name' => 'Arina', 'last_name' => 'Kychanova', 'age' => 23);
    $persons = array($person, 
                     array('name' => 'Katya', 'last_name' => 'Ivanova', 'age' => 27))

?>
<!DOCTYPE html>
<html lang="кг">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Создаём простую форму ввода -->
    <form method="POST">
        <label for='name_input'>Введите имя</label><br>
        <input type="name" id = 'name_input' name="name_input"><br>
        <label for='count_input'>Введите количество</label><br>
        <input type="number" id = 'count_input' name="count_input"><br>
        <input type="submit">
    </form>

    <p style="color:<?= $color ?>; font-size:20px;"><?= $message ?></p>

    <?php
        foreach($persons as $p){
            echo "<h1>name : $p[name]</h1>";
            echo "<h1>last_name : $p[last_name]</h1>";
            echo "<h1>age : $p[age]</h1>";
        }
    ?>

    <!-- А могу так же как было в другом примере? -->
    <?php
        foreach($persons as $p){
            foreach($p as $key => $value){
                echo "<p>$key: $value</p>";
            }
            // На какой строке это должно быть размещено? Почему здесь?
            echo "<hr>";
        }
    ?>


    <!-- Теперь хочу вывести в виде списка. Какой используем тег для этого? -->
    <ul>
    <?php
        foreach($persons as $p){
            echo "<li>$p[name]</li>";
            
        }
    ?>
    </ul>

    <!--  -->
    <?php 
        $i = 1;
        echo '<p>$i++ : '.$i++."</p>";
        echo '<p>$i : '."$i</p>";
        echo '<p>$i-- : '.$i--."</p>";
        echo '<p>$i : '."$i</p>";


        echo '<p>++$i : '.++$i."</p>";
        echo '<p>$i : '."$i</p>";
        echo '<p>--$i : '.--$i."</p>";
        echo '<p>$i : '."$i</p>";

    ?>

</body>
</html>