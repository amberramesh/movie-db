<?php
session_start();
//$_SESSION['user_id'] = '111';

if(isset($_COOKIE["user"]))
$_SESSION["user_id"] = $_COOKIE["user"];

$_SESSION['url']="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'moviedb');
$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

?>
<header>
	<div class="jumbotron jumbotron-fluid ">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-7 col-8">
					<a class="home-link" href="/moviedb"><h1 class="display-4 logo">MovieDB</h1></a>
				</div>
				<div class="col-md-4 col-sm-5 col-4">


					<ul class="nav justify-content-end header-links">
						<?php if(!isset($_SESSION['user_id']))
						{
							?>
							<li class="nav-item">
								<a class="nav-link active" href="signin.php">Login</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="signup.php">SignUp</a>
							</li>
						<?php }

						else
						{
							?>
							<li class="nav-item" >
								<a class="nav-link active" href="account.php">My Account</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="logout.php">Logout</a>
							</li>
							<?php
						}
						?>

					</ul>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 offdet-md-3">

					<p class="lead text-center">The best community powered online-catalogue for real moviebuffs</p>
				</div>
			</div>


		</div>
		<div class="container">

			<form class="form-inline" method="get" action="search.php">
				<div class="row justify-content-center">
						<input type="text"  class="form-control" placeholder="Search for movie " name="title">

						<label>&nbsp &nbsp in Genre: &nbsp &nbsp</label>
						<select class="form-control" name="genre">
							<option selected>All</option>
							<option>Action</option>
							<option>Adventure</option>
							<option>Animation</option>
							<option>Biography</option>
							<option>Comedy</option>
							<option>Crime</option>
							<option>Drama</option>
							<option>Fantasy</option>
							<option>Horror</option>
							<option>Mystery</option>
							<option>Sci-Fi</option>
							<option>Thriller</option>
						</select>
						<input type="submit" class="btn btn-dark" value="Search"/>

				</div>
			</form>
		</div>
	</div>



	<div class="jumbotron jumbotron-fluid">

	</div>
</header>
