<?php 
	session_start(); 
	if(isset($_SESSION["user_id"])) {
		header("Location: index.php");
		die();
	}
?>
<html>
	<head lang="en">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MovieDB | Sign Up</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/signup.css" />
		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/signup.js"></script>
	</head>
	<body>
		<div class="container">
  		  <div class="row" id="siteLogo">
			<h1><a id="siteLogoName" href="index.php">MovieDB</a></h1>
		  </div>
		</div>
		<div class="vertical-center">
			<div class="container" id="registerContainer">
				<form method="POST" action="signupCheck.php" class="needs-validation" id="signupForm" novalidate>
					<fieldset>
						<div class="form-group">
							<legend>Sign Up<legend>
						</div>
						<div class="form-group form-row">
							<div class="col-md-6 my-1">
								<input type="text" autocomplete="on" class="form-control" name="fname" id="fname" placeholder="First Name" required />
								<div class="feedback"></div>
							</div>
							<div class="col-md-6 my-1">
								<input type="text" autocomplete="on" class="form-control" name="lname" id="lname" placeholder="Last Name" required />
								<div class="feedback"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="custom-control custom-radio custom-control-inline">
								<input class="custom-control-input" name="gender" type="radio" id="genMale" value="Male" required>
								<label class="custom-control-label" for="genMale">Male</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input class="custom-control-input" name="gender" type="radio" id="genFemale" value="Female" required>
								<label class="custom-control-label" for="genFemale">Female</label>
							</div>
							<div class="custom-control-inline feedback" id="genderFeedback"></div>
						</div>
						<div class="form-group">
							<input type="email" autocomplete="on" class="form-control" name="email" id="email" placeholder="E-mail" required />
							<div class="feedback"></div>
						</div>
						<div class="form-group">
							<input type="password" autocomplete="off" class="form-control" name="pwd" id="pwd" placeholder="Password" required />
							<div class="feedback"></div>
						</div>
						<div class="form-group">
							<input type="password" autocomplete="off" class="form-control" name="chkpwd" id="chkpwd" placeholder="Re-enter Password" required />
							<div class="feedback"></div>
						</div>
						<div class="form-group">
							<select name="country" id="country" autocomplete="on" class="custom-select" required>
								<option disabled selected hidden value="">Select country</option>
								<option value="India">India</option>
								<option value="United States">United States</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="Canada">Canada</option>
								<option value="Others">Others</option>
							</select>
							<div class="feedback"></div>
							</div>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="accepttos" id="accepttos" required>
							<label class="custom-control-label" for="accepttos">I accept the terms of service.</label>
						</div>
						<div class="feedback"></div>
						<div id="buttonBox">
							<button type="submit" class="btn-block red-button">Register</button>
						</div>
					</fieldset>
				</form>
				<div>
					<p><span class="oi oi-chevron-left"></span>&nbsp;&nbsp;<a href="signin.php">Return to Sign In page</a></p>
				</div>
			</div>
		</div>
	</body>
</html>