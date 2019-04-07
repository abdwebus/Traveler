<!-- Author: Abdulwahab Alansari -->
<?php

if(isset($_POST)){
	include 'classes.php';
	$user = new User($_POST['email'], $_POST['password']);
	$email = $user->getEmail();

	// Create DB connection
	$connect = mysqli_connect('localhost', 'agent', '', 'travelexperts');
	if (!$connect) {
		die(mysql_error());
	}

	$sql = "SELECT * FROM credentials WHERE email = '$email'";
    $result=mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    if(isset($row)){
    	echo $row['email'];
    	echo '</br>';
    	echo $row['password'];
    }
}
?>