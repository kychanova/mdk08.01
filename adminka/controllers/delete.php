<?php 
require_once "../../controllers/connect.php";
print_r($_GET);
if (isset($_GET['prod_id']) && isset($_GET['date'])){
    if ($_GET['prod_id'] && isset($_GET['date'])){
        $query = "DELETE FROM prices WHERE product_id='$_GET[prod_id]' AND date_start='$_GET[date]'";
        $res = mysqli_query($conn, $query);
    }
}

header("Location:../prices.php");