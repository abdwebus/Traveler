<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Traveler</title>

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/ariel.css">
	<link rel="stylesheet" type="text/css" href="css/contact.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
</head>
<body>
	<!-- Navbar -->
	<?php include 'templates/header.php' ?>

	<!-- Subheader -->
	<?php include 'templates/subheader.php' ?>

	<!-- Login -->
	<?php include 'login.php' ?>
	<?php include 'signup.php' ?>
	
	<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	include_once('models/connect.php');
	$date = date("Y-m-d H:i:s");
	$query = "SELECT * FROM `packages` WHERE `PkgEndDate` > '$date'";
	$results = mysqli_query($connect, $query) or die("database error:". mysqli_error($connect));
	?>

	<div class="container">
		<?php if(isset($_GET['status']) & !empty($_GET['status'])){ 
			if($_GET['status'] == 'success'){
				echo "<div class=\"alert alert-success\" role=\"alert\">Item Successfully Added to Cart</div>";
			}elseif ($_GET['status'] == 'incart') {
				echo "<div class=\"alert alert-info\" role=\"alert\">Item is Already Exists in Cart</div>";
			}elseif ($_GET['status'] == 'failed') {
				echo "<div class=\"alert alert-danger\" role=\"alert\">Failed to Add item, try to Add Again</div>";
			}
		}
		?>
	</div>

	<section class="details-card">
		<div class="container">
			<div class="row">

				<?php
				while($record = mysqli_fetch_assoc($results) ) {
					?>
					<div class="col-md-4">
						<div class="card-content">
							<div class="card-img">
								<img src="<?php echo $record['PkgImgUrl']; ?>" alt="Travel Image">
								<span><h4>$<?php echo $record['PkgBasePrice']; ?></h4></span>
							</div>
							<div class="card-desc">
								<h3><?php echo $record['PkgName']; ?></h3>
								<p><?php echo $record['PkgDesc']; ?></p>
								<p><?php echo $record['PkgStartDate']; ?></p>
								<p><?php echo $record['PkgEndDate']; ?></p>
								<a href="addtocart.php?id=<?php echo $record['PackageId']; ?>" class="btn btn-primary" role="button">Add to Cart</a>  
							</div>
						</div>
					</div>
					
					<?php 
				} 
				?>
				
			</div>
		</div>
	</section>

	

	<script>
		var date = document.getElementById("myelement").innerHTML;
		for(i = 0; i < date.length; i++) {
			console.log(date[i]);
		}
	</script>

	<!-- FOOTER -->
	<?php include 'templates/footer.php' ?>
	
	<!-- Bootstrap JS -->
	<script src="js/app.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+990DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- App JS -->
	<script type="text/javascript" src="js/login.js"></script>
</body>
</html>
