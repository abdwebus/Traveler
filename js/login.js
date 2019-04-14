// Author: Abdulwahab Alansari


var loginModal = document.getElementById('modal-wrapper');
var signupModal = document.getElementById('signupModal-wrapper');
var currentTab = 0; // Current tab is set to be the first tab (0)

// Create event handler on the login window close button
document.getElementById('loginCloseButton').addEventListener('click', function(){
	hideLogin();
});

// Create event handler on the signup window close button
document.getElementById('signupCloseButton').addEventListener('click', function(){
	hideSignup();
});

/**
 * Handles the login process.
 * 
 * Makes an ajax call
 * On success, the page reload
 * On failure, user is informed
 */
function login(){
	email = document.getElementById('loginEmail');
	password = document.getElementById('loginPassword');

	// Validate email address
	if(!validateEmail(email)){
		return;
	}

	// Validate password
	if(!hasContent(password)){
		return;
	}

	// Create ajax call
	var request = $.ajax({
		url: 'model/loginModel.php',
		type: "POST",
		data: {
			email: $('#loginEmail').val(),
			password: $('#loginPassword').val(),
		},
		dataType: "html"
	});

	// Handle ajax call response
	request.done(function(msg) {
		password = document.getElementById('loginPassword');
		email = document.getElementById('loginEmail');
		if(msg === 'err'){
			document.getElementById('loginInvalid').style.display = 'block';
		}
		if(msg === 'success'){
			document.getElementById('loginInvalid').style.display = 'none';
			flagAsValid(password);
			flagAsValid(email);
			location.reload();
		}
	});

	// Handle ajax call failure
	request.fail(function(jqXHR, textStatus) {
		alert( "Request failed: " + textStatus );
	});
}

/**
 * Show signup window.
 */
function showSignup(){
	showTab(currentTab); // Display the current tab
	signupModal.style.display='block';
}

/**
 * Show the login window.
 */
function showLogin(){
	loginModal.style.display='block';
}

/**
 * Hide the login window.
 */
function hideLogin(){
	loginModal.style.display='none';
}

/**
 * Hide signup window and reset all values to default.
 */
function hideSignup(){
	signupModal.style.display='none';
	resetSignup();
}



/**
 * Reset signup form to its default status.
 */
function resetSignup() {
	currentTab = 0;

	var x = document.getElementsByClassName("tab");
	
	// Loop through all tab tags
	for(var i = 0; i < x.length; i++){
		
		// Hide all tabs
		x[i].style.display = "none";
		
		// Loop throught all forms and default their values
		y = x[i].getElementsByClassName("form-control");
		for(var j = 0; j < y.length; j++){

			if (y[j].name == 'province') {
				y[j].selectedIndex = 0;
			} else {
				y[j].value = '';	
				y[j].classList.remove("is-valid");
			}
		}
	}

	// Loop through steps and default their status
	var steps = document.getElementsByClassName("step");
	for (i = 0; i < steps.length; i++) {
		steps[i].className = steps[i].className.replace(" finish", "");
	}
}

/**
 * Handle the logic of showing the right signup form step.
 *
 * @param {int}	n 	Identifies whether to move forward or backward
 *
 */
function showTab(n) {
	var x = document.getElementsByClassName("tab");
	x[n].style.display = "block";

	if (n == 0) {
		// Hide previous button since this is the first step
		document.getElementById("prevBtn").style.display = "none";
	} else {
		// Show the previous button
		document.getElementById("prevBtn").style.display = "inline";
	}
	if (n == (x.length - 1)) {
		// Show submit button since this is the last step
		document.getElementById("nextBtn").innerHTML = "Submit";
	} else {
		// Show Next button since this is not the last step
		document.getElementById("nextBtn").innerHTML = "Next";
	}
	// ... and run a function that displays the correct step indicator:
	fixStepIndicator(n)
}

/**
 * Handles the stepping forward or backward of the signup form.
 *
 * @param {int}	n 	Indicator whether to move forward or backword
 */
function nextPrev(n) {
	var x = document.getElementsByClassName("tab");
	// Exit the function if any field in the current tab is invalid:
	if (n == 1 && !validateForm()) return false;

	if (currentTab == 0){
		validateEmailAvailability(function(result){
			if(result) {
				// Hide the current tab:
				x[currentTab].style.display = "none";
				currentTab = currentTab + n;
				showTab(currentTab);
			} else {
				return;
			}
		});
	} else {
		// Hide the current tab:
		x[currentTab].style.display = "none";
		currentTab = currentTab + n;
		// if you have reached the end of the form... :
		if (currentTab >= x.length) {
			signupModal.style.display='none';
			//...the form gets submitted:
			document.getElementById("regForm").submit();
			return false;
		} 
		// Otherwise, display the correct tab:
		showTab(currentTab);
	}
}

/**
 * Validate all form elemenmts.
 *
 * It goes through all visible elements and calls appropriate validation functions
 */
function validateForm() {
	var x, y, i, valid = true, result = true;
	x = document.getElementsByClassName("tab");
	y = x[currentTab].getElementsByClassName("form-control");
	
	// A loop that checks every input field in the current tab:
	for (i = 0; i < y.length; i++) {
		// If a field is empty...
		switch (y[i].name) {
			case "email":
			valid = validateEmail(y[i]);
			break;
			case "password":
			valid = validatePassword(y[i], y[i+1]);
			break;
			case "firstName":
			case "lastName":
			case "city":
			if (!isAlpha(y[i])){
				valid = false;
				break;
			}
			valid = hasContent(y[i]);
			break;
			case "address1":
			case "address2":
			valid = hasContent(y[i]);
			break;
			case "businessPhone":
			valid = validatePhoneNumber(y[i]);
			break;
			case "homePhone":
			if (y[i].value === ''){
				flagAsValid(y[i]);
				break;
			}
			valid = validatePhoneNumber(y[i]);
			break;
			case "zip":
			valid = validateZipCode(y[i]);
			break;
			case "province":
			if(y[i].value == 'Province...'){
				valid = false;
				flagAsInvalid(y[i]);
				break;
			}
			valid = true;
			flagAsValid(y[i]);
			break;
			default:
				// statements_def
				break;
			}
			if(!valid) {result = false;}
		}
	// If the valid status is true, mark the step as finished and valid:
	if (result) {
		document.getElementsByClassName("step")[currentTab].className += " finish";
	}
	return result; // return the valid status
}

/**
 * Checks whethre the email address has already been used.
 *
 * @param {function} callback 	Callback function to execute when result is ready
 *
 * @return {bool}	Whether email is available
 */
function validateEmailAvailability(callback){
	var request = $.ajax({
		url: 'model/emailAvailability.php',
		type: "POST",
		data: {
			email: $('#InputEmail').val(),
		},
		dataType: "html"
	});

	request.done(function(msg) {
		email = document.getElementById('InputEmail');

		if(msg === 'err'){
			// Email is not available
			document.getElementById('emailNotAvailable').style.display = 'block';
			callback(false);
		}
		if(msg === 'success'){
			// Email is available
			document.getElementById('emailNotAvailable').style.display = 'none';
			callback(true);	
		}
	});

	request.fail(function(jqXHR, textStatus) {
		alert( "Request failed: " + textStatus );
	});
}

/**
 * Handles the step indicators.
 *
 * @param {int}	n 	Indicator whether to move forward or backword
 */
function fixStepIndicator(n) {
	var i, x = document.getElementsByClassName("step");
	for (i = 0; i < x.length; i++) {
		x[i].className = x[i].className.replace(" active", "");
	}
	//adds the "active" class to the current step:
	x[n].className += " active";
}

/**
 * Verifies whether the passed element valid email address.
 *
 * Verifies and flag the element as invalid or valid accordingly. 
 *
 * @param {HTML element} email The element that has the value to verifiy
 *
 * @return {bool}	Whether it is valid email address
 */
function validateEmail(email){
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)){
		flagAsValid(email);
		return true;
	} else {
		flagAsInvalid(email);
		document.getElementById('emailNotAvailable').style.display = 'none';
		return false;
	}
}

/**
 * Verifies whether the password and confirm password match and not empty.
 *
 * Verifies and flag the element as invalid or valid accordingly. 
 *
 * @param {HTML element} password The element that has the password valud
 * @param {HTML element} confirmPassword The element that has the confirm password value
 *
 * @return {bool}	Whether password is valid
 */
function validatePassword(password, confirmPassword){
	if (password.value === '' || confirmPassword.value === ''){
		flagAsInvalid(password);
		flagAsInvalid(confirmPassword);
		return false;
	}

	if (password.value == confirmPassword.value ){
		flagAsValid(password);
		flagAsValid(confirmPassword);
		return true;
	} else {
		flagAsInvalid(password);
		flagAsInvalid(confirmPassword);
		return false;
	}
}

/**
 * Verifies whether the passed element has ten digits phone number.
 *
 * Verifies and flag the element as invalid or valid accordingly. 
 *
 * @param {HTML element} phoneNumber The element that has the value to verifiy
 *
 * @return {bool}	Whether it has ten digits
 */
function validatePhoneNumber(phoneNumber){
	if(/^\d{10}$/.test(phoneNumber.value)){
		flagAsValid(phoneNumber);
		return true;
	} else {
		flagAsInvalid(phoneNumber);
		return false;
	}
}

/**
 * Verifies whether the passed element has content.
 *
 * Verifies and flag the element as invalid or valid accordingly. 
 *
 * @param {HTML element} element The element that has the value to verifiy
 *
 * @return {bool}	Whether it has content
 */
function hasContent(element){
	if (element.value === ''){
		flagAsInvalid(element);
		return false;
	} else {
		flagAsValid(element);
		return true;
	}
}

/**
 * Verifies the passed element has only alpha characters.
 *
 * Verifies and flag the element as invalid or valid accordingly. 
 *
 * @param {HTML element} element The element that has the value to verifiy
 *
 * @return {bool}	Whether is alpha or not
 */
function isAlpha(element){
	if(/\d/.test(element.value)){
		flagAsInvalid(element);
		return false;
	} else {
		flagAsValid(element);
		return true;
	}
}

/**
 * Verifies zipcode matches Canadian zipcode formatting.
 *
 * Verifies and flag the element as invalid or valid accordingly. 
 *
 * @param {HTML element} element The element that has the zipcode value
 *
 * @return {bool}	Whether valid or invalid
 */
function validateZipCode(element){
	if(/^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/.test(element.value)){
		flagAsValid(element);
		return true;
	} else {
		flagAsInvalid(element);
		return false;
	}
}

/**
 * Change the css of the passed element to .is-valid.
 *
 * @param {HTML element} element The element we want to flag as valid
 */
function flagAsValid(element){
	element.classList.remove("is-invalid");
	element.classList.remove("is-valid");
	element.classList.add("is-valid");
}

/**
 * Change the css of the passed element to .is-invalid.
 *
 * @param {HTML element} element The element we want to flag as invalid
 */
function flagAsInvalid(element){
	element.classList.remove("is-invalid");
	element.classList.remove("is-valid");
	element.classList.add("is-invalid");
}


