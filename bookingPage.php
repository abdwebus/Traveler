<?php 
	// Author: Abdulwahab Alansari

// Handle ajax call to delete bookings
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if(isset($_POST['bookingID'])){
		$bookingID = $_POST['bookingID'];
		include 'model/dbConnection.php';
		$sql = "DELETE FROM bookings WHERE BookingId='$bookingID'";
		if ($connect->query($sql) === TRUE) {
			echo "success";
		} else {
			echo "Error deleting record: " . $conn->error;
		}
	}
	exit;
}

if(!isset($_SESSION)){session_Start();}

// Create global variable to use when bookings available
$bookings = NULL;

// Proceed only when customer is signed in
if(isset($_SESSION['customerID'])){
	$customerID = $_SESSION['customerID'];

	// Create DB connection
	include 'model/dbConnection.php';
	$sql = "SELECT * FROM bookings WHERE CustomerId = '$customerID'";
	$bookingResults = mysqli_query($connect, $sql);
	while ($bookingRow = mysqli_fetch_assoc($bookingResults)){
		if(!isset($bookings)){$bookings = [];}
		$packageDetails = getPackageInfo($connect, $bookingRow['PackageId']);
		array_push($bookings, [
			'BookingId' => $bookingRow['BookingId'], 
			'BookingNo' => $bookingRow['BookingNo'],
			'BookingDate' => $bookingRow['BookingDate'],
			'PkgName' => $packageDetails['PkgName'],
			'PkgBasePrice' => $packageDetails['PkgBasePrice'],
			'PkgDesc' => $packageDetails['PkgDesc']
		]);
	}
} else {
	// User is not signed in
	header('Location: index.php');
}


function getPackageInfo($db, $packageID){
	$sql = "SELECT * FROM packages WHERE PackageId = '$packageID'";
	$packageResults = mysqli_query($db, $sql);
	$packageRow = mysqli_fetch_assoc($packageResults);
	return $packageRow;
}

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
			<?php 
			if(isset($bookings)){
				foreach ($bookings as $value){ ?>
					<div class="card text-left top-margin">
						<div class="card-header">
							<div class="float-left">
								<h4 class="text-secondary font-italic"><?php echo $value['BookingDate']; ?> </h4>	
							</div>
							<div class="float-right">
								<h5 class="text-success">Booking No. <?php echo $value['BookingNo']; ?> </h5>
							</div>

						</div>
						<div class="card-body">
							<h4 class="card-title text-uppercase"><?php echo $value['PkgName']; ?></h4>
							<p class="card-text"><?php echo $value['PkgDesc']; ?></p>
							<button onclick="deleteBooking(<?php echo $value['BookingId']; ?>)" class="btn btn-danger">Cancel booking</button>
						</div>
						<div class="card-footer text-muted">
							CAD<?php echo $value['PkgBasePrice']; ?>
						</div>
					</div>
				<?php }} else { ?>
					<h4 class="text-secondary font-italic">You don't have bookings yet.</h4>
				<?php } ?>
			</main>

			<!-- FOOTER -->
			<?php include 'templates/footer.php' ?>
		</div>

		<!-- Bootstrap JS -->
		<script
		src="https://code.jquery.com/jquery-3.3.1.js"
		integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
		crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<!-- App JS -->
		<script src="js/app.js"></script>
	</body>
	</html>