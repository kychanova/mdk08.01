<?php
require "../../controllers/connect.php";

if (isset($_GET['category_id'])){
    $query = "SELECT view_status FROM categories WHERE category_id=$_GET[category_id]";
    $res = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($res);
    print_r($data);
    $current_status = $data['view_status'];

    $status=1;
    if ($current_status == 1){
        $status = 0;
    }

    $status = 1 - $current_status;


    $query = "UPDATE categories SET view_status=$status WHERE category_id=$_GET[category_id]";
    $res = mysqli_query($conn, $query);
    if ($res) echo "Всё хорошо!";

    header("Location:../categories.php");
}
