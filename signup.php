<!-- Author: Abdulwahab Alansari -->
<div id="signupModal-wrapper" class="modal">
	<form id="regForm" class="form-content form-signup animate" action="" method="">
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
				<input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" id="signupPassword" placeholder="Password">
				<input type="password" class="form-control" id="signupConfirmPassword" placeholder="Confirm password">
			</div>
			<div class="checkbox mb-3">
				<input type="checkbox" value="remember-me"> I agree to the terms and conditions
			</div>
		</div>

		<div class="tab">
			<div class="centerText">
				<h1 class="h3 mb-3 font-weight-normal">Personal Information</h1>
			</div>
			<div class="form-row form-group">
				<div class="col">
					<label for="firstNameInput" class="sr-only">First name</label>
					<input type="text" class="form-control" id="firstNameInput" placeholder="First name">
				</div>
				<div class="col">
					<label for="lastNameInput" class="sr-only">Last name</label>
					<input type="text" class="form-control" id="lastNameInput" placeholder="Last name">
				</div>
			</div>
			<div class="form-group">
				<label for="businessPhoneInput" class="sr-only">Business phone number</label>
				<input type="tel" class="form-control" id="businessPhoneInput" placeholder="Business phone number">
			</div>
			<div class="form-group">
				<label for="homePhoneInput" class="sr-only">Business phone number</label>
				<input type="tel" class="form-control" id="homePhoneInput" placeholder="Home phone number">
			</div>
		</div>

		<div class="tab">
			<div class="centerText">
				<h1 class="h3 mb-3 font-weight-normal">Address</h1>
			</div>
			<div class="form-group">
				<label for="inputAddress" class="sr-only">Address</label>
				<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
			</div>
			<div class="form-group">
				<label for="inputAddress2" class="sr-only">Address 2</label>
				<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
			</div>
			<div class="form-row">
				<div class="form-group col-md-5">
					<label for="inputCity" class="sr-only">City</label>
					<input type="text" class="form-control" id="inputCity" placeholder="City">
				</div>
				<div class="form-group col-md-4">
					<label for="inputState" class="sr-only">Province</label>
					<select id="inputState" class="form-control">
						<option selected>Province...</option>
						<option>Alberta</option>
						<option>British Columbia</option>
						<option>Manitoba</option>
						<option>New Brunswick</option>
						<option>Newfoundland and Labrador</option>
						<option>Nova Scotia</option>
						<option>Ontario</option>
						<option>Prince Edward Island</option>
						<option>Quebec</option>
						<option>Saskatchewan</option>
					</select>
				</div>
				<div class="form-group col-md-3" class="sr-only">
					<label for="inputZip" class="sr-only">Zip</label>
					<input type="text" class="form-control" id="inputZip" placeholder="Zip">
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
		<div  class="centerText">
			<p class="mt-5 mb-3 text-muted">© 2019-2020</p>	
		</div>
		
	</form>
</div>








