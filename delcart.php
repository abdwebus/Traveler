<!-- Author: Ariel Contreras -->
<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
	unset($_SESSION['cart']);
	
}
header('location:cart.php');

// Delete to cart function for multiple items

// session_start();
// $items = $_SESSION['cart'];
// $cartitems = explode(",", $items);
// if(isset($_GET['remove']) & !empty($_GET['remove'])){
// 	$delitem = $_GET['remove'];
// 	unset($cartitems[$delitem]);
// 	$itemids = implode(",", $cartitems);
// 	$_SESSION['cart'] = $itemids;
// }
// header('location:cart.php');

?>