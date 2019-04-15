<!-- Author: Ariel Contreras -->
<!-- Establish connection to DB -->
<?php

	// Connecting to local database

	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travelexperts";

    $connect = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

	// Uncomment below to connect to remote db 

    // $servername = "remotemysql.com";
    // $username = "oeOIZTGN6X";
    // $password = "SEZXQjCoW0";
    // $dbname = "oeOIZTGN6X";

    // $connect = mysqli_connect($servername, $username, $password, $dbname, '3306') or die("Connection failed: " . mysqli_connect_error());

?>

