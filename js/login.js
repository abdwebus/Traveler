var modal = document.getElementById('modal-wrapper');
// window.onclick = function(event) {
// 	if (event.target == modal) {
// 		modal.style.display = "none";
// 	}
// }

document.getElementById('login').addEventListener('click', function(){
	showLogin();
});

document.getElementById('loginCloseButton').addEventListener('click', function(){
	hidePopup();
});

function showLogin(){
	modal.style.display='block';
}

function hidePopup(){
	modal.style.display='none';
}