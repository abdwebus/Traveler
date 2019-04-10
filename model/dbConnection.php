<?php 
	$connect = mysqli_connect('remotemysql.com', 'oeOIZTGN6X', 'SEZXQjCoW0', 'oeOIZTGN6X', '3306');
	if (!$connect) {
		die(mysql_error());
	}
	// $connect = mysqli_connect('localhost', 'agent', '', 'travelexperts');
	// if (!$connect) {
	// 	die(mysql_error());
	// }
?>