<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <!-- Посмотреть инструменты разработчика, нет php -->
    <?php  
        echo "string";
    ?>

    <!-- Есть краткая форма, но она не всегда работает по умолчанию
    И если мы меняем сервер, то всё может упасть, лучше не рисковать -->
    <?
    ?>

    <!-- Посмотреть инструменты разработчика, нет php -->
    <h1>
        <?php  
            echo "string";
        ?>
    </h1>

    <?php  
         echo "<h2>string</h2>";
    ?>

    <!-- Может быть в аттрибутах -->
    <img src="<?= "assets\img\logo.png"?>">

    <!-- Вычисления -->

    <p> Ещё мы умеем считать </p>
    <p?> 2+2 = <?= 2+2 ?> </p>



    <!-- Код выполняется один раз сверху вниз -->

    <!-- Теперь к переменным 
        Имена переменных должны начинаться с алфавитного символа или с подчеркивания

        Имена переменных могут содержать только символы: a–z, A–Z, 0–9, и знак подчеркивания

        Имена переменных не должны включать в себя пробелы
    -->
    <?php
        $variable = 4;
    ?>

    <p>variable = <?= $variable?></p>

    <?php
        $var1 = $variable + 3;
        echo $var1;
        echo gettype($var1);
    ?>

    <!-- Есть ряд стандартных типов данных во всех языках программирования.
    Для разных типов данных определены свои функции и операторы.
    В php динамическая типизация, то есть тип переменной определяется самим языком, исходя из значения
    переменной. -->

    <?php
        // int принимает значения в диапазоне [-2 147 483 648; 2 147 483 647]
        $int = 442;
        $float = 3.5;
        $float_1 = 1e-3;
        $float_2 = .5;
        $bool = true;
        $string = "this is string";
        $string_1 = "В строках доступны любые символы: 56*;+=, кроме кавычек - они закончат строку";
        $string_2 = "$int+$float";
        // Экранирование \[спец.символ]
        $string_3 = "Book \"Crime and Punishment\"";
        $string_4 = "Book 'Crime and Punishment'";

        // Значение null означает отстутствие значения, пустоту
        $null = null;
    ?>

    Задачи
    1) Выведите на экран список вида:
      1. Товар 1
      2. Товар 2
      3. Товар 3
      4. Товар 4
      .............
      И так далее до
      100. Товар 100
    2) Есть список согласия на рассылку, элементы типа bool. Каждый элемент представляет собой
    ответ пользователя на предложение о рассылке. Если элемент равен true, то согласен,
    false - не согласен. Сколько человек согласны на рассылку. 
    

</body>
</html>