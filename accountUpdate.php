<?php
	
	require "config/dbconfig.php";
	session_start();
	if(isset($_POST["fname"]) &&
	isset($_POST["lname"]) &&
	isset($_POST["gender"]) &&
	isset($_POST["country"]) &&
	isset($_POST["email"]) &&
	isset($_SESSION["user_id"])) {
		
		$conn =  new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "UPDATE user SET email='".$_POST["email"]."', fname='".$_POST["fname"]."', lname='".$_POST["lname"]."',
		gender='".$_POST["gender"]."', country='".$_POST["country"]."' WHERE user_id='".$_SESSION["user_id"]."'";
		
		if($conn->query($sql) === TRUE)
			$message = "success";
		else
			$message = "failure";
		
		$conn->close();
		header("Location: account.php?status=".urlencode($message));
	}
	
	if(isset($_POST["currPwd"]) &&
	isset($_POST["pwd"]) &&
	isset($_POST["chkPwd"]) &&
	isset($_SESSION["user_id"])) {
		
		$conn =  new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "UPDATE user SET password='".$_POST["pwd"]."' WHERE user_id='".$_SESSION["user_id"]."' AND password='".$_POST["currPwd"]."'";
		
		if($conn->query($sql) === TRUE)
			$message = "success";
		else
			$message = "failure";
		
		$conn->close();
		header("Location: account.php?status=".urlencode($message));
	}
	
	if(isset($_POST["fname"])) {
		$fname = $_POST["fname"];
		
		if($fname == "")
			echo "Please enter first name.";
		else if(!ctype_alpha($fname))
			echo "Name must have only letters!";
		else
			echo "Valid";
	}
	
	if(isset($_POST["lname"])) {
		$lname = $_POST["lname"];
		
		if($lname == "")
			echo "Please enter last name.";
		else if(!ctype_alpha($lname))
			echo "Name must have only letters!";
		else
			echo "Valid";
	}
	
	if(isset($_POST["email"]) && $_SESSION["user_id"]) {
		$email = $_POST["email"];
		$regex = "/[^@]+@[^\.]+\..+/";
		$sql = "SELECT user_id FROM user WHERE email='".$email."' AND user_id !='".$_SESSION["user_id"]."'";
		
		if($email == "")
			echo "Please enter e-mail.";
		else if( !preg_match($regex, $email) )
			echo "Invalid e-mail";
		else {
				$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 
				
				$result = $conn->query($sql);
				
				if($result->num_rows > 0)
					echo "Account already exists for this e-mail!";
				else
					echo "Valid";
				
				$conn->close();
		}
	}

?>