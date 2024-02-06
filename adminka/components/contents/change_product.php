<?php
    if (isset($_GET['product_id'])){
        $prod_id = $_GET['product_id'];
        $query = "SELECT * FROM products WHERE product_id=$_GET[product_id]";
        $res = mysqli_query($conn, $query);
        if (!$res) die("Беддаааа");

        $product_data = mysqli_fetch_array($res);


        
    }
    
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
		<h2>Товары</h2>
		<div class="reg_form">
			<h3>Изменить товар</h3>
			<form method="POST" enctype="multipart/form-data" action="controllers/edit_product.php">
				<input type="text" name="name_prod" placeholder="Наименование товара" value=<?= $product_data['product_name'] ?>>
				<input type="number" name="qty" placeholder="Количество" value=<?= $product_data['amount'] ?>>
				<select name="unit">
					<?php

					$str_out_unit = "SELECT * FROM units";
					$run_out_unit = mysqli_query($conn, $str_out_unit);

					while ($out_unit = mysqli_fetch_array($run_out_unit)){
						echo "<option value=$out_unit[unit_id]>$out_unit[unit_name]</option>";
					}
					?>
				</select>
				<select name="category">
				<?php
					$str_out_cat="SELECT * FROM `categories`";
					$run_out_cat=mysqli_query($conn,$str_out_cat);
					
					while ($out_cat=mysqli_fetch_array($run_out_cat)) {
                        $selected = '';
                        if ($out_cat['category_id'] == $product_data['category_id']){
                            $selected = 'selected';
                        }
						echo "<option $selected value=$out_cat[category_id]>$out_cat[category_name]</option>";
					}
				?>	
				</select><br><br>

				<!-- <select>
					<option value=1>Овощи</option>
					<option>Ягоды</option>
				</select> -->
                Изображение:<br>
                <img style="width:100px" src="../assets/img/products/<?=$product_data['image_path'] ?>">
				<br>
				<input type="file" name="image"><br>
				<textarea name="description" placeholder="Описание"><?= $product_data['description'] ?></textarea><br>
				<input type="hidden" value="<?= $_GET['product_id']?>" name="product_id">
                <input type="submit" name="add_prod" value="Сохранить изменения">
			</form>
		</div>
<?php

