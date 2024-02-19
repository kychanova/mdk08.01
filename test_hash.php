<?php

$pass1 = "brain";
$pass2 = "brian";

echo password_hash($pass1, PASSWORD_DEFAULT);
echo "<br>";
echo password_hash($pass2, PASSWORD_DEFAULT);

