<?php include "include/header.php" ?>

	<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include "include/sidebar.php" ?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Our Products</h2>
						<?php 
							$getProducts = $pro->getHomePageProducts();
							if ($getProducts) {
								while ($productValue = $getProducts->fetch_assoc()) {

						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="admin/<?php echo $productValue['image']; ?>" alt="" />
										<h2>$<?php echo $productValue['price']; ?></h2>
										<a href="product-details.php?single_product_details=<?php echo $productValue['productId']; ?>">
											<p><?php echo $productValue['productName']; ?></p>
										</a>
										<a href="product-details.php?single_product_details=<?php echo $productValue['productId']; ?>&add-to-cart" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>$<?php echo $productValue['price']; ?></h2>
											<a href="product-details.php?single_product_details=<?php echo $productValue['productId']; ?>&add-to-cart">
												<p><?php echo $productValue['productName']; ?></p>
											</a>
											<a href="product-details.php?single_product_details=<?php echo $productValue['productId']; ?>&add-to-cart" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
									<?php if ($productValue['type'] == 0 ) {
									?>
									<img src="images/home/new.png" class="new" alt="" />
								<?php } ?>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php } } ?>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>

<?php include "include/footer.php" ?>