<!-- Author: Ariel Contreras -->
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
	<?php $title = "ADMIN PAGE"; ?>
	<!-- Navbar -->
	<?php include 'templates/header.php' ?>

	<!-- Subheader -->
	<?php include 'templates/subheader.php' ?>

    <!-- Form -->
		<article class="centerDiv container">
			<div class="jumbotron centerDiv">
				<h1 class="display-4">Travel Package Entry</h1>
				<hr class="my-4">
				<form method="POST" action="models/packagesinsert.php">
					<div class="form-group">
						<label for="PkgImgUrl">Travel Package Image</label>
						<input type="text" name="PkgImgUrl" class="form-control" placeholder="Package Image URL" required onfocus="toggleP('name')" onblur="toggleP('name')">
						<small class="hide form-text text-muted">Please enter an image URL</small>
					</div>
					<div class="form-group">
						<label for="PkgName">Travel Package Name</label>
						<input type="text" name="PkgName" class="form-control" placeholder="Package Name" required onfocus="toggleP('email')" onblur="toggleP('email')">
						<small class="hide form-text text-muted">Please enter a package name</small>
					</div>
					<div class="form-group">
						<label for="PkgDesc">Travel Package Description</label>
						<input type="text" name="PkgDesc" class="form-control" placeholder="Package Description" onfocus="toggleP('phone')" onblur="toggleP('phone')" required>
						<small class="hide form-text text-muted">Please enter a package description</small>
					</div>
					<div class="form-group">
						<label for="PkgStartDate">Travel Package Start Date</label>
						<input type="text" name="PkgStartDate" class="form-control" placeholder="YYYY-MM-DD" onfocus="toggleP('postalcode')" onblur="toggleP('postalcode')" required>
						<small class="hide form-text text-muted">Please enter a start date in this format YYYY-MM-DD</small>
					</div>
					<div class="form-group">
						<label for="PkgEndDate">Travel Package End Date</label>
						<input type="text" name="PkgEndDate" class="form-control" placeholder="YYYY-MM-DD" onfocus="toggleP('postalcode')" onblur="toggleP('postalcode')" required>
						<small class="hide form-text text-muted">Please enter an end date in this format YYYY-MM-DD</small>
					</div>
					<div class="form-group">
						<label for="PkgBasePrice">Travel Package Price</label>
						<input type="text" name="PkgBasePrice" class="form-control" placeholder="1000" onfocus="toggleP('postalcode')" onblur="toggleP('postalcode')" required>
						<small class="hide form-text text-muted">Please enter your package price</small>
                    </div>
					<input type="submit" name="submit" data-rel="back" class="btn btn-primary btn-lg btn-block">
                </form> 
            </div>
        </article>
  	<!-- FOOTER -->
  	<?php include 'templates/footer.php' ?>


  <!-- Bootstrap JS -->
  <script src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+990DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
