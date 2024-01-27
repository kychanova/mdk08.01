<?php
include '../../controllers/db.php';

$edit_status_prod=$_GET['edit_status_prod'];
$edit_status_user=$_GET['edit_status_user'];

if ($edit_status_prod) {
	$table="products";
	$id=$edit_status_prod;
	$file='products.php';
}
elseif ($edit_status_user) {
	$table="users";
	$id=$edit_status_user;
	$file='users.php';
}

$str_out="SELECT * FROM `$table` WHERE `id`=$id;";
$run_out=mysqli_query($connect,$str_out);
$out=mysqli_fetch_array($run_out);

if ($out['status']==0) {
	$status=1;
}
elseif ($out['status']==1) {
	$status=0;
}

$str_upd="UPDATE `$table` SET `status` = '$status' WHERE `id` = $id;";
$run_upd=mysqli_query($connect,$str_upd);

header("Location:../$file")
?>