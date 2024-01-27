<content>
	<nav>
		<a href="dashboard.php">Главная панель</a>
		<a href="users.php">Пользователи</a>
		<a href="categories.php">Категории товаров</a>
		<a href="products.php">Товары</a>
		<a href="orders.php">Заказы</a>
	</nav>

	<?php
		$edit_prod=$_GET['edit_prod'];
		$str_out_prod="SELECT * FROM `products` WHERE `id`=$edit_prod;";
		$run_out_prod=mysqli_query($connect,$str_out_prod);
		$out_prod=mysqli_fetch_array($run_out_prod);
	?>


	<article>
		<h2>Изменить товар <?=$out_prod['name_prod']?></h2>
		<div class="reg_form">
			<h3>Добавить товар</h3>
			<form method="POST" enctype="multipart/form-data" action="controllers/edit.php?edit_prod=<?=$out_prod['id']?>">
				<input type="text" name="name_prod" value="<?php echo $out_prod['name_prod'];?>" placeholder="Наименование товара">
				<input type="number" name="qty" value='<?php echo $out_prod['qty'];?>' placeholder="Количество">
				<input type="number" name="price" value='<?php echo $out_prod['price'];?>' placeholder="Цена">
				<input type="number" name="code" value='<?php echo $out_prod['code'];?>' placeholder="Артикул">
				<select name="category">
<?php
					$str_out_cat="SELECT * FROM `category`";
					$run_out_cat=mysqli_query($connect,$str_out_cat);
					
					while ($out_cat=mysqli_fetch_array($run_out_cat)) {
					echo "
						<option value=$out_cat[id]>$out_cat[name_cat]</option>
						";
					}
?>			
				</select><br><br>
				Изображение:<br>
				<input type="file" name="image"><br>
				<textarea placeholder="Краткое описание"></textarea><br>
				<textarea name="description" placeholder="Описание"><?php echo $out_prod['description'];?></textarea><br>
				<input type="submit" name="edit_prod" value="Сохранить">
			</form>
		</div>
	</article>
</content>