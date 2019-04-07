<?php
	// session_start();
 
	if(isset($_GET['PackageId']) & !empty($_GET['PackageId'])){
		if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
 
			$items = $_SESSION['cart'];
			$cartitems = explode(",", $items);
			if(in_array($_GET['PackageId'], $cartitems)){
				header('location: destinations.php?status=incart');
			}else{
				$items .= "," . $_GET['PackageId'];
				$_SESSION['cart'] = $items;
				header('location: destinations.php?status=success');
				
			}
 
		}else{
			$items = $_GET['PackageId'];
			$_SESSION['cart'] = $items;
			header('location: destinations.php?status=success');
		}
		
	}else{
		header('location: destinations.php?status=failed');
	}
?>