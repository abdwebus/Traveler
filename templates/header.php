<!-- <header>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a class="navbar-brand" href="#">Carousel</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
				</li>
			</ul>
			<form class="form-inline mt-2 mt-md-0">
				<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
</header> -->
<?php 
	session_Start();
?>
<header>
	<nav class="fixed-top">
		<div class="menu-icon">
			<i class="fa fa-bars fa-2x"></i>
		</div>
		<div class="logo">
			TRAVELER
		</div>
		<div class="menu">
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li><a href="destinations.php">DESTINATIONS</a></li>
				<li><a href="contact.php">CONTACT</a></li>
				<li><a href="cart.php">CART</a></li>
				<?php 
					if(isset($_SESSION['userid'])){
						$dropDown = '<li class="nav-item dropdown">
							        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
						$dropDown .= $_SESSION["userName"];
						$dropDown .='</a>
							        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
							          <a class="dropdown-item" href="#">Booking</a>
							          <a class="dropdown-item" href="cart.php">Cart</a>
							          <div class="dropdown-divider"></div>
							          <a class="dropdown-item" id="Logout" href="logout.php">Logout</a>
							        </div>
							      </li>';
						
						echo $dropDown;
					} else {
						echo "<li><a style='cursor: pointer;' id='signup' onclick='showSignup()'>REGISTER</a></li>";
						echo "<li><a style='cursor: pointer;' id='login' onclick='showLogin()'>LOGIN</a></li>";
					}
				?>
			</ul>
		</div>
	</nav>
</header>