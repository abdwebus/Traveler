<?php 
	// Author: Abdulwahab Alansari
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Booking</title>

	
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/ariel.css">
	<link rel="stylesheet" type="text/css" href="css/contact.css">

	<!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/cover/"> -->

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


	<style>

		.marginAround{
			margin: 50px;
		}

		.top-margin{
			margin-top: 50px;
		}

		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}
	</style>
	<!-- Custom styles for this template -->
	<!-- <link href="cover.css" rel="stylesheet"> -->
</head>
<body class="text-center">
	<?php $title = "BOOKINGS"; ?>
	<div class="cover-container d-flex w-100 h-100 mx-auto flex-column">
		<!-- Navbar -->
		<?php include 'templates/header.php' ?>

		<!-- Subheader -->
		<?php include 'templates/subheader.php' ?>

		<main role="main" class="inner cover marginAround">
			<h1 class="cover-heading">Control all your bookings in one place</h1>
			<hr class="featurette-divider">
			<div class="card text-left top-margin">
				<div class="card-header">
					Featured
				</div>
				<div class="card-body">
					<h5 class="card-title">Special title treatment</h5>
					<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
					<a href="#" class="btn btn-danger">Cancel booking</a>
				</div>
			</div>
		</main>

		<!-- FOOTER -->
		<?php include 'templates/footer.php' ?>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/app.js"></script>
</body>
</html>