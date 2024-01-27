<?php
$host = 'localhost';
$db = 'frutkha';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Fatal error");
