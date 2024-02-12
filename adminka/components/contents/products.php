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
			<pre>
			<?php print_r($_POST); ?>
</pre>
			<form method="POST" enctype="multipart/form-data">
				<input type="text" name="name_prod" placeholder="Наименование товара">
				<input type="number" name="qty" placeholder="Количество">
				<input type="number" name="price" placeholder="Цена">
				<select name="unit">
					<option value="-1">--Выберите единицу измерения--</option>
					<?php

					$str_out_unit = "SELECT * FROM units";
					$run_out_unit = mysqli_query($conn, $str_out_unit);

					while ($out_unit = mysqli_fetch_array($run_out_unit)){
						echo "<option value=$out_unit[unit_id]>$out_unit[unit_name]</option>";
					}
					?>
				</select>
				<select name="category">
					<option value="-1">--Выберите категорию--</option>
				<?php
					$str_out_cat="SELECT * FROM `categories`";
					$run_out_cat=mysqli_query($conn,$str_out_cat);
					
					while ($out_cat=mysqli_fetch_array($run_out_cat)) {
						echo "<option value=$out_cat[category_id]>$out_cat[category_name]</option>";
					}
				?>	
				</select><br><br>

				<!-- <select>
					<option value=1>Овощи</option>
					<option>Ягоды</option>
				</select> -->
				Изображение:<br>
				<input type="file" name="image"><br>
				<textarea name="description" placeholder="Описание"></textarea><br>
				<input type="submit" name="add_prod" value="Добавить товар">
			</form>
		</div>
<?php

if(isset($_POST['add_prod'])){
	$name_prod=$_POST['name_prod'];
	$qty=$_POST['qty'];
	$price=$_POST['price'];
	$category=$_POST['category'];
	$description=$_POST['description'];
	$unit = $_POST["unit"];
	$add_prod=$_POST['add_prod'];

	echo "<pre>";
	print_r($_FILES);
	echo "</pre>";

	$name=$_FILES['image']['name'];
	$type=$_FILES['image']['type'];
	$tmp_name=$_FILES['image']['tmp_name'];
	$size=$_FILES['image']['size'];
	$full_path="../assets/img/products/$name";
	$str_add_prod="INSERT INTO `products`( `product_name`, category_id, unit_id, amount, `description`, `image_path`) VALUES ('$name_prod','$category','$unit','$qty','$description', '$name');";
	if ($add_prod) {
		// code...
		if ($type=='image/jpeg') {
			if ($size<5900000) {
				if ($name_prod) {
					$run_add_prod=mysqli_query($conn,$str_add_prod);
					if ($run_add_prod) {
						echo "Запрос выполнен";
						move_uploaded_file($tmp_name, $full_path);
					}
				}
				else
					{
						echo "Заполните поля!";
					}
			}
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
}

?>


		<table>
			<tr>
				<th>№ п/п</th>
				<th>Наименование</th>
				<th>Кол-во</th>
				<th>Категория</th>
				<th>Единица измерения</th>
				<th colspan="3">Действия</th>
			</tr>
			
			
			<?php
				$str_out_prod="SELECT * FROM `products` as p JOIN categories as c ON p.category_id=c.category_id JOIN units as u ON u.unit_id=p.unit_id;";
				$run_out_prod=mysqli_query($conn,$str_out_prod);
				while ($out_prod=mysqli_fetch_array($run_out_prod)) {
					// $status_prod=$out_prod['status'];

					// switch ($status_prod) {
					// 	case '1':
					// 		$status_prod="Выставлен";
					// 		$action_text="Убрать";
					// 		break;
					// 	case '0':
					// 		$status_prod="Убран";
					// 		$action_text="Поставить";

					// 		break;
					// 	default:
					// 		// code...
					// 		break;
					// };

					// $str_out_cat="SELECT * FROM `category` WHERE `id`='$out_prod[id_category]'";
					// $run_out_cat=mysqli_query($connect,$str_out_cat);
					
					// $out_cat=mysqli_fetch_array($run_out_cat);
					echo "
						<tr>
							<td>$out_prod[product_id]</td>
							<td>$out_prod[product_name]</td>
							<td>$out_prod[amount]</td>
							<td>$out_prod[category_name]</td>
							<td>$out_prod[unit_name]</td>
							<td>
								<a href='' class='off'>
									Скрыть
								</a>	
							</td>
							<td>
								<a href='change_products.php?prod_id=$out_prod[product_id]' class='change'>
									Изменить
								</a>	
							</td>
							<td>
								<a href='' class='delete'>
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