<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Traveler</title>

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/ariel.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
</head>
<body>
	<!-- Navbar -->
	<?php include 'templates/header.php' ?>

	<!-- Subheader -->
	<?php include 'templates/subheader.php' ?>

	<?php
	// session_start();
	require_once('models/connect.php'); 

	$items = $_SESSION['cart'];
	$cartitems = explode(",", $items);
	?>
	
	<main class="page">
	 	<section class="shopping-cart dark">
	 		<div class="container">
		        <div class="block-heading">
		          <h2>Shopping Cart</h2>
		        </div>
		      <div class="content">
	 					<div class="row">

					 <?php
						$total = 0;
						$i=1;
						foreach ($cartitems as $key=>$id) {
							$sql = "SELECT * FROM packages WHERE PackageId = $id";
							$results = mysqli_query($connect, $sql);
							$record = mysqli_fetch_assoc($results);
						?>	  	

	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">
				 				<div class="product">
				 					<div class="row">

					 					<div class="col-md-3">
					 						<img class="img-fluid mx-auto d-block image" src="<?php echo $record['PkgImgUrl']; ?>">
										</div>
										 
					 					<div class="col-md-8">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-5 product-name">
							 							<div class="product-name">
								 							<a href="#"><?php echo $record['PkgName']; ?></a>
								 							<div class="product-info">
									 							<div><span class="value"><?php echo $record['PkgStartDate']; ?></span></div>
									 							<div><span class="value"><?php echo $record['PkgEndDate']; ?></span></div>
									 						</div>
									 					</div>
							 						</div>
							 						<div class="col-md-3 price">
							 							<span><?php echo $record['PkgBasePrice']; ?></span>
							 						</div>
							 					</div>
											 </div>
										 </div>
										 
					 				</div>
				 				</div>
				 			</div>
						 </div>

						 <?php 
							$total = $total + $record['PkgBasePrice'];
							$i++; 
							} 
						?>
						 
			 			<div class="col-md-12 col-lg-4">
			 				<div class="summary">
			 					<h3>Summary</h3>
			 					<div class="summary-item"><span class="text">Subtotal</span><span class="price">$<?php echo $total; ?></span></div>
			 					<div class="summary-item"><span class="text">Discount</span><span class="price">$0</span></div>
			 					<div class="summary-item"><span class="text">Total</span><span class="price">$<?php echo $total; ?></span></div>
			 					<button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
							 </div>
						</div>
						 
		 			</div> 
		 		</div>
	 		</div>
		</section>
	</main>

	<!-- FOOTER -->
	<?php include 'templates/footer.php' ?>
  
  <!-- Bootstrap JS -->
  <script src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+990DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>