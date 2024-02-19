<?php
	$ai = "aria-invalid='true'";
?>

<content>
	<nav>
		<a href="dashboard.php">Главная панель</a>
		<a href="users.php">Пользователи</a>
		<a href="categories.php">Категории товаров</a>
		<a href="products.php">Товары</a>
		<a href="orders.php">Заказы</a>
	</nav>
	<article>
		<h2>Пользователи</h2>
		<div class="reg_form">
			<h3>Добавить пользователя</h3>
			<form method="POST" enctype="multipart/form-data" action="controllers/registration.php">
				<input type="text" name="surname" placeholder="Фамилия" aria-invalid="true">
				<input type="text" name="name" placeholder="Имя">
				<input type="text" name="l_name" placeholder="Отчество">
				<input type="text" name="mail" placeholder="Электронная почта">
				<input type="text" name="login" placeholder="Логин">
				<input type="password" name="pass" placeholder="Пароль">
				<input type="password" name="repass" placeholder="Повторите пароль">
				<input type="radio" name="gender" value="m">М<br>
				<input type="radio" name="gender" value="f">Ж<br>
				Аватар:<br>
				<input type="file" name="avatar"><br>
				<textarea placeholder="О себе..." name="about"></textarea><br>
				<input type="submit" name="add_user" value="Добавить пользователя">
			</form>
		</div>
<form method="POST">
	<input type="text" name="s_string" placeholder="Введите для поиска...">
	<input type="radio" name="gender" value="m">М
	<input type="radio" name="gender" value="f">Ж
	<select name="role">
		<option>Администратор</option>
		<option>Модератор</option>
		<option>Пользователь</option>
	</select>
	<input type="submit" name="search" value="Поиск">
</form>
		<table id='users'>
			<tr>
				<th>№ п/п</th>
				<th>Фамилия</th>
				<th>Имя</th>
				<th>Почта</th>
				<th>Роль</th>
				<th colspan="3">Действия</th>
			</tr>
<?php
	$str_out_users="SELECT * FROM `clients` JOIN `credentials` ON clients.client_id=credentials.client_id JOIN roles ON roles.role_id=credentials.role_id";
	$run_out_users=mysqli_query($conn,$str_out_users);
	while ($out_users=mysqli_fetch_array($run_out_users)) {
		$role_user=$out_users['role_id'];
		echo "
			<tr>
				<td>$out_users[client_id]</td>
				<td>$out_users[last_name]</td>
				<td>$out_users[first_name]</td>
				<td>$out_users[email]</td>
				<td>$out_users[role_name]</td>
				<td>
					<a href='' class=off>
						Скрыть
					</a>	
				</td>
				<td>
					<a href='' class=change>
						Изменить
					</a>	
				</td>
				<td>
					<a href='' class=delete>
						Удалить
					</a>	
				</td>
			</tr>
		";
	}
?>			
		</table>
		<div class="pagination">
			1 2 3
		</div>
	</article>

</content>