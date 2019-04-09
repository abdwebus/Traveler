<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Contact us</title>

	<!-- traveler Custom CSS -->

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/ariel.css">
	<link rel="stylesheet" type="text/css" href="css/styleliam.css">
	<link rel="stylesheet" type="text/css" href="css/contact.css">
	<link rel="stylesheet" type="text/css" href="css/team.css">

	<!-- css for pop text mouse over  -->

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	
	<!-- Bootstrap CSS -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	
	<!-- links for newsletter -->
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
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
					<h3 class="card-title2"><?php echo $record['AgncyCity']; ?>, <?php echo $record['AgncyCountry']; ?></h3>
					<p class="card-text">Office Address: <?php echo $record['AgncyAddress']; ?></p>
					<p class="card-text">Phone: <?php echo $record['AgncyPhone']; ?></p>
					<p class="card-text">Fax: <?php echo $record['AgncyFax']; ?></p>
					<a href="https://bit.ly/2I9On86" class="btn btn-primary" id="show-option" title="click here for map location"><i class="icon-edit icon-white">Calgary Downtown location</i></a>
					<a href="https://bit.ly/2I9On86" class="btn btn-primary" id="show-option" title="click here for map location"><i class="icon-edit icon-white">Okotoks Downtown Location</i></a>
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
        <h5 class="section-title h1">Travel Agent Team</h5>
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

<!-- team traveler -->

<div class="container content">
    <div class="heading">
        <h2>Our <strong>Great Team</strong></h2>
        <p>To try the most advanced business</p>
    </div><!-- //end heading -->

	<div class="row">
        <div class="col-sm-4">
            <div class="team-members">
                <div class="team-avatar">
                    <img class="img-responsive" src="http://keenthemes.com/assets/bootsnipp/member1.png" alt="">
                </div>
                <div class="team-desc">
                    <h4>Liam</h4>
                    <span>Marketing</span>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="team-members">
                <div class="team-avatar">
                    <img class="img-responsive" src="http://keenthemes.com/assets/bootsnipp/member2.png" alt="">
                </div>
                <div class="team-desc">
                    <h4>Ariel</h4>
                    <span>Founder</span>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="team-members">
                <div class="team-avatar">
                    <img class="img-responsive" src="http://keenthemes.com/assets/bootsnipp/member3.png" alt="">
                </div>
                <div class="team-desc">
                    <h4>Abed</h4>
                    <span>Director</span>
                </div>
            </div>
        </div>
    </div><!-- //end row -->
</div>

<br>
<br>
<center>
<strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">Traveler@Company</a></strong>
</center>
<br>
<br>
<!-- This live preview for <a href="http://en.wikipedia.org/">Wikipedia</a><div class="box"><iframe src="http://en.wikipedia.org/" width = "500px" height = "500px"></iframe></div> remains open on mouseover. -->
</section>
<section class="subscribe-area pb-50 pt-70">
<div class="container">
	<div class="row">

					<div class="col-md-4">
						<div class="subscribe-text mb-15">
							<span>JOIN OUR NEWSLETTER</span>
							<h2>subscribe newsletter</h2>
						</div>
					</div>
					<div class="col-md-8">
						<div class="subscribe-wrapper subscribe2-wrapper mb-15">
							<div class="subscribe-form">
								<form action="#">
									<input placeholder="enter your email address" type="email">
									<button>subscribe <i class="fas fa-long-arrow-alt-right"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>

</div>
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
	<script>
	$(function() {
		$( "#show-option" ).tooltip({
			show: {
			effect: "slideDown",
			delay: 300
			}
		});
	});
	</script>

</body>
</html>
