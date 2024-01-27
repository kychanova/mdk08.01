<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Введите число:</p>
    <form action='lecture_2.php' method='GET'>
        <input type='number' name='num'/>
    </form>

    <?php 
    $message = '';
    if (isset($_GET['num'])){
        if ($_GET['num'] > 0){
            $message = "Число положительное";
        }
        elseif ($_GET['num'] == 0){
            $message = "Число равно нулю";
        }
        else{
            $message = "Число отрицательное";
        }
    }

    ?>
    <p><?= $message ?></p>
</body>
</html>