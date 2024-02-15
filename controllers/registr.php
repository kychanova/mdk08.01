<?php
include "./connect.php";
if (isset($_POST['btn'])){
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);

    $query = "INSERT INTO clients(first_name, last_name) VALUES('$first_name','$last_name') ";
    $res = mysqli_query($conn, $query);
    if (!$res) die("беда");

    header("Location:../personal.php");
}