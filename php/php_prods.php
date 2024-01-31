<?php
// error_reporting(0);

$host = 'localhost';
$db = 'frutkha';
$user = 'root';
$pass = '';


$conn = mysqli_connect($host, $user, $pass, $db);
print_r($conn);

if (!$conn){
    echo mysqli_connect_error();
    exit("О, трагедия!!!!");
}


$query = "SELECT * FROM products";
$res = mysqli_query($conn, $query);
if (!$res) die("chicken");
echo "<br>";

print_r($res);

$num_rows = mysqli_num_rows($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            width:90%;
        }
        html{
            font-size: 20px;
        }
        .container{
            text-align: center;
            border:1px solid black;
            margin:10px;
            width:15%;
        }
    </style>
</head>
<body>
    <?php
        for($i=0; $i<$num_rows; $i++){
            $prod = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $out = <<<_PROD
            <div class='container'>
                    <img src='../assets/img/products/$prod[image_path]' alt='$prod[product_name]'>
                    <p>$prod[product_name]</p>
            </div>

            _PROD;
            echo $out;
        }
    ?>
</body>
</html>



