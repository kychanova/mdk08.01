<?php
$host = '127.0.0.2';
$db = 'frutkha';
$user = 'root';
$pass = '';

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) die("Fatal error");
