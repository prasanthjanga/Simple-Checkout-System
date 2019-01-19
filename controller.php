<?php
session_start();

function products_list($product_id = null)
{
	$product_array = [];
	$product_array[1] = [
		'name'	=> 'Super iPad',
		'price'	=> '549.99',
		'image'	=> 'super_ipad.png',
	];
	$product_array[2] = [
		'name'	=> 'MacBook Pro',
		'price'	=> '1399.99',
		'image'	=> 'macbook_pro.png',
	];
	$product_array[3] = [
		'name'	=> 'Apple TV',
		'price'	=> '109.50',
		'image'	=> 'apple_tv.png',
	];
	$product_array[4] = [
		'name'	=> 'VGA adapter',
		'price'	=> '30.00',
		'image'	=> 'vga_adapter.png',
	];

	if (!empty($product_id) && in_array($product_id, $product_array)) {
		return $product_array[$product_id];
	}else{
		return $product_array;
	}

}



function add_to_card($form_data = array())
{
	if (!empty($form_data)) {
		$_SESSION['cart_list'][] = [
			'item_id'	=> $form_data['product_id'],
			'qty'		=> 1,
		];
	}
	return header("Location: index.php");
}

function cart_empty(){
	session_destroy();
	return header("Location: index.php");
}


function cart_list(){
	$cart_list = $cart_data = [];
	
	if (!empty($_SESSION['cart_list'])) {
		$cart_list = $_SESSION['cart_list'];
		foreach ($cart_list as $cart_key => $cart_item) {
			if (array_key_exists($cart_item['item_id'], $cart_data)) {
				$cart_data[$cart_item['item_id']]['qty'] = $cart_data[$cart_item['item_id']]['qty']+$cart_item['qty'];
			}else{
				$cart_data[$cart_item['item_id']]['qty'] = $cart_item['qty'];
			}
		}
	}
	$cart_data = apple_tv_rule($cart_data);
	$cart_data = super_ipad_rule($cart_data);
	$cart_data = macbook_pro_rule($cart_data);

	return $cart_data;
}

function apple_tv_rule($cart_items = []){
	if (!empty($cart_items) && 
		array_key_exists(3, $cart_items) && 
		$cart_items[3]['qty'] >= 3) {

		if($cart_items[3]['qty']%3 == 0){
			$cart_items[3]['price_to'] = round($cart_items[3]['qty']/3)*2;
		}else{
			if(($cart_items[3]['qty']-1)%3 == 0){
				$cart_items[3]['price_to'] = round($cart_items[3]['qty']/3)*2+1;
			}elseif (($cart_items[3]['qty']-2)%3 == 0) {
				$cart_items[3]['price_to'] = round($cart_items[3]['qty']/3)*2;
			}
		}
	}
	return $cart_items;
}

function super_ipad_rule($cart_items = []){
	if (!empty($cart_items) && array_key_exists(1, $cart_items)) {

		if($cart_items[1]['qty'] <= 4){
			$cart_items[1]['reduse'] = null;
		}else{
			$cart_items[1]['reduse'] = 499.99;
		}
	}
	return $cart_items;
}

function macbook_pro_rule($cart_items = []){
	$extra_vga = null;
	if (!empty($cart_items[4]['qty'])) {
		$extra_vga = $cart_items[4]['qty'];
	}

	if (!empty($cart_items) && array_key_exists(2, $cart_items)) {
		$cart_items[4]['qty'] = $cart_items[2]['qty'];
		$cart_items[4]['free'] = $cart_items[2]['qty'];
	}
	if (!empty($extra_vga) && !empty($cart_items[2]['qty'])) {
		$cart_items[4]['qty'] = $cart_items[2]['qty']+$extra_vga;
	}
	return $cart_items;
}




?>