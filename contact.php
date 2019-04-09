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
	<link rel="stylesheet" type="text/css" href="css/team.css">
	
	<!-- Bootstrap CSS -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	
	<!-- team agents links -->
	
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	
	<Header>
    	<?php include 'templates/header.php' ?>
		<?php include 'templates/subheader.php' ?>
	</header>
		
		
	<main class="container">
		<!-- agencies -->
		<?php
 	 		include_once("models/connect.php");
 	 		$query = "SELECT * FROM agencies ";
 	 		$results = mysqli_query($connect, $query) or die("database error:". mysqli_error($connect));
  		?>
		<div class="row">
		<?php while( $record = mysqli_fetch_assoc($results) ) { ?>  
			<div class="card" style="width: 45%;">
				<img class="card-img-top" src="<?php echo $record['AgcImg']; ?>" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title"><?php echo $record['AgncyCity']; ?> <?php echo $record['AgncyProv']; ?>, <?php echo $record['AgncyCountry']; ?></h5>
					<p class="card-text">Office Address: <?php echo $record['AgncyAddress']; ?></p>
					<p class="card-text">Phone: <?php echo $record['AgncyPhone']; ?></p>
					<p class="card-text">Fax: <?php echo $record['AgncyFax']; ?></p>
					<!-- <a href="agents.php" class="btn btn-primary">Agents</a>
					<a href="#" class="btn btn-primary">Location</a> -->
				</div>
			</div>
		<?php } ?>
		</div>
	</main>
	<!-- agents -->
	
		<?php
 	 		include_once("models/connect.php");
 	 		$query = "SELECT * FROM agents";
 	 		$results = mysqli_query($connect, $query) or die("database error:". mysqli_error($connect));
  		?>
	
		
		
		
<section id="team" class="pb-5">
    <div class="container">
        <h5 class="section-title h1">OUR TEAM</h5>
        <div class="row">
		<?php while( $record = mysqli_fetch_assoc($results) ){?>
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?php echo $record['AgtImg']; ?>" alt="card image"></p>
                                    <h4 class="card-title">Travel Expert</h4>
									<p class="card-text"><?php echo $record['AgtFirstName']; ?> <?php echo $record['AgtLastName']; ?>,
														 <?php echo $record['AgtBusPhone']; ?></p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
						</div>
					
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title"><?php echo $record['AgtPosition']; ?></h4>
                                    <p class="card-text"><?php echo $record['AgtEmail']; ?></p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<!-- ./Team member -->
			<?php }?>
        </div>
    </div>
</section>
 <!-- insert map here -->
<section class="container">



</section>
<!-- Team -->

	<!-- FOOTER -->
	<?php include 'templates/footer.php' ?>
			
		

  
<!-- Bootstrap JS -->
	<script src="js/app.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- mouse over -->

</body>
</html>
