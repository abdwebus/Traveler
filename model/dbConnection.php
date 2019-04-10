<?php
// Author: Abdulwahab Alansari 

// Create connection to remote database 
$connect = mysqli_connect('remotemysql.com', 'oeOIZTGN6X', 'SEZXQjCoW0', 'oeOIZTGN6X', '3306');
if (!$connect) {
	die(mysql_error());
}
?>