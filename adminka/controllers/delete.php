<?php
require "../../controllers/connect.php";

if ((isset($_GET['prod_id'])) && (isset($_GET['date_start']))){
    $query = "DELETE FROM prices WHERE product_id='$_GET[prod_id]' and date_start='$_GET[date_start]'";
    $res = mysqli_query($conn, $query);
    if (!$res){
        die("Беддааа");
    }
}

header("Location:../prices.php");