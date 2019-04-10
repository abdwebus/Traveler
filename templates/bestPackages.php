<?php 
$count = 1;
$date = date("Y-m-d H:i:s");

// Create DB connection
include 'model/dbConnection.php';
$sql = "SELECT * FROM packages WHERE `PkgEndDate` > '$date' ORDER BY PkgBasePrice LIMIT 3 ";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($result)){
	if($count % 2 == 0){
		include 'templates/rowPackageLeft.php';
	} else {
		include 'templates/rowPackageRight.php';
	}
	$count++;
}
?>