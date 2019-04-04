<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travelexperts";
    $connect = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

?>