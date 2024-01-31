<content>
	<nav>
		<a href="dashboard.php">Главная панель</a>
		<a href="users.php">Пользователи</a>
		<a href="categories.php">Категории товаров</a>
		<a href="products.php">Товары</a>
		<a href="orders.php">Заказы</a>
	</nav>
	<article>
		<h2>Товары</h2>
		<div class="reg_form">
			<h3>Добавить товар</h3>
			<form method="POST" enctype="multipart/form-data">
				<input type="text" name="name_prod" placeholder="Наименование товара" required>
				<input type="number" name="qty" placeholder="Количество" required>
				<input type="number" step=0.01 name="price" placeholder="Цена" required>
				<select name="category">
					<option value="-1">Выберите категорию</option>
				<?php
					$str_out_cat="SELECT * FROM `categories`";
					$run_out_cat=mysqli_query($conn,$str_out_cat);	

					while ($out_cat=mysqli_fetch_array($run_out_cat)) {
						echo "<option value=$out_cat[category_id]>$out_cat[category_name]</option>";
					}
				?>	
				</select><br><br>
				<select name="unit">
					<option value="-1">Выберите единицу измерения</option>
				<?php
					$str_out_cat="SELECT * FROM `units`";
					$run_out_cat=mysqli_query($conn,$str_out_cat);	

					while ($out_cat=mysqli_fetch_array($run_out_cat)) {
						echo "<option value=$out_cat[unit_id]>$out_cat[unit_name]</option>";
					}
				?>	
				</select><br><br>
				Изображение:<br>
				<input type="file" name="image"><br>
				<textarea name="description" placeholder="Описание" required></textarea><br>
				<input type="submit" name="add_prod" value="Добавить товар">
			</form>
		</div>
<?php

	echo "<pre>";
	print_r($_POST);
	echo "</pre>";

	echo "<pre>";
	print_r($_FILES);
	echo "</pre>";

	if (isset($_POST['add_prod'])){
		$name_prod=$_POST['name_prod'];
		$qty=$_POST['qty'];
		$price=$_POST['price'];
		$category=$_POST['category'];
		$unit=$_POST['unit'];
		$description=$_POST['description'];
	
	
		$name=strtolower($_FILES['image']['name']);
		$type=$_FILES['image']['type'];
		$tmp_name=$_FILES['image']['tmp_name'];
		$size=$_FILES['image']['size'];
		$full_path="../assets/img/products/$name";

		
	

	
	$str_add_prod="INSERT INTO `products`(product_name, category_id, unit_id, `description`,amount, image_path) VALUES ('$name_prod','$category', '$unit', '$description','$qty', '$name');";
	
	if ($type=='image/jpeg') {
			if ($size<5900000) {
				if (($category==-1) || ($unit==-1)){
					echo "Не выбрана категория или единица измерения";
				}
				else{
					$run_add_prod=mysqli_query($conn,$str_add_prod);
					echo 'результат запроса '.$run_add_prod;
					if ($run_add_prod) {
						echo "Запрос выполнен";
						move_uploaded_file($tmp_name, $full_path);
					}
				
				}}	
			
			else
				{
					echo "Слишком большой размер файла!";
				}
		}
		else
			{
				echo "Неверный тип файла!";
			}
	}


?>


		<table>
			<tr>
				<th>№ п/п</th>
				<th>Артикул</th>
				<th>Наименование</th>
				<th>Кол-во</th>
				<th>Цена</th>
				<th>Категория</th>
				<th>Изображение</th>
				<th>Статус</th>
				<th colspan="3">Действия</th>
			</tr>
			
			
			<?php
				$str_out_prod="SELECT * FROM `products`";
				$run_out_prod=mysqli_query($connect,$str_out_prod);
				while ($out_prod=mysqli_fetch_array($run_out_prod)) {
					$status_prod=$out_prod['status'];

					switch ($status_prod) {
						case '1':
							$status_prod="Выставлен";
							$action_text="Убрать";
							break;
						case '0':
							$status_prod="Убран";
							$action_text="Поставить";

							break;
						default:
							// code...
							break;
					};

					$str_out_cat="SELECT * FROM `category` WHERE `id`='$out_prod[id_category]'";
					$run_out_cat=mysqli_query($connect,$str_out_cat);
					
					$out_cat=mysqli_fetch_array($run_out_cat);





					echo "
						<tr>
							<td>$out_prod[id]</td>
							<td>$out_prod[code]</td>
							<td>$out_prod[name_prod]</td>
							<td>$out_prod[qty]</td>
							<td>$out_prod[price] руб</td>
							<td>$out_cat[name_cat]</td>
							<td>$status_prod</td>
							<td>
								<a href='controllers/edit_status.php?edit_status_prod=$out_prod[id]' class='off'>
									$action_text
								</a>	
							</td>
							<td>
								<a href='edit_products.php?edit_prod=$out_prod[id]' class='change'>
									Изменить
								</a>	
							</td>
							<td>
								<a href='controllers/del.php?del_prod=$out_prod[id]' class='delete'>
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