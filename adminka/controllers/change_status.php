<?php 
require_once "../../controllers/connect.php";

if (isset($_GET['cat_id'])){
    $cat_id = $_GET['cat_id'];
    $query = "SELECT view_status FROM categories WHERE category_id=$cat_id";
    $res = mysqli_query($conn, $query);
    if (!$res) die("Беддааа"); 

    $data = mysqli_fetch_array($res);
    $status = $data['view_status'];

    $status = 1 - $status;

    $query = "UPDATE categories SET view_status=$status WHERE category_id= $cat_id";
    $res = mysqli_query($conn, $query);
    if ($res){
        header("Location: ../categories.php");
    }
}