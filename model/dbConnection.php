<?php
// Author: Abdulwahab Alansari 

// Connecting to local database
// $connect = mysqli_connect('localhost', 'root', '', 'travelexperts');
// if (!$connect) {
// 	die(mysql_error());
// }


// Uncomment below to connect remote db

$connect = mysqli_connect('remotemysql.com', 'oeOIZTGN6X', 'SEZXQjCoW0', 'oeOIZTGN6X', '3306');
if (!$connect) {
	die(mysql_error());
}
?>