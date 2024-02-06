<?php
require "../../controllers/connect.php";

$query = '';
$path = '';
if ((isset($_GET['prod_id'])) && (isset($_GET['date_start']))){
    $query = "DELETE FROM prices WHERE product_id='$_GET[prod_id]' and date_start='$_GET[date_start]'";
    $path = "prices.php";
}

elseif (isset($_GET['category_id'])){
    $query = "DELETE FROM categories WHERE category_id=$_GET[category_id]";
    $path = "categories.php";
}

if ($query && $path){
    $res = mysqli_query($conn, $query);
    if (!$res){
        die("Беддааа");
    }
    header("Location:../$path");
}

