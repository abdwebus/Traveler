<?php
// Author: Abdulwahab Alansari


// Handle the login process
if(isset($_POST)){
	include 'classes.php';
	$email = $_POST['email'];

	// Create DB connection
    include 'dbConnection.php';
	$sql = "SELECT * FROM credentials WHERE email = '$email'";
    $result=mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    if(isset($row)){
        // Verify the password hash matches the password recieved
    	if(password_verify($_POST['password'], $row['password'])){
            // Get user information e.g. name and role
    		$userInfo = getUserInfo($connect, $row['userID']);
			
            // Return success message to the sender
            echo "success";

            // Start session and assign required values
			session_Start();
    		$_SESSION['userid'] = $row['userID'];
    		$_SESSION['userRole'] = $row['type'];
    		$_SESSION['userName'] = $userInfo['CustFirstName'];
			// header('Location: ../index.php');
    	} else {
            // Return err if password is incorrect
    		echo "err";
    	}
    } else {
        // Return err if email does not exist in the database
    	echo "err";
    }
}

/*
* Gets user information from 'customers' table in db
*
* @param object $db: Database connection object
* @param string $credentialID: User id in the 'credential' table
*
* @return associativeArray: User information in associative array
*/
function getUserInfo($db, $credentialID){
	$sql = "SELECT * FROM customers WHERE credentialID = '$credentialID'";
	$customerResult = mysqli_query($db, $sql);
	$customerRow = mysqli_fetch_assoc($customerResult);
	return $customerRow;
}
?>