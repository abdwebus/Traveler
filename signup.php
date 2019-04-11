<!-- Author: Abdulwahab Alansari -->
<div id="signupModal-wrapper" class="modal">
	<form id="regForm" class="form-content form-signup animate" action="model/signupModel.php" method="POST">
		<div class="imgcontainer centerText">
			<span id="signupCloseButton" class="close" title="Close PopUp">&times;</span>
			<img class="mb-4" src="images/Logo.png" alt="" width="75" height="54">
		</div>
		<!-- One "tab" for each step in the form: -->
		<div class="tab">
			<div class="centerText">
				<h1 class="h3 mb-3 font-weight-normal">Setup your account</h1>
			</div>
			<div class="form-group">
				<label for="InputEmail1" class="sr-only">Email address</label>
				<input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				<div class="invalid-feedback">
					Email is invalid!
				</div>
				<div id="emailNotAvailable" style="display: none; color: red;">
					Email is already exist!
				</div>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" id="signupPassword" placeholder="Password" name="password" required>
				<input type="password" class="form-control" id="signupConfirmPassword" placeholder="Confirm password" name="confirmPassword" required>
				<div class="invalid-feedback">
					Passwords don't match!
				</div>
			</div>
		</div>

		<div class="tab">
			<div class="centerText">
				<h1 class="h3 mb-3 font-weight-normal">Personal Information</h1>
			</div>
			<div class="form-row form-group">
				<div class="col">
					<label for="firstNameInput" class="sr-only">First name</label>
					<input type="text" class="form-control" id="firstNameInput" placeholder="First name" name="firstName" maxlength="25">
				</div>
				<div class="col">
					<label for="lastNameInput" class="sr-only">Last name</label>
					<input type="text" class="form-control" id="lastNameInput" placeholder="Last name" name="lastName" maxlength="25">
				</div>
			</div>
			<div class="form-group">
				<label for="businessPhoneInput" class="sr-only">Business phone number</label>
				<input type="tel" class="form-control" id="businessPhoneInput" placeholder="Business phone number" name="businessPhone" maxlength="10">
				<small id="telHelp" class="form-text text-muted">e.g. 7805556666</small>
				<div class="invalid-feedback">
					Valid business phone number is required
				</div>
			</div>
			<div class="form-group">
				<label for="homePhoneInput" class="sr-only">Business phone number</label>
				<input type="tel" class="form-control" id="homePhoneInput" placeholder="Home phone number" name="homePhone" maxlength="10">
				<small id="telHelp" class="form-text text-muted">e.g. 7805556666 (Optional)</small>
				<div class="invalid-feedback">
					Phone number is invalid
				</div>
			</div>
		</div>

		<div class="tab">
			<div class="centerText">
				<h1 class="h3 mb-3 font-weight-normal">Address</h1>
			</div>
			<div class="form-group">
				<label for="inputAddress" class="sr-only">Address</label>
				<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address1" maxlength="25">
			</div>
			<div class="form-group">
				<label for="inputAddress2" class="sr-only">Address 2</label>
				<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address2" maxlength="10">
			</div>
			<div class="form-row">
				<div class="form-group col-md-5">
					<label for="inputCity" class="sr-only">City</label>
					<input type="text" class="form-control" id="inputCity" placeholder="City" name="city" maxlength="20">
				</div>
				<div class="form-group col-md-4">
					<label for="inputState" class="sr-only">Province</label>
					<select id="inputState" class="form-control" name="province">
						<option selected>Province...</option>
						<option>AB</option>
						<option>BC</option>
						<option>MB</option>
						<option>NB</option>
						<option>NL</option>
						<option>NS</option>
						<option>NT</option>
						<option>NU</option>
						<option>ON</option>
						<option>PE</option>
						<option>QC</option>
						<option>SK</option>
						<option>YT</option>
					</select>
				</div>
				<div class="form-group col-md-3" class="sr-only">
					<label for="inputZip" class="sr-only">Zip</label>
					<input type="text" class="form-control" id="inputZip" placeholder="Zip" name="zip" maxlength="7">
				</div>
			</div>
		</div>
		<button id="prevBtn" class="btn btn-lg btn-secondary" type="button" onclick="nextPrev(-1)">Back</button>
		<button id="nextBtn" class="btn btn-lg btn-primary" type="button" onclick="nextPrev(1)">Next</button>

		<!-- Circles which indicates the steps of the form: -->
		<div style="text-align:center;margin-top:40px;">
			<span class="step"></span>
			<span class="step"></span>
			<span class="step"></span>
		</div>
	</form>
</div>








