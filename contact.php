<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Contact us</title>

	<!-- Custom CSS -->

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/ariel.css">
	<link rel="stylesheet" type="text/css" href="css/styleliam.css">
	<link rel="stylesheet" type="text/css" href="css/contact.css">
	



	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	 <Header>
    	<?php include 'templates/header.php' ?>
		<?php include 'templates/subheader.php' ?>
	
	
			<div>
				<!-- /*mouseover*/ -->
			<!-- <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" border="0" src="smiley.gif" alt="Smiley" width="32" height="32"> -->
				<!-- ends here -->
			<?php
 	 		include_once("models/connect.php");
 	 		$query = "SELECT * FROM agencies";
 	 		$results = mysqli_query($connect, $query) or die("database error:". mysqli_error($connect));
  			?> 
			</div>

						
			<?php
			while( $record = mysqli_fetch_assoc($results) ) {
			?>  
		<main>

	

				<div class="row">
			    <div class="card" style="width: 18rem;">
				<img class="card-img-top" src="https://bit.ly/2D2fE8j" alt="Card image cap">
  				<div class="card-body">
    			<h5 class="card-title"><?php echo $record['AgncyCity']; ?> <?php echo $record['AgncyProv']; ?>, <?php echo $record['AgncyCountry']; ?></h5>
				<p class="card-text">Office Address: <?php echo $record['AgncyAddress']; ?></p>
				<p class="card-text">Phone: <?php echo $record['AgncyPhone']; ?></p>
				<p class="card-text">Fax: <?php echo $record['AgncyFax']; ?></p>
				<a href="agents.php" class="btn btn-primary">Agents</a>
				<a href="#" class="btn btn-primary">Location</a>
				
				
			</div>
  			</div>
		
	
			<?php 
			} 
			?>  
		
			</div>
			</div> <!-- Container end -->
		</main>		
			<!-- FOOTER -->
			<?php include 'templates/footer.php' ?>
			
			

  
<!-- Bootstrap JS -->
	<script src="js/app.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- mouse over -->

</body>
</html>
