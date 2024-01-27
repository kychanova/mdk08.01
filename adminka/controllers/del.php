<?php
	include '../../controllers/db.php';
	$del_cat=$_GET['del_cat'];
	$del_user=$_GET['del_user'];
	$del_prod=$_GET['edit_prod'];


	if ($del_cat) {
		$del_id=$del_cat;
		$table='category';
		$file="categories.php";
	}
	elseif ($del_user) {
		$del_id=$del_user;
		$table='users';
		$file="users.php";
	}
	elseif ($del_prod) {
		$del_id=$del_prod;
		$table='products';
		$file="products.php";
	}
		
		$str_del_cat="DELETE FROM `$table` WHERE id=$del_id";
		$run_del=mysqli_query($connect,$str_del_cat);
		header("Location:../$file");
?>