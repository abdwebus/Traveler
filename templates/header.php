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
				<?php 
					if(isset($_SESSION['userid'])){
						$dropDown = '<li class="nav-item dropdown">
							        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
						$dropDown .= $_SESSION["userName"];
						$dropDown .='</a><div class="dropdown-menu" aria-labelledby="navbarDropdown">';
						if($_SESSION['userRole'] == 'admin') {
							$dropDown .= '<a class="dropdown-item" href="packages.php">Admin</a>';
						} else {
							$dropDown .= '<a class="dropdown-item" href="bookingPage.php">Booking</a>
							          	<a class="dropdown-item" href="cart.php">Cart</a>';
						}
						
						$dropDown .= '<div class="dropdown-divider"></div>
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