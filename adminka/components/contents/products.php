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
            <h3>Добавить цены</h3>
            <form method="POST">
                <select name="product_id">
                <option value=-1>--Выберите товар--</option>
                <?php
                    $query = "SELECT product_id, product_name FROM products";
                    $res = mysqli_query($conn, $query);
                    if (!$res) die("Бедаааа");

                    while($row = mysqli_fetch_array($res)){
                        echo "<option value=$row[product_id]>$row[product_name]</option>";
                    }

                ?>
                </select>
                <br>
                <input type="datetime-local" required name="date_start">
                <input type="number" step="0.01" required placeholder="Цена" name="price">
                <input type="submit" value="Добавить цену" name="btn">
            </form>
        </div>

        <?php
            $message='';
            if (isset($_POST['btn'])){
                if($_POST['product_id']==-1){
                    $message = "Не выбран товар";
                }
                else{
                    $query = "INSERT INTO prices(product_id, price, date_start) VALUES ('$_POST[product_id]', '$_POST[price]', '$_POST[date_start]')";
                    $res = mysqli_query($conn, $query);
                    if ($res){
                        $message = "Цена добавлена";
                    }
                }
            }
        ?>

        <h2>
            <?= $message ?>
        </h2>

        <table>
            <thead>
                <tr>
                    <th>Товар</th>
                    <th>Цена</th>
                    <th>дата начала действия цены</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT prices.product_id, product_name, price, date_start FROM prices JOIN products ON prices.product_id = products.product_id;";
                    $res = mysqli_query($conn, $query);
                    if (!$res) die("Бедааа");

                    while($row = mysqli_fetch_array($res)){
                        echo gettype($row['date_start']);
                        $date_start = strtotime($row['date_start']);
                        $date_start = date('d.m.Y H:i', $date_start);
                        echo "
                            <tr>
                                <td>$row[product_name]</td>
                                <td>$row[price]</td>
                                <td>$date_start</td>
                                <td>
                                    <a href='' class=change>
                                        Изменить
                                    </a>	
                                </td>
                                <td>
                                    <a href='controllers/delete.php?prod_id=$row[product_id]&date_start=$row[date_start]' class=delete>
                                        Удалить
                                    </a>	
                                </td>
                            </tr>
                        
                        ";
                    }
                ?>
            </tbody>
        </table>
        

    </article>