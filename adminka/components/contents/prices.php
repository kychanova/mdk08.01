<content>
    <nav>
		<a href="dashboard.php">Главная панель</a>
		<a href="users.php">Пользователи</a>
		<a href="categories.php">Категории товаров</a>
		<a href="products.php">Товары</a>
		<a href="orders.php">Заказы</a>
	</nav>
    <article>
        <h2>Цены</h2>
        <div class="reg_form">
            <h3>Добавить цену</h3>
			<form method="POST">
                <select name="product_id">
                    <option value="-1">Выберите товар</option>
                    <?php
                        $query = "SELECT product_id, product_name FROM products";
                        $res = mysqli_query($conn, $query);
                        if (!$res) echo "Бедааааааа";

                        while ($prod = mysqli_fetch_array($res)){
                            echo "<option value=$prod[product_id]>$prod[product_name]</option>";
                        }

                    ?>
            
                </select><br>
                <input type="number" step="0.01" name="price" required><br>
                <input type="datetime-local" name="date_start" required><br>
                <input type="submit" name="btn" value="Добавить цену">
                
                
                <?php
                echo "<pre>";
                    print_r($prod);
                    echo "</pre>";
                ?>
			</form>

            <?php 
            $message='';
                 echo "<pre>";
                 print_r($_POST);
                 echo "</pre>";
                $error = false;
                 if (isset($_POST["btn"])){
                    if ($_POST['product_id']==-1){
                        $message = "Не выбран товар";
                        $error = true;
                    } 
                    else{
                        $query = "INSERT INTO prices(product_id, price, date_start) VALUES ('$_POST[product_id]', '$_POST[price]', '$_POST[date_start]')";
                        echo $query;
                        $res = mysqli_query($conn, $query);
                        if (!$res) die("Бедааааа");
                        $message = "Данные добавлены";
                    }
                 }
                echo '$error = '.$error;
                if ($error){
                    $color = 'red';
                }
                else{
                    $color = 'green';
                }
                echo '$color = '.$color;
            ?>
            
            <h2 style="color:<?= $color ?>; text-decoration:underline;"><?= $message ?></h2>

            <table>
                <thead>
                    <tr>
                        <th>ID продукта</th>
                        <th>Название продукта</th>
                        <th>Цена</th>
                        <th>Дата начала действия цены</th>
                        <th colspan=2>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT prices.product_id, product_name, price, date_start FROM prices JOIN products ON prices.product_id = products.product_id";
                        $res = mysqli_query($conn, $query);
                        if (!$res) die("Бедааа");

                        while($price = mysqli_fetch_array($res)){
                            // strtotime преобразует строку в дату и время

                            $date = strtotime($price['date_start']);
                            $date = date('d.m.Y H:i', $date);
                            $row = <<<_ITEM
                                <tr>
                                    <td>$price[product_id]</td>
                                    <td>$price[product_name]</td>
                                    <td>$price[price]</td>
                                    <td>$date</td>

                                    <td>
                                        <a href='' class='change'>Изменить</a>
                                    </td>
                                    <td>
                                        <a href='controllers/delete.php?prod_id=$price[product_id]&date=$price[date_start]' class='delete'>Удалить</a>
                                    </td>

                                </tr>
                            _ITEM;

                            echo $row;
                        }

                    ?>

                </tbody>
            </table>
        </div>