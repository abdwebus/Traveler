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
		$connect = mysqli_connect('localhost', 'agent', '', 'travelexperts');
		if (!$connect) {
			die(mysql_error());
		}
		$credentialID = createCredential($connect, $_POST);
		createCustomer($connect, $_POST, $credentialID);
		$customerInfo = getUserInfo($connect, $credentialID);
		mysqli_close($connect);
		session_Start();
		$_SESSION['userid'] = $credentialID;
		$_SESSION['userName'] = $customerInfo['CustFirstName'];
		$_SESSION['userRole'] = 'customer';
		header('Location: ../index.php');
		exit;
	}
}

function getUserInfo($db, $credentialID){
	$sql = "SELECT * FROM customers WHERE credentialID = '$credentialID'";
	$customerResult = mysqli_query($db, $sql);
	$customerRow = mysqli_fetch_assoc($customerResult);
	return $customerRow;
}

function createCustomer($db, $post, $credentialID){
	$AGENTID = 10; //online agent
	$customer = createCustomerObject($post);

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


	$sql = "INSERT INTO customers 
	(CustFirstName, CustLastName, CustAddress, CustCity, CustProv, CustPostal, CustCountry, CustHomePhone, CustBusPhone, CustEmail, AgentId, credentialID)
    VALUES ('$firstName', '$lastName', '$address', '$city', '$province', '$postal', '$country', '$homePhone', '$businessPhone', '$email', $AGENTID, $credentialID)";

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

function validateEmail($string){
	if($string == '') {return 'Email is required! </br>';}
	if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $string)){
		return 'Email is invalid </br>';
	}
	return '';
}

function validatePassword($password, $confirmPassword){
	if($password === '' || $confirmPassword === ''){
		return 'Password fields are required </br>';
	}

	if($password != $confirmPassword) {
		return "Passwords don't match </br>";
	}
	return '';
}

function validateBusinessPhoneNumber($string){
	if($string == '') {return 'Business Phone number is required </br>';}
	if(!preg_match("/^\d{10}$/", $string)){
		return 'Business phone number is invalid </br>';
	}
	return '';
}

function validateHomePhoneNumber($string){
	if($string == '') {return '';}
	if(!preg_match("/^\d{10}$/", $string)){
		return 'Home phone number is invalid </br>';
	}
	return '';
}

function isAlpha($string){
	if(preg_match("/\d/", $string)){
		return false;
	}
	return true;
}

function validateZipCode($string){
	if($string == '') {return 'Zip code is required </br>';}
	if(!preg_match("/^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/", $string)){
		return 'Zip code is invalid </br>';
	}
	return '';
}
?>