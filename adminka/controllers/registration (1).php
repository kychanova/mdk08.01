<?php
include '../../controllers/db.php';
$surname=$_POST['surname'];
$name=$_POST['name'];
$l_name=$_POST['l_name'];
$mail=$_POST['mail'];
$login=$_POST['login'];
$pass=$_POST['pass'];
$repass=$_POST['repass'];
$gender=$_POST['gender'];
$avatar_name=$_FILES['avatar']['name'];
$avatar_tmp=$_FILES['avatar']['tmp_name'];
$avatar_size=$_FILES['avatar']['size'];
$avatar_type=$_FILES['avatar']['type'];
$full_path="../../assets/img/users/$avatar_name";
$add_user=$_POST['add_user'];


$str_add_user="INSERT INTO `users`(`surname`, `name`, `l_name`, `gender`, `login`, `password`, `mail`,`avatar`) VALUES ('$surname','$name','$l_name','$gender','$login','$pass','$mail','$avatar_name')";

if ($surname AND $name AND $l_name AND $mail AND $login AND $pass AND $repass AND $gender) {
	if ($pass==$repass) {
		$run_add_user=mysqli_query($connect,$str_add_user);
	}
	else
	{
		
	}
}
else
{

}

header("Location:../users.php");







?>