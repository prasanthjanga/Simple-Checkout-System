<?php
require 'controller.php';

$product_array = products_list();
$cart_list = cart_list();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Checkout System Cart</title>
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


	<!-- Cart -->
	<section class="cart bgwhite p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4">Quantity</th>
							<th class="column-5">Total</th>
						</tr>

						<?php
						if (!empty($cart_list)) {
							$sub_total = null;
							foreach ($cart_list as $item_id => $item_qty) {
								echo '<tr class="table-row">';
								echo '<td class="column-1">';
								echo '<div class="cart-img-product b-rad-4 o-f-hidden">';
								echo '<img src="images/'.$product_array[$item_id]['image'].'" alt="'.$product_array[$item_id]['name'].'">';
								echo '</div>';
								echo '</td>';
								echo '<td class="column-2">'.$product_array[$item_id]['name'].'</td>';
								echo '<td class="column-3">$ '.$product_array[$item_id]['price'].'</td>';
								echo '<td class="column-4">'.$item_qty['qty'].'</td>';
								echo '<td class="column-5">$ ';
								if ($item_id == 1) {
									if (!empty($item_qty['reduse'])) {
										echo $item_qty['reduse'] * $item_qty['qty'];
										$sub_total += $item_qty['reduse'] * $item_qty['qty'];
									}else{
										echo $product_array[$item_id]['price'] * $item_qty['qty'];
										$sub_total += $product_array[$item_id]['price'] * $item_qty['qty'];
									}
								}
								elseif ($item_id == 3) {
									if (!empty($item_qty['price_to'])) {
										echo $product_array[$item_id]['price'] * $item_qty['price_to'];
										$sub_total += $product_array[$item_id]['price'] * $item_qty['price_to'];
									}
								}
								elseif ($item_id == 4) {
									if (!empty($item_qty['free']) && 
										$item_qty['free'] == $item_qty['qty']) {
										echo 0;
									}else{
										if(!empty($item_qty['free'])){
											echo $product_array[$item_id]['price'] * ($item_qty['qty']-$item_qty['free']);
											$sub_total += $product_array[$item_id]['price'] * ($item_qty['qty']-$item_qty['free']);
										}else{
											echo $product_array[$item_id]['price'] * ($item_qty['qty']);
											$sub_total += $product_array[$item_id]['price'] * ($item_qty['qty']);
										}
									}
								}else{
									echo $product_array[$item_id]['price'] * $item_qty['qty'];
									$sub_total += $product_array[$item_id]['price'] * $item_qty['qty'];
								}
								// if (!empty($item_qty['price'])) {
								// 	// echo $item_qty['price'];
								// 	echo $product_array[$item_id]['price'] * $item_qty['price'];
								// }else{
								// 	echo $product_array[$item_id]['price'];
								// }
								echo '</td>';
								echo '</tr>';
							}
						}else{
							echo 'No data to view!';
						}
						?>
					</table>
				</div>
			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						$ <?php echo $sub_total; ?>
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						$ <?php echo $sub_total; ?>
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Proceed to Checkout
					</button>
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
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
