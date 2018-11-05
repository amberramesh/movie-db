<?php
$str = "";
	session_start();
	if(!isset($_SESSION["user_id"])) {
		header("Location: signin.php");
		die();
	}
	require "config/dbconfig.php";

	$conn =  new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	if ($conn->connect_error)
		die("Connection failed: " . $conn->connect_error);

	$user = array();

	if(isset($_GET['user_id']))
		$user["user_id"] = $_GET['user_id'];
	else
		$user["user_id"] = $_SESSION["user_id"];

	$userSql = "SELECT * FROM user WHERE user_id = ".$user["user_id"];
	$userResult = mysqli_query($conn, $userSql);

	if($userResult) {
		$row = $userResult->fetch_assoc();
		$user["fname"] = $row["fname"];
		$user["lname"] = $row["lname"];
		$user["gender"] = $row["gender"];
		$user["country"] = $row["country"];
		$user["email"] = $row["email"];
		$password = $row["password"];
		mysqli_free_result($userResult);
	}

	if(isset($_POST["session"]) && !isset($_GET['user_id'])) {
		echo json_encode($user);
		die();
	}

	if(isset($_POST["password"]) && !isset($_GET['user_id'])) {
		if($_POST["password"] === $password)
			echo "Valid";
		else
			echo "This does not match your current password.";
		die();
	}

?>
<html>
	<head lang="en">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MovieDB | My Account</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/account.css" />
		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/account.js"></script>
	</head>
	<body>
		<div class="<!--vertical-center-->">
			<div class="container" id="accountContainer">
				<div class="row" id="siteLogo">
					<h1><a id="siteLogoName" href="index.php">MovieDB</a></h1>
				</div>

				<?php if(!isset($_GET['user_id'])){


				if(isset($_GET["status"]) && $_GET["status"] == "success"): ?>
				<div id="successAlert" class="row">
					<div class="alert alert-success col" role="alert">
						<h4 class="alert-heading">Success!</h4>
						<p>Your account details were updated.</p>
					</div>
				</div>
				<?php endif; ?>

				<?php if(isset($_GET["status"]) && $_GET["status"] == "failure"): ?>
				<div id="failureAlert" class="row">
					<div class="alert alert-danger col" role="alert">
						<h4 class="alert-heading">Error</h4>
						<p>Unable to update details at the moment.</p>
					</div>
				</div>
			<?php endif;
		if(!isset($_GET["user_id"]))
		$str = "My";
	else $str = "User"; }?>

				<div class="row">
					<div class="col-md-4">
						<div>
							<h2><?php echo $str?> Account</h2>
						</div>
						<div id="accordion">
						  <div class="card">
							<div class="card-header" id="headingOne">
							  <h5 class="mb-0">
								<button class="btn btn-link" data-toggle="collapse" data-target="#personalDetails" aria-expanded="true" aria-controls="personalDetails">
								  Personal Details
								</button>
							  </h5>
							</div>

							<!-- PHP stuff from here -->
							<div id="personalDetails" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
							  <div class="card-body">
								<h4><?php echo $user["fname"]." ".$user["lname"]; ?></h4>
								<h6><?php echo $user["gender"]; ?></h6>
								<h6>Country: <?php echo $user["country"]; ?></h6>
								<?php if(!isset($_GET["user_id"])): ?>
								<h6>E-mail: <?php echo $user["email"]; ?></h6>
								<?php endif; ?>
							  </div>
							</div>
						  </div>
							<?php if(!isset($_GET['user_id']))
							{?>
						  <div class="card">
							<div class="card-header" id="headingTwo">
							  <h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#editInformation" aria-expanded="false" aria-controls="editInformation">
								  Edit Information
								</button>
							  </h5>
							</div>
							<div id="editInformation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
							  <div class="card-body">
							  <form method="POST" action="accountUpdate.php" id="editInformationForm" novalidate>
								<div class="form-group">
									<input type="text" autocomplete="on" class="form-control" name="fname" id="fname" placeholder="First Name" value="<?php echo $user["fname"]; ?>" required />
									<div class="feedback"></div>
								</div>
								<div class="form-group">
									<input type="text" autocomplete="on" class="form-control" name="lname" id="lname" placeholder="Last Name" value="<?php echo $user["lname"]; ?>" required />
									<div class="feedback"></div>
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
								</div>
								<div class="form-group">
									<input type="text" autocomplete="on" class="form-control" name="email" id="email" placeholder="E-mail" value="<?php echo $user["email"]; ?>" required />
									<div class="feedback"></div>
								</div>
								<div class="buttonBox">
									<button type="submit" class="btn-block red-button">Update Details</button>
								</div>
							  </form>
							  </div>
							</div>
						  </div>

						  <!-- END OF PHP -->

						  <div class="card">
							<div class="card-header" id="headingThree">
							  <h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#changePassword" aria-expanded="false" aria-controls="changePassword">
								  Change Password
								</button>
							  </h5>
							</div>
							<div id="changePassword" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
							  <div class="card-body">
							  <form method="POST" action="accountUpdate.php" id="changePasswordForm" novalidate>
								<div class="form-group">
									<input type="password" autocomplete="on" class="form-control" name="currPwd" id="currPwd" placeholder="Current Password" required />
									<div class="feedback"></div>
								</div>
							    <div class="form-group">
									<input type="password" autocomplete="off" class="form-control" name="pwd" id="pwd" placeholder="New Password" required />
									<div class="feedback"></div>
								</div>
								<div class="form-group">
									<input type="password" autocomplete="off" class="form-control" name="chkPwd" id="chkPwd" placeholder="Re-type New Password" required />
									<div class="feedback"></div>
								</div>
								<div id="buttonBox">
									<button type="submit" class="btn-block red-button">Change Password</button>
								</div>
							  </form>
							  </div>
							</div>
						  </div>

						  <div class="card">
							<div class="card-header" id="logoutHeader">
							  <h5 class="mb-0">
								<button class="btn btn-link" onclick="location.href='logout.php'">
								  Logout
								</button>
							  </h5>
							</div>
						  </div>
							<?php
						}
						if(!isset($_GET["user_id"])	)
						$str = "My";
					else $str = "User";
					?>
						</div>
					</div>
					<div class="col-md-8">
						<div>
							<h2><?php echo $str?> Reviews</h2>
						</div>
						<div class="container" id="reviewContainer">

						<!-- Using PHP to fetch reviews into container -->

						<?php

						$reviewSql = "SELECT * FROM v_user_reviews WHERE user_id = ".$user["user_id"];
						$reviewResult = mysqli_query($conn, $reviewSql);
						if(!isset($_GET["user_id"])	)
						$str = "You have";
						else $str = "User has";
						if($reviewResult) {

							if($reviewResult->num_rows === 0) { ?>

							<div class="card">
								<div class="card-body">
									<h6><center><?php echo $str?> not written any reviews yet.</center></h6>
								</div>
							</div>

							<?php }

							while($row = $reviewResult->fetch_assoc()) {
								$movie_id = $row["movie_id"];
								$title = $row["title"];
								$date = date("F jS, Y", strtotime($row["date"]));
								$rating = $row["rating"];
								$review = $row["review"];
								//echo $movie_id."<br>".$title."<br>".$date."<br>".$rating."<br>".$review; ?>

								<div class="card">
								  <div class="card-header">
								    <div class="row">
								      <div class="col-md-10">
									    <h4><a href="movie.php?id=<?php echo $movie_id ?>"><?php echo $title ?></a></h4>
									    <h6 class="review-date">Written on: <?php echo $date ?></h6>
									  </div>
									  <div class="col-md-2">
										<h4 class="review-score"><?php echo $rating ?></h4>
									  </div>
								    </div>
								  </div>
								  <div class="card-body">
									<h6><?php echo $review ?></h6>
								  </div>
								</div>
								<hr/>

								<?php
							}
							mysqli_free_result($reviewResult);
						} ?>

						<!-- END oF PHP -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>