<?php 
	session_start();
	if (isset($_SESSION['isAdmin'])){
		if ($_SESSION['isAdmin']){
			header("Location:dashboard.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Админпанель</title>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
	<div class="auth">
		<?php 
			// echo "<pre>";
			// print_r($_SESSION);
			// unset($_SESSION['error_message']);
			// echo "</pre>";
		?>
		<h2>Панель<br>администратора</h2>

		<form action="controllers/auth.php" method="POST">
			<p style="color:red; font-size: 1.5em;"><?php
			 $mes = $_SESSION['error_message'] ?? '';
			 echo $mes;
			 unset($_SESSION['error_message']);
			 ?></p>
			<input type="email" name="email" placeholder="Логин"><br>
			<input type="password" name="pass_auth" placeholder="Пароль"><br>
			
			<input type="submit" name="auth" value="Войти">
		</form>
	</div>
</body>
</html>