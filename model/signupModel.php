<!-- Author: Abdulwahab Alansari -->
<?php
if (isset($_POST)){
	$valid = validatePost($_POST); 
	if ($valid != ''){
		echo $valid;
		header ("refresh:5; url=../index.php");
	} else {
		include 'classes.php';

		// Create DB connection
		include 'dbConnection.php';
		$credentialID = createCredential($connect, $_POST);
		createCustomer($connect, $_POST, $credentialID);
		$customerInfo = getUserInfo($connect, $credentialID);
		mysqli_close($connect);
		if(!isset($_SESSION)){session_Start();}
		$_SESSION['userid'] = $credentialID;
		$_SESSION['userName'] = $customerInfo['CustFirstName'];
		$_SESSION['userRole'] = 'customer';
		$_SESSION['customerID'] = $customerInfo['CustomerId'];
		header('Location: ../index.php');
		exit;
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


/*
* Creates customer in the customers table
*
* @param object $db: Database connection object
* @param dictionary $post: $_POST
* @param string $credentialID: User id in the 'credential' table
*
* @return associativeArray: User information in associative array
*/
function createCustomer($db, $post, $credentialID){
	$AGENTID = 20; //online agent

	// Creates a customer object
	$customer = createCustomerObject($post);

	// Extract customer information
	$firstName = $customer->getFirstName();
	$lastName = $customer->getLastName();
	$address = $customer->getAddress();
	$city = $customer->getCity();
	$province = $customer->getProvince();
	$postal = $customer->getPostal();
	$country = $customer->getCountry();
	$homePhone = $customer->getHomePhone();
	$businessPhone = $customer->getBusinessPhone();
	$email = $customer->getEmail();

	// SQL statement to insert customer into customers table
	$sql = "INSERT INTO customers 
	(CustFirstName, CustLastName, CustAddress, CustCity, CustProv, CustPostal, CustCountry, CustHomePhone, CustBusPhone, CustEmail, AgentId, credentialID)
    VALUES ('$firstName', '$lastName', '$address', '$city', '$province', '$postal', '$country', '$homePhone', '$businessPhone', '$email', $AGENTID, $credentialID)";

    // Execute database query
    if ($db->query($sql) === TRUE) {
   		echo 'Customer created';
   	} else {
   		echo 'Error occured in customer ' . $db->error;
   	}
}

function createCredential($db, $post){
	$user = new User($post['email'], $post['password']);
	$email = $user->getEmail();
	$password = $user->getPassword();
	$createdDate = $user->getCreatedDate();
	$modifiedDate = $user->getModifiedDate();
	$userType = $user->getUserType();

	$sql = "INSERT INTO credentials 
	(email, password, createdDate, modifiedDate, type)
    VALUES ('$email', '$password', '$createdDate', '$modifiedDate', '$userType')";

    if ($db->query($sql) === TRUE) {
   		return $db->insert_id;
   	} else {
   		echo 'Error occured in credentials ' . $db->error;
   	}
}

/*
* Helper function to create customer object from $_POST
*
* @param dictionary $post: $_POST
*
* @return Customer object: Customer object populated with all customer information
*/
function createCustomerObject($post){
	$country = 'Canada';
	$customer = new Customer();
	$customer->setFirstName($post['firstName']);
	$customer->setLastName($post['lastName']);
	$customer->setBusinessPhone($post['businessPhone']);
	$customer->setHomePhone($post['homePhone']);
	$customer->setAddress($post['address2'] . ' - ' . $post['address1']);
	$customer->setCity($post['city']);
	$customer->setProvince($post['province']);
	$customer->setPostal($post['zip']);
	$customer->setCountry($country);
	$customer->setEmail($post['email']);
	return $customer;
}

/*
* Validates $_POST
*
* @param dictionary $post: $_POST
*
* @return string: $response empty string when $_POST is valid
*/
function validatePost($post){
	$response = '';
	$response .= validateEmail($post['email']);
	$response .= validatePassword($post['password'], $post['confirmPassword']);
	$response .= ($post['firstName'] === '') ? 'First name is required </br>' : '';
	$response .= ($post['lastName'] === '') ? 'Last name is required </br>' : '';
	$response .= (!isAlpha($post['firstName'])) ? 'First name is invalid </br>' : '';
	$response .= (!isAlpha($post['lastName'])) ? 'Last name is invalid </br>' : '';
	$response .= validateBusinessPhoneNumber($post['businessPhone']);
	$response .= validateHomePhoneNumber($post['homePhone']);
	$response .= ($post['address1'] === '' || $post['address2'] === '') ? 'Complete address is required </br>' : '';
	$response .= ($post['city'] === '') ? 'City is required </br>' : '';
	$response .= (!isAlpha($post['city'])) ? 'City is invalid </br>' : '';
	$response .= ($post['province'] === '') ? 'Province is required </br>' : '';
	$response .= validateZipCode($post['zip']);
	
	return $response;

}

/*
* Validate email address
*
* @param string $string: Email address
*
* @return string: empty string when email is valid
*/
function validateEmail($string){
	if($string == '') {return 'Email is required! </br>';}
	if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $string)){
		return 'Email is invalid </br>';
	}
	return '';
}

/*
* Validate password
*
* @param string $password: password
* @param string $confirmPassword: Confirm Password
*
* @return string: empty string when password is valid
*/
function validatePassword($password, $confirmPassword){
	if($password === '' || $confirmPassword === ''){
		return 'Password fields are required </br>';
	}

	if($password != $confirmPassword) {
		return "Passwords don't match </br>";
	}
	return '';
}

/*
* Validate business phone number
*
* @param string $string: Business phone number
*
* @return string: empty string when business phone number is valid
*/
function validateBusinessPhoneNumber($string){
	if($string == '') {return 'Business Phone number is required </br>';}
	if(!preg_match("/^\d{10}$/", $string)){
		return 'Business phone number is invalid </br>';
	}
	return '';
}

/*
* Validate home phone number
*
* @param string $string: Home phone number
*
* @return string: empty string when home phone number is valid
*/
function validateHomePhoneNumber($string){
	if($string == '') {return '';}
	if(!preg_match("/^\d{10}$/", $string)){
		return 'Home phone number is invalid </br>';
	}
	return '';
}

/*
* Validate whether the input contains only alpha characters
*
* @param string $string: The string to validate
*
* @return bool: Whether the input contains only alpha characters
*/
function isAlpha($string){
	if(preg_match("/\d/", $string)){
		return false;
	}
	return true;
}


/*
* Validate zip code matches Canadian zip code format 
*
* @param string $string: Zip code
*
* @return string: empty string when zip code is valid
*/
function validateZipCode($string){
	if($string == '') {return 'Zip code is required </br>';}
	if(!preg_match("/^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/", $string)){
		return 'Zip code is invalid </br>';
	}
	return '';
}
?>