<?php
	include "components/header.php";


?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Один товар</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

<?php
	if (isset($_GET['prod_id'])){
		$prod_id = $_GET['prod_id'];

		$query = "SELECT * FROM products as p JOIN units as u ON p.unit_id=u.unit_id 
				  JOIN categories as c ON c.category_id=p.category_id 
				  JOIN  prices ON prices.product_id=p.product_id
				  WHERE p.product_id=$prod_id AND
				  date_start <= CURRENT_TIMESTAMP AND 
				  date_start = (select max(date_start) from prices where prices.product_id = p.product_id)";
		
		$res = mysqli_query($conn, $query);
		if (!$res) echo 'горееееееееееее';

		//Значение по умолчанию
		$prod_section = <<< _PROD
					<div class="single-product mt-150 mb-150">
					<div class="container">
						<h2 style="text-align:center;">Товар не найден</h2>
					</div>
					</div>
					<!-- end single product -->

			_PROD;

		if ($prod = mysqli_fetch_assoc($res)){

		$prod_section = <<< _PROD
			<!-- single product -->
			<div class="single-product mt-150 mb-150">
				<div class="container">
					<div class="row">
						<div class="col-md-5">
							<div class="single-product-img">
								<img src="assets/img/products/$prod[image_path]" alt="">
							</div>
						</div>
						<div class="col-md-7">
							<div class="single-product-content">
								<h3>$prod[product_name]</h3>
								<p class="single-product-pricing"><span>За $prod[unit_name]</span> $prod[price]</p>
								<p>$prod[description]</p>
								<div class="single-product-form">
									<form action="checkout.php?prod_id=$prod[product_id]"  id="number-form" method="POST">
										<input type="number" placeholder="0" min=1  max=$prod[amount] required value="1" name="amount">
									</form>
			_PROD;

		if ($prod['amount'] > 0){
			$prod_section .= <<< _PROD
								<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Добавить в корзину</a>
								<a href="checkout.php?prod_id=$prod[product_id]" class="cart-btn"> Купить</a>
								<input type="submit" name="btn" value="Купить" class="cart-btn" form="number-form">
								_PROD;
		}
		else{
			$prod_section .= <<< _PROD
								<h3>Товара нет на складе</h3>
								_PROD;
		}
									
									
		$prod_section .= <<<_PROD
							<p><strong>Категория: </strong><a href="shop.php?category=$prod[category_id]">$prod[category_name]</a></p>
											</div>
											<h4>Share:</h4>
											<ul class="product-share">
												<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
												<li><a href=""><i class="fab fa-twitter"></i></a></li>
												<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
												<li><a href=""><i class="fab fa-linkedin"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							</div>
							<!-- end single product -->

							_PROD;

		
		}
	}

	else{
		$prod_section = <<< _PROD
		<div class="single-product mt-150 mb-150">
		<div class="container">
			<h2 style="text-align:center;">Не знаю, что делать</h2>
		</div>
		</div>
		<!-- end single product -->

_PROD;
	}
	
	echo $prod_section;

?>



	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> 85$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> 70$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> 35$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end more products -->

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


<?php
	include "components/footer.php";

?>