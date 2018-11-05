<?php
	session_start();
	
	if(isset($_COOKIE["user"]))
		$_SESSION["user_id"] = $_COOKIE["user"];
	
	if(isset($_SESSION["user_id"])) {
		header("Location: index.php");
		die();
	}
?>
<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MovieDB | Login</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/signin.css" />
		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/signin.js"></script>
	<head>
	<body>
		<div class="container">
  		  <div class="row" id="siteLogo">
			<h1><a id="siteLogoName" href="index.php">MovieDB</a></h1>
		  </div>
		</div>
		<div class="vertical-center">
			<div class="container">

				<?php if(isset($_GET["signup"]) && $_GET["signup"] == "success"): ?>
				<div id="signupSuccess" class="row">
					<div class="alert alert-success col" role="alert">
						<h4 class="alert-heading">Account created!</h4>
						<p>You can now sign in with your new account.</p>
					</div>
				</div>
				<?php endif; ?>

				<?php if(isset($_GET["signup"]) && $_GET["signup"] == "failure"): ?>
				<div id="signupFailure" class="row">
					<div class="alert alert-danger col" role="alert">
						<h4 class="alert-heading">Error</h4>
						<p>Unable to register at the moment.</p>
					</div>
				</div>
				<?php endif; ?>

				<?php if(isset($_GET["signin"]) && $_GET["signin"] == "invalid"): ?>
				<div id="signinFailure" class="row">
					<div class="alert alert-danger col" role="alert">
						<h4 class="alert-heading">Error</h4>
						<p>E-mail or password entered is invalid.</p>
					</div>
				</div>
				<?php endif; ?>

				<div class="row">
					<div class="col-md-6" id="membersAccess">
					<p><h2>Having an account lets you</h2></p>
					<h5>
					<p><span class="oi oi-check"></span>&nbsp;&nbsp;Rate and review movies</p>
					<p><span class="oi oi-check"></span>&nbsp;&nbsp;Add movies to watchlist</p>
					<p><span class="oi oi-check"></span>&nbsp;&nbsp;Get movie suggestions</p>
					<p><span class="oi oi-check"></span>&nbsp;&nbsp;Post on discussion boards</p>
					</h5>
					<p><h5>Not a member yet? <a href="signup.php">Sign Up</a><h5><p>
					</div>
					<div class="col-md-6" id="loginContainer">
						<form method="POST" action="signinCheck.php" id="loginForm" novalidate>
						<fieldset>
							<div class="form-group">
								<legend>Sign In<legend>
							</div>
							<div class="form-group">
								<input type="email" autocomplete="on" class="form-control" name="email" id="email" placeholder="E-mail" required />
								<div class="feedback"></div>
							</div>
							<div class="form-group">
								<input type="password" autocomplete="on" class="form-control" name="password" id="password" placeholder="Password" required />
								<div class="feedback"></div>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" name="createCookie" id="createCookie" value="true"/>
								<label class="custom-control-label" for="createCookie">Remember Me</label>
							</div>
							<div id="buttonBox">
								<button type="submit" class="btn-block red-button">Sign In</button>
							</div>
						</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
