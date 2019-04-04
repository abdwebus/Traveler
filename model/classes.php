<?php 

class User {
	private $userID;
	private $email;
	private $password;
	private $createdDate;
	private $modifiedDate;
	private $userType;

	public function __construct($email, $password, $userType = 'customer'){
		$this->email = $email;
		$this->password = $password;
		
		date_default_timezone_set('UTC');
		$today = date('Y-m-d');
		$this->createdDate = $today;
		$this->modifiedDate = $today;
		$this->userType = $userType;
	}

	//UserID
    public function getUserID()
    {
        return $this->userID;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
        
        //Update modifiedDate
        $today = date('Y-m-d');
		$this->modifiedDate = $today;
    }


    //Email
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        //Update modifiedDate
        $today = date('Y-m-d');
		$this->modifiedDate = $today;
    }


    //Password
    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;

        //Update modifiedDate
        $today = date('Y-m-d');
		$this->modifiedDate = $today;
    }


    //CreatedDate
    public function getCreatedDate()
    {
        return $this->createdDate;
    }


    //ModifiedDate
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }


    //UserType
    public function getUserType()
    {
        return $this->userType;
    }

    public function setUserType($userType)
    {
        $this->userType = $userType;

        //Update modifiedDate
        $today = date('Y-m-d');
		$this->modifiedDate = $today;

    }
}

class Person{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $businessPhone;
    private $credentialID;


    public function __construct(){

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

   
    public function getLastName()
    {
        return $this->lastName;
    }

    
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getBusinessPhone()
    {
        return $this->businessPhone;
    }

    public function setBusinessPhone($businessPhone)
    {
        $this->businessPhone = $businessPhone;
    }

    public function getCredentialID()
    {
        return $this->credentialID;
    }

    public function setCredentialID($credentialID)
    {
        $this->credentialID = $credentialID;
    }
}

class Customer extends Person{
    private $address;
    private $city;
    private $province;
    private $postal;
    private $country;
    private $homePhone;

    public function __construct(){
        parent::__construct();
    }

   
    public function getAddress()
    {
        return $this->address;
    }

   
    public function setAddress($address)
    {
        $this->address = $address;
    }

   
    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function setProvince($province)
    {
        $this->province = $province;
    }

    public function getPostal()
    {
        return $this->postal;
    }

    public function setPostal($postal)
    {
        $this->postal = $postal;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getHomePhone()
    {
        return $this->homePhone;
    }

    public function setHomePhone($homePhone)
    {
        $this->homePhone = $homePhone;
    }
}

class Agent extends Person{
    private $position;
    private $agencyID;


    public function __construct(){
        parent::__construct();
    }
    
    public function getPosition()
    {
        return $this->position;
    }

    
    public function setPosition($position)
    {
        $this->position = $position;
    }

   
    public function getAgencyID()
    {
        return $this->agencyID;
    }

    
    public function setAgencyID($agencyID)
    {
        $this->agencyID = $agencyID;
    }
}



?>