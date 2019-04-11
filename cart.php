<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Traveler</title>

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/ariel.css">
    <link rel="stylesheet" type="text/css" href="css/contact.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
</head>
<body>
    <?php $title = "CART"; ?>
	<!-- Navbar -->
	<?php include 'templates/header.php' ?>

	<!-- Subheader -->
	<?php include 'templates/subheader.php' ?>

	<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	require_once('models/connect.php'); 

    if(isset($_SESSION['cart'])){
        $items = $_SESSION['cart'];
        $cartitems = explode(",", $items);
    } else {
        $cartitems = [];
    }
	
	?>
    
    <div class="container">
    <div class="card shopping-cart">
                <div class="card-header bg-dark text-light">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Shopping Cart
                    <a href="destinations.php" class="btn btn-outline-info btn-sm pull-right">Continue Shopping</a>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">

                        <?php
						$total = 0;
						$i=1;
						foreach ($cartitems as $key=>$id) {
							$sql = "SELECT * FROM packages WHERE PackageId = $id";
							$results = mysqli_query($connect, $sql);
							$record = mysqli_fetch_assoc($results);
                        ?>	  	
                        
                        <!-- PRODUCT -->
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-2 text-center">
                                    <img class="img-responsive" src="<?php echo $record['PkgImgUrl']; ?>" alt="prewiew" width="120" height="80">
                            </div>
                            <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                                <h4 class="product-name"><strong><?php echo $record['PkgName']; ?></strong></h4>
                                <h4>
                                    <small><?php echo $record['PkgStartDate']; ?> - <?php echo $record['PkgEndDate']; ?></small>
                                </h4>
                            </div>
                            <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                                <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                    <h6><strong>$<?php echo $record['PkgBasePrice']; ?></strong></h6>
                                </div>
                                <div class="col-2 col-sm-2 col-md-2 text-right">
                                    <button type="button" class="btn btn-outline-danger btn-xs"><a href="delcart.php?remove=<?php echo $key; ?>">
                                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- END PRODUCT -->
            
                        <?php 
							$total = $total + $record['PkgBasePrice'];
							$i++; 
							} 
						?>
                    
                    <!-- <div class="pull-right">
                        <a href="" class="btn btn-outline-secondary pull-right">
                            Update shopping cart
                        </a>
                    </div> -->
                </div>
                <div class="card-footer">
                    <!-- <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="cupone code">
                            </div>
                            <div class="col-6">
                                <input type="submit" class="btn btn-default" value="Use cupone">
                            </div>
                        </div>
                    </div> -->
                    <div class="pull-right" style="margin: 10px">
                        <a href="models/cartinsert.php" class="btn btn-success pull-right">Checkout</a>
                        <div class="pull-right" style="margin: 8px">
                            Total price: <b>$<?php echo $total; ?></b>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<!-- FOOTER -->
<?php include 'templates/footer.php' ?>
  
  <!-- Bootstrap JS -->
  <script src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+990DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

