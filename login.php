<!-- Author: Abdulwahab Alansari -->
<div id="modal-wrapper" class="modal">
	<form class="form-content form-signin animate" action="model/loginModel.php" method="POST">
		<div class="imgcontainer centerText">
			<span id="loginCloseButton" class="close" title="Close PopUp">&times;</span>
			<img class="mb-4" src="images/Logo.png" alt="" width="75" height="54">
			<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
		</div>
		<div class="form-group">
			<label for="loginEmail" class="sr-only">Email address</label>
			<input type="email" id="loginEmail" class="form-control" placeholder="Email address" required autofocus name="email">
			<div class="invalid-feedback">
				Email address is not valid!
			</div>
		</div>
		<div class="form-group">
			<label for="loginPassword" class="sr-only">Password</label>
			<input type="password" id="loginPassword" class="form-control" placeholder="Password" required name="password">
			<div class="invalid-feedback">
				Password is required!
			</div>
		</div>
		<div id="loginInvalid" style="display: none; color: red;">
			Login failed! - Please check your username and password
		</div>
		<br>
		<button class="btn btn-lg btn-primary btn-block" type="button" onclick="login()">Sign in</button>
	</form>
</div>
