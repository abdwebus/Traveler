<?php 
	$connect = mysqli_connect('localhost', 'agent', '', 'travelexperts');
	if (!$connect) {
		die(mysql_error());
	}
?>