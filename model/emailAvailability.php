<?php
// Author: Abdulwahab Alansari


// Verify email address is available and hasn't been already used
if(isset($_POST)){
	$email = $_POST['email'];

	// Create DB connection
	include 'dbConnection.php';
	$sql = "SELECT * FROM credentials WHERE email = '$email'";
	$result=mysqli_query($connect, $sql);
	$row = mysqli_fetch_assoc($result);
	if(isset($row)){
		// return err if email address found in the database
		echo "err";
	} else {
		// return success if email address is not found in the database
		echo 'success';
	}
}
?>