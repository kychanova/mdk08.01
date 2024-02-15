
	<article>
		<h2>Категории</h2>
		<div class="reg_form">
			<h3>Добавить категорию</h3>
			<form method="POST">
				<input type="text" name="name_cat" placeholder="Наименование">
				<input type="submit" name="add_cat" value="Добавить категорию">
			</form>
		</div>
		<?php
			if (isset($_POST['add_cat'])){
				$name_cat=$_POST['name_cat'];
				$add_cat=$_POST['add_cat'];
				$str_add_cat="INSERT INTO `categories`(`category_name`) VALUES ('$name_cat')";
				if ($add_cat) {
					if ($name_cat) {
						$run_add_cat=mysqli_query($conn,$str_add_cat);
					}
				}
			}
		?>
		<table>
			<tr>
				<th>№ п/п</th>
				<th>Наименование</th>
				<th>Статус</th>
				<th colspan="3">Действия</th>
			</tr>
<?php
					$str_out_cat="SELECT * FROM `categories`";
					$run_out_cat=mysqli_query($conn,$str_out_cat);
					
					while ($out_cat=mysqli_fetch_array($run_out_cat)) {
						$view_status=$out_cat['view_status'];
						switch ($view_status) {
							case '1':
								$view_status="Показан";
								break;
							case '0':
								$view_status="Скрыт";
								break;
							
							default:
								// code...
								break;
						}
						echo "
						<tr>
							<td>$out_cat[category_id]</td>
							<td>$out_cat[category_name]</td>
							<td>$view_status</td>
							<td>
								<a href='' class=off>
									Не показывать
								</a>	
							</td>
							<td>
								<a href='' class=change>
									Изменить
								</a>	
							</td>
							<td>
								<a href='controllers/del.php?del_cat=$out_cat[category_id]' class=delete>
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