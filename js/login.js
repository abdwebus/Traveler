var loginModal = document.getElementById('modal-wrapper');
var signupModal = document.getElementById('signupModal-wrapper');
// window.onclick = function(event) {
// 	if (event.target == modal) {
// 		modal.style.display = "none";
// 	}
// }

document.getElementById('login').addEventListener('click', function(){
	showLogin();
});

document.getElementById('signup').addEventListener('click', function(){
	showSignup();
});

document.getElementById('loginCloseButton').addEventListener('click', function(){
	hidePopup();
});

document.getElementById('signupCloseButton').addEventListener('click', function(){
	hidePopup();
});

function showSignup(){
	signupModal.style.display='block';
}

function showLogin(){
	loginModal.style.display='block';

}

function hidePopup(){
	loginModal.style.display='none';
	signupModal.style.display='none';
}


// Step by step
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

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
	// if (n == 1 && !validateForm()) return false;
	if (!validateForm()) return false;
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
	var x, y, i, valid = true;
	x = document.getElementsByClassName("tab");
	y = x[currentTab].getElementsByTagName("input");
	// A loop that checks every input field in the current tab:
	for (i = 0; i < y.length; i++) {
		// If a field is empty...
		if (y[i].value == "") {
			// add an "invalid" class to the field:
			y[i].className += " invalid";
			// and set the current valid status to false:
			valid = false;
		}
	}

	valid = true; //TODO: Remove in production
	// If the valid status is true, mark the step as finished and valid:
	if (valid) {
		document.getElementsByClassName("step")[currentTab].className += " finish";
	}
	return valid; // return the valid status
}

function fixStepIndicator(n) {
	var i, x = document.getElementsByClassName("step");
	for (i = 0; i < x.length; i++) {
		x[i].className = x[i].className.replace(" active", "");
	}
	//adds the "active" class to the current step:
	x[n].className += " active";
}