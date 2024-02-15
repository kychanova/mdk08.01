<content>
	<article>
		<h2>Пользователи</h2>
		<div class="reg_form">
			<h3>Добавить пользователя</h3>
			<form method="POST" enctype="multipart/form-data" action="controllers/registration.php">
				<input type="text" name="surname" placeholder="Фамилия">
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
				<th>Отчество</th>
				<th>Логин</th>
				<th>Почта</th>
				<th>Роль</th>
				<th>Статус</th>
				<th colspan="3">Действия</th>
			</tr>
<?php
	$str_out_users="SELECT * FROM `users`";
	$run_out_users=mysqli_query($connect,$str_out_users);
	while ($out_users=mysqli_fetch_array($run_out_users)) {
		$role_user=$out_users['role'];
		$status_user=$out_users['status'];


		switch ($role_user) {
			case '0':
				$role_user="Пользователь";
				break;
			case '1':
				$role_user="Модератор";
				break;
			case '2':
				$role_user="Администратор";
				break;
			default:
				break;
		}

		switch ($status_user) {
			case '0':
				$status_user="Отключен";
				$name_but="Включить";
				break;
			case '1':
				$status_user="Активный";
				$name_but="Выключить";
				break;
			default:
				break;
		}
		echo "
			<tr>
				<td>$out_users[id]</td>
				<td>$out_users[surname]</td>
				<td>$out_users[name]</td>
				<td>$out_users[l_name]</td>
				<td>$out_users[login]</td>
				<td>$out_users[mail]</td>
				<td>$role_user</td>
				<td>$status_user</td>
				<td>
					<a href='controllers/edit_status.php?edit_status_user=$out_users[id]' class=off>
						$name_but
					</a>	
				</td>
				<td>
					<a href='' class=change>
						Изменить
					</a>	
				</td>
				<td>
					<a href='controllers/del.php?del_user=$out_users[id]' class=delete>
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