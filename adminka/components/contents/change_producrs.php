<?php
    if (isset($_GET['prod_id'])){
        $prod_id = $_GET['prod_id'];
        $query =  "SELECT * FROM products WHERE product_id=$prod_id";
        $res = mysqli_query($conn, $query);
        if (!$res) die("error");

        $prod_data = mysqli_fetch_assoc($res);
        // echo 'prod_data';
        // $print_r($prod_data);
    }

    else{
        echo "не сработал блок";
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
			<h3>Добавить товар</h3>
			
			<form action="controllers/change_product.php?prod_id=<?= $prod_data['product_id']?>" method="POST" enctype="multipart/form-data">
				<input type='text' name="prod_id" value="<?= $prod_data['product_id']?>" disabled>
                <input type="text" name="name_prod" placeholder="Наименование товара" value=<?= $prod_data['product_name']?>>
				<input type="number" name="qty" placeholder="Количество" value=<?= $prod_data['amount']?>>
				<select name="unit">
					<?php

					$str_out_unit = "SELECT * FROM units";
					$run_out_unit = mysqli_query($conn, $str_out_unit);

					while ($out_unit = mysqli_fetch_array($run_out_unit)){
                        $selected = $out_unit['unit_id'] == $prod_data['unit_id'] ? 'selected' : '';
						echo "<option $selected value=$out_unit[unit_id]>$out_unit[unit_name]</option>";
					}
					?>
				</select>
				<select name="category">
				<?php
					$str_out_cat="SELECT * FROM `categories`";
					$run_out_cat=mysqli_query($conn,$str_out_cat);
					
					while ($out_cat=mysqli_fetch_array($run_out_cat)) {
                        $selected = $out_cat['category_id'] == $prod_data['category_id'] ? 'selected' : '';
                        // if ($out_cat['category_id'] == $prod_data['category_id']){
                        //     $selected = 'selected';
                        // }
                        // else{
                        //     $selected = '';
                        // }
						echo "<option $selected value=$out_cat[category_id]>$out_cat[category_name]</option>";
					}
				?>	
				</select><br><br>

				<!-- <select>
					<option value=1>Овощи</option>
					<option>Ягоды</option>
				</select> -->
                <img style="width:200px;" src="../../assets/img/products/<?= $prod_data['image_path']?>" alt="<?=$prod_data['prod_name']?>" /><br>
				Изображение:<br>
				<input type="file" name="image" ><br>
				<textarea name="description" placeholder="Описание"><?= $prod_data['description']?></textarea><br>
				<input type="hidden" name="prod_id" value="<?= $prod_data['product_id']?>">
                <input type="submit" name="add_prod" value="Изменить товар">
                <input type="reset" name='reset-btn' value="C,hjcbnm bpvtytybz">
			</form>
		</div>
