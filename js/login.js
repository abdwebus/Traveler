// Author: Abdulwahab Alansari


var loginModal = document.getElementById('modal-wrapper');
var signupModal = document.getElementById('signupModal-wrapper');
var currentTab = 0; // Current tab is set to be the first tab (0)
// window.onclick = function(event) {
// 	if (event.target == modal) {
// 		modal.style.display = "none";
// 	}
// }

// function go(){
// 	console.log('we got to here');
// 	var request = $.ajax({
// 		url: 'model/register.php',
// 		type: "POST",
// 		data: {
// 		email: $('#InputEmail').val(),
// 		password: $('#signupPassword').val(),
// 		confirmPassword: $('#signupConfirmPassword').val(),
// 		firstName: $('#firstNameInput').val(),
// 		lastName: $('#lastNameInput').val(),
// 		businessPhone: $('#businessPhoneInput').val(),
// 		homePhone: $('#homePhoneInput').val(),
// 		address1: $('#inputAddress').val(),
// 		address2: $('#inputAddress2').val(),
// 		city: $('#inputCity').val(),
// 		province: $('#inputState').val(),
// 		zip: $('#inputZip').val(),},
// 		dataType: "html"
// 	});

// 	request.done(function(msg) {
// 		alert(msg);
// 	});

// 	request.fail(function(jqXHR, textStatus) {
// 		alert( "Request failed: " + textStatus );
// 	});
// }


document.getElementById('loginCloseButton').addEventListener('click', function(){
	hideLogin();
});

document.getElementById('signupCloseButton').addEventListener('click', function(){
	hideSignup();
});

function showSignup(){
	showTab(currentTab); // Display the current tab
	signupModal.style.display='block';
}

function showLogin(){
	loginModal.style.display='block';
}

function hideLogin(){
	loginModal.style.display='none';
}

function hideSignup(){
	signupModal.style.display='none';
	resetSignup();
}



// Reset signup form to its default status
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

function showTab(n) {
	var x = document.getElementsByClassName("tab");
	x[n].style.display = "block";
	if (n == 0) {
		document.getElementById("prevBtn").style.display = "none";
	} else {
		document.getElementById("prevBtn").style.display = "inline";
	}
	if (n == (x.length - 1)) {
		document.getElementById("nextBtn").innerHTML = "Submit";
	} else {
		document.getElementById("nextBtn").innerHTML = "Next";
	}
	// ... and run a function that displays the correct step indicator:
	fixStepIndicator(n)
}

function nextPrev(n) {
	var x = document.getElementsByClassName("tab");
	// Exit the function if any field in the current tab is invalid:
	if (n == 1 && !validateForm()) return false;
	// Hide the current tab:
	x[currentTab].style.display = "none";
	currentTab = currentTab + n;
	// if you have reached the end of the form... :
	if (currentTab >= x.length) {
		//...the form gets submitted:
		document.getElementById("regForm").submit();
		return false;
	} 
	// Otherwise, display the correct tab:
	showTab(currentTab);
}

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

function fixStepIndicator(n) {
	var i, x = document.getElementsByClassName("step");
	for (i = 0; i < x.length; i++) {
		x[i].className = x[i].className.replace(" active", "");
	}
	//adds the "active" class to the current step:
	x[n].className += " active";
}

function validateEmail(email){
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)){
		flagAsValid(email);
		return true;
	} else {
		flagAsInvalid(email);
		return false;
	}
}

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

function validatePhoneNumber(phoneNumber){
	if(/^\d{10}$/.test(phoneNumber.value)){
		flagAsValid(phoneNumber);
		return true;
	} else {
		flagAsInvalid(phoneNumber);
		return false;
	}
}

function hasContent(element){
	if (element.value === ''){
		flagAsInvalid(element);
		return false;
	} else {
		flagAsValid(element);
		return true;
	}
}

function isAlpha(element){
	if(/\d/.test(element.value)){
		flagAsInvalid(element);
		return false;
	} else {
		flagAsValid(element);
		return true;
	}
}

function validateZipCode(element){
	if(/^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/.test(element.value)){
		flagAsValid(element);
		return true;
	} else {
		flagAsInvalid(element);
		return false;
	}
}

function flagAsValid(element){
	element.classList.remove("is-invalid");
	element.classList.remove("is-valid");
	element.classList.add("is-valid");
}

function flagAsInvalid(element){
	element.classList.remove("is-invalid");
	element.classList.remove("is-valid");
	element.classList.add("is-invalid");
}


