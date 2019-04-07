<!-- Author: Abdulwahab Alansari -->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Traveler</title>

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="css/carousel.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/ariel.css">
	<link rel="stylesheet" type="text/css" href="css/contact.css">


	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<!-- Header -->
	<?php include 'templates/header.php' ?>

	<main role="main">

		<!-- Login -->
		<?php include 'login.php' ?>
		<?php include 'signup.php' ?>
		
		<!-- Carousel -->
		<?php include 'templates/carousel.php' ?>


		<div class="container marketing">
			<!-- Contact Us -->
			<?php include 'templates/rowContactUs.php' ?>

			<hr class="featurette-divider">

			<!-- Package row (right) -->
			<?php include 'templates/rowPackageRight.php' ?>

			<hr class="featurette-divider">

			<!-- Package row (left) -->
			<?php include 'templates/rowPackageLeft.php' ?>

			<hr class="featurette-divider">

			<!-- Package row (right) -->
			<?php include 'templates/rowPackageRight.php' ?>

			<hr class="featurette-divider">
		</div>


		<!-- FOOTER -->
		<?php include 'templates/footer.php' ?>
	</main>

	<!-- Bootstrap JS -->
	<script
  	src="https://code.jquery.com/jquery-3.3.1.js"
  	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- App JS -->
	<script type="text/javascript" src="js/login.js"></script>
	<script src="js/app.js"></script>

</body>
</html>
