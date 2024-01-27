<?php
session_start();
session_unset();
$_SESSION['message']="Вы вышли!";
header("Location:../");

?>