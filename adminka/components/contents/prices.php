
    <article>
        <div class="reg_form">
			<h3>Добавить цены</h3>
			<form method="POST">
                <select name='product'>
                    <option value="-1">--Выберите товар--</option>

                    <?php 
                        $query = "SELECT product_id, product_name FROM products";
                        $prods = mysqli_query($conn, $query);

                        while($prod = mysqli_fetch_array($prods)){
                            echo "<option value='$prod[product_id]'>$prod[product_name]</option>";
                        }
                    ?>
                </select>
				<input type="number" step="0.01" name="price" placeholder="Цена" required>
                <input type="datetime-local" name="date_start" required>
				<input type="submit" name="btn_add_data" value="Добавить категорию">
			</form>
		</div>

        <?php
            if (isset($_POST['btn_add_data'])){
                echo 'date= '.$_POST['date_start'];
                if ($_POST['product'] != -1){
                    $query = "INSERT INTO prices(product_id, price, date_start) VALUES ('$_POST[product]', '$_POST[price]', '$_POST[date_start]')";
                    $res = mysqli_query($conn, $query);
                    if (!$res) die("error");

                }
            }
        ?>

        <table>
            <thead>
                <tr>
                    <th>Товар</th>
                    <th>Цена</th>
                    <th>Дата начала действия</th>
                    <th colspan=2>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM prices JOIN products ON products.product_id = prices.product_id";
                    $prices = mysqli_query($conn, $query);
                    if (!$prices) die("error");
                    while ($price = mysqli_fetch_array($prices)){
                        echo gettype($price['date_start']);
                        $date_from_db = strtotime($price['date_start']);
                        $date=date('d.m.Y H:i',$date_from_db);
                        $price_line = <<<_ITEM

                        <tr>
                            <td>$price[product_name]</td>
                            <td>$price[price] руб.</td>
                            <td>$date</td>
                            <td>
                                <a class='change' href=''>Изменить</a> 
                            </td>
                            <td> 
                                <a class='delete' href=''>Удалить</a>
                            </td>
                        </tr>
                        _ITEM;

                        echo $price_line;
                    }
                ?>
            </tbody>
        </table>
    </article>
</content>