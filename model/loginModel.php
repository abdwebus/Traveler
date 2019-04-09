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
    		$userInfo = getUserInfo($connect, $row['userID']);
			echo "success";
			session_Start();
    		$_SESSION['userid'] = $row['userID'];
    		$_SESSION['userRole'] = $row['type'];
    		$_SESSION['userName'] = $userInfo['CustFirstName'];
			// header('Location: ../index.php');
    	} else {
    		echo "err";
    	}
    } else {
    	echo "err";
    }
}

function getUserInfo($db, $credentialID){
	$sql = "SELECT * FROM customers WHERE credentialID = '$credentialID'";
	$customerResult = mysqli_query($db, $sql);
	$customerRow = mysqli_fetch_assoc($customerResult);
	return $customerRow;
}
?>