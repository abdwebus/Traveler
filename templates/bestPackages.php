<?php $titleheader = "Popular Destinations"; ?>
<?php $titledescription = "Affordable Pacakages We Know You'll Love"; ?>
<?php include 'templates/titletext.php' ?>

<?php
// Author: Abdulwahab Alansari

// The objective to list the top 3 best price packages

// We want to insert two rows of packages with the image on the right
// and one package row in between with the image on the left
// the count variable here help us determin that.
$count = 1;

// Today's date formated as per the database
$date = date("Y-m-d H:i:s");

// Create DB connection
include 'model/dbConnection.php';

// Retrieve the top 3 unexpired packages ordered by lowest price to highest
$sql = "SELECT * FROM packages WHERE `PkgEndDate` > '$date' ORDER BY PkgBasePrice LIMIT 3 ";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($result)){
	if($count % 2 == 0){
		// Insert the left image package when count is even
		include 'templates/rowPackageLeft.php';
	} else {
		// Insert the right image package when count is odd 
		include 'templates/rowPackageRight.php';
	}
	$count++;
}
?>