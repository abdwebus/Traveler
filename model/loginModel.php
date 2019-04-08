<?php
// Author: Abdulwahab Alansari

if(isset($_POST)){
	include 'classes.php';
	$email = $_POST['email'];

	// Create DB connection
	$connect = mysqli_connect('localhost', 'agent', '', 'travelexperts');
	if (!$connect) {
		die(mysql_error());
	}

	$sql = "SELECT * FROM credentials WHERE email = '$email'";
    $result=mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    if(isset($row)){
    	if(password_verify($_POST['password'], $row['password'])){
			echo "success";
			session_Start();
    		$_SESSION['userid'] = $row['userID'];
			// header('Location: ../index.php');
    	} else {
    		echo "err";
    	}
    } else {
    	echo "err";
    }
}
?>