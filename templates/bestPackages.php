<?php 
$count = 1;
$date = date("Y-m-d H:i:s");

// Create DB connection
$db = mysqli_connect('localhost', 'agent', '', 'travelexperts');
if (!$db) {
	die(mysql_error());
}
$sql = "SELECT * FROM packages WHERE `PkgEndDate` > '$date' ORDER BY PkgBasePrice LIMIT 3 ";
$result = mysqli_query($db, $sql);
while ($row = mysqli_fetch_assoc($result)){
	if($count % 2 == 0){
		include 'templates/rowPackageLeft.php';
	} else {
		include 'templates/rowPackageRight.php';
	}
	$count++;
}
?>