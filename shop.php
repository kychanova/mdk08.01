<?php
	include "./components/header.php";

	// Базовый запрос для получения всех товаров
	$query = "SELECT * FROM products AS p JOIN units AS u ON p.unit_id = u.unit_id 
			JOIN prices ON prices.product_id=p.product_id 
			WHERE date_start <= CURRENT_TIMESTAMP AND 
			date_start = (select max(date_start) from prices where prices.product_id = p.product_id)";

	// Если с помощью get запроса был отправлен id категории, то добавляем условие в WHERE для фильтрации по категории
	$actual_cat = -1;
	if (isset($_GET['category'])){
		$actual_cat = $_GET['category'];
		$query .= " AND category_id=$actual_cat";
	}

	if (isset($_GET['btn'])){
		if ($_GET['min_price']){
			$query .= " AND price>=$_GET[min_price]";
		}
		if ($_GET['max_price']){
			$query .= " AND price<=$_GET[max_price]";
		}
	}

	// Выполнение итогового запроса к бд для получения всей информации о товарах
	$result_prod = mysqli_query($conn, $query);
	if (!$result_prod) echo("Big проблема");

	// Получение всех категорий
	$query = "SELECT * FROM categories WHERE view_status=1";
	$result_cat = mysqli_query($conn,$query);
	if (!$result_cat) echo("Big проблема");

	
?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section">
		<div class="container">
			<div class="breadcrumb-text">
				<p>Свежие и натуральные</p>
				<h1>Кааталог</h1>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row jc-center">
				<div class="product-filters">
					<ul>
						<?php 
							$class = $actual_cat == -1 ? 'active' : '';
							echo "<pre>";
							print_r($_GET);
							echo "</pre>";
						?>
						
						
						<li class=<?= $class?>><a href='shop.php'>All</a></li>
						<?php
							$num_rows = mysqli_num_rows($result_cat);

							for ($i=0;$i<$num_rows;$i++){
								$cat = mysqli_fetch_array($result_cat, MYSQLI_ASSOC);
								$class = $cat['category_id'] == $actual_cat ? 'active' : '';
								$name = mb_convert_case($cat['category_name'], MB_CASE_TITLE, 'UTF-8');
								$html = <<<_ITEM

								<li class="active"><a href='shop.php?category=$cat[category_id]'>$name</a></li>

								_ITEM;
								echo $html;
							}

						?>
					</ul>
					<form>
						<input type='number' name='min_price'>
						<input type='number' name='max_price'>
						<input type='submit' name='btn'>
					</form>
				</div>
            </div>

			<div class="product_grid">
				<?php
					// получаем количество строк в запросе
					$num_rows = mysqli_num_rows($result_prod);
					
					// проходим в цикле по каждой строке
					for ($i=0;$i<$num_rows;$i++){
						// получаем следующую строку запроса
						$prod = mysqli_fetch_array($result_prod, MYSQLI_ASSOC);

						// формируем карточку одного товара
						$prod_html = <<<_ITEM
						
						<div class="">
							<div class="single-product-item">
								<div class="product-image">
									<a href="single-product.php?prod_id=$prod[product_id]">
										<img src="assets/img/products/$prod[image_path]" alt="$prod[product_name]">
									</a>
								</div>
								<h3>$prod[product_name]</h3>
								<p class="product-price"><span>За $prod[unit].</span> $prod[price]руб. </p>
								<a href="cart.html" class="cart-btn">
									<i class="fas fa-shopping-cart"></i> Добавить в корзину
								</a>
							</div>
						</div>

						_ITEM;
						//выводим её
						echo $prod_html;
					}
				?>
			</div>

			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>34/8, East Hukupara, Gifirtok, Sadan.</li>
							<li>support@fruitkha.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="services.html">Shop</a></li>
							<li><a href="news.html">News</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Subscribe to our mailing list to get the latest updates.</p>
						<form action="index.html">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>,  All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>