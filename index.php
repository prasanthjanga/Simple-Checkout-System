<?php
require 'controller.php';

if(isset($_POST['sub']))
{
	add_to_card($_POST);
} 
if (isset($_POST['cart_empty'])) {
	cart_empty();
}

$product_array = products_list();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Checkout System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">


	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header" style="top: 0px;">
			
			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.php" class="logo">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				

				<!-- Header Icon -->
				<div class="header-icons">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">
						<?php 
						echo (!empty($_SESSION['cart_list']))?count($_SESSION['cart_list']):'0'
						?>
						</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">

							<div class="header-cart-total">
								Total Items Added : 
								<?php 
								echo (!empty($_SESSION['cart_list']))?count($_SESSION['cart_list']):'0'
								?>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.php" class="logo-mobile">
				<img src="images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">
						<?php 
						echo (!empty($_SESSION['cart_list']))?count($_SESSION['cart_list']):'0'
						?>					
						</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							
							<div class="header-cart-total">
								Total Items Added : 
								<?php 
								echo (!empty($_SESSION['cart_list']))?count($_SESSION['cart_list']):'0'
								?>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

	</header>

	<!-- Content page -->
	<section class="bgwhite p-b-65">
		<div class="container">
			<div class="row">
				

				<div class="col-sm-6 col-md-8 col-lg-12 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							
						</div>

						<span class="s-text8 p-t-5 p-b-5">
							Showing 1–<?php echo (!empty($product_array))?count($product_array):'0'; ?> of <?php echo (!empty($product_array))?count($product_array):'0'; ?> results
						</span>
					</div>


					<!-- Product -->
					<div class="row">
						<?php
						foreach ($product_array as $product_key => $product_value) {
							echo '<div class="col-sm-12 col-md-6 col-lg-3 p-b-50">';
							echo '<div class="block2">';
							echo '<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">';
							echo '<img src="images/'.$product_value['image'].'" alt="'.$product_value['name'].'">';
							echo '<div class="block2-overlay trans-0-4">';
							echo '<div class="block2-btn-addcart w-size1 trans-0-4">';
							echo '<form action="index.php" method="post">';
							echo '<input type="hidden" name="product_id" value="'.$product_key.'">';
							echo '<input type="submit" name="sub" value="Add to Cart" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">';
							echo '</form>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
							echo '<div class="block2-txt p-t-20">';
							echo '<a href="#" class="block2-name dis-block s-text3 p-b-5">
									'.$product_value['name'].'
								</a>';
							echo '<span class="block2-price m-text6 p-r-5">
									$ '.$product_value['price'].'
								</span>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
						}
						?>



<div class="size10 trans-0-4 m-t-10 m-b-10">
<form accept="" method="post">
	<button type="submit" name="cart_empty" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">Cart Empty</button>
</form>
</div>
					</div>

					
				</div>
			</div>
		</div>
	</section>


	



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
		===========================================================*/
		var filterBar = document.getElementById('filter-bar');

		noUiSlider.create(filterBar, {
			start: [ 50, 200 ],
			connect: true,
			range: {
				'min': 50,
				'max': 200
			}
		});

		var skipValues = [
		document.getElementById('value-lower'),
		document.getElementById('value-upper')
		];

		filterBar.noUiSlider.on('update', function( values, handle ) {
			skipValues[handle].innerHTML = Math.round(values[handle]) ;
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>



</body>
</html>
