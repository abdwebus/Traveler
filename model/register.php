<?php

include 'dbConnection.php';
include 'classes.php';


if (isset($_POST)){
	$credentialID = createCredential($connect);
	createCustomer($_POST, $credentialID, $connect);
}

function createCustomer($post, $credentialID, $db){
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

function createCredential($db){
	$user = new User($_POST['email'], $_POST['password']);
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

function createCustomerObject($arr){
	$country = 'Canada';
	$customer = new Customer();
	$customer->setFirstName($_POST['firstName']);
	$customer->setLastName($_POST['lastName']);
	$customer->setBusinessPhone($_POST['businessPhone']);
	$customer->setHomePhone($_POST['homePhone']);
	$customer->setAddress($_POST['address2'] . ' - ' . $_POST['address1']);
	$customer->setCity($_POST['city']);
	$customer->setProvince($_POST['province']);
	$customer->setPostal($_POST['zip']);
	$customer->setCountry($country);
	$customer->setEmail($_POST['email']);
	return $customer;
}


?>