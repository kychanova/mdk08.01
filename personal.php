<?php
include "components/header.php";

$query = "SELECT * FROM clients ORDER BY client_id DESC LIMIT 1";
$res = mysqli_query($conn, $query);

if ($row = mysqli_fetch_array($res)){
    echo  "<h1>$row[first_name]</h1>
           <h1>$row[last_name]</h1>";

}
