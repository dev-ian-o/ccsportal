
<?php
require_once('../classes/Auth.php');
require_once('../classes/Users.php');
require_once('../classes/Products.php');
require_once('../classes/Orders.php');
require_once('../classes/Cart.php');

if(isset($_POST['login']))
{
	print_r(Auth::signIn($_POST));
}

if(isset($_POST['signup']))
{
	print_r(Users::add($_POST));
}

if(isset($_POST['cart']))
{
	session_start();


	$row = json_decode(Products::findById($_POST['product_id']));
	$row = (array) $row[0];
	$row['qty'] = 1;

	if(!isset($_SESSION['cart']))
		$_SESSION['cart'][$_POST['product_id']] = array($row);

	$a = 0;

	foreach ($_SESSION['cart'] as $key => $value) {
		if($value['product_id'] ==  $_POST['product_id']){
			print_r(json_encode(array("success"=>false)));
			$a = 1;
			break;
		}
	}

	if($a === 0){

		if(isset($_SESSION['cart']))
			$_SESSION['cart'][$_POST['product_id']] =  $row;
		else
			$_SESSION['cart'][$_POST['product_id']] = $row;

		$_SESSION['cart_counter'] = sizeof($_SESSION['cart']);		

		print_r(json_encode(array("success"=>true,"cart_size"=>sizeof($_SESSION['cart']))));
	}
	// $_SESSION['cart'] = [];
	// print_r(json_encode($_SESSION['cart']));
}

if(isset($_POST['remove_cart']))
{

	session_start();
	unset($_SESSION['cart'][$_POST['product_id']]);	
	$_SESSION['cart_counter'] = 0;
	print_r(json_encode(array("success"=>true,"cart_size"=>sizeof($_SESSION['cart']))));	

}

if(isset($_POST['update_cart']))
{
	session_start();
	$_SESSION['cart'][$_POST['product_id']]['qty'] = $_POST['qty'];	
	print_r(json_encode(array("success"=>true)));	
}



if(isset($_POST['final_checkout']))
{
	session_start();
	$cart = json_decode(Cart::add($_POST));
	$cart = json_decode(Cart::findByInvoiceNo($cart->invoice_no));
	// print_r($_SESSION['cart']);

	foreach ($_SESSION['cart'] as $key => $value) {
		$value['user_id'] = $_SESSION['user'][0]['user_id'];
		$value['cart_id'] = $cart[0]->cart_id;
		Orders::add($value);
	}
	print_r(json_encode(array("success"=>true)));
	$_SESSION['cart'] = [];
	$_SESSION['cart_counter'] = 0;
}


if(isset($_POST['change_password']))
{
	$checkPass = json_decode(Auth::checkPassword($_POST));

	if($checkPass != null)
	{
		Auth::changePassword($_POST);
		print_r(json_encode(array("success"=>true)));		
	}
	else{
		print_r(json_encode(array("success"=>false)));		
	}
	// print_r($checkPass);
}

if(isset($_POST['change_profile']))
{
	session_start();
	$_SESSION['user'][0]['firstname'] = $_POST['firstname'];
	$_SESSION['user'][0]['lastname'] = $_POST['lastname'];
	print_r(Auth::changeProfile($_POST));
}
