<?php

	require "config/dbconfig.php";
		
	if(isset($_POST["fname"]) &&
	isset($_POST["lname"]) &&
	isset($_POST["gender"]) &&
	isset($_POST["email"]) &&
	isset($_POST["pwd"]) &&
	isset($_POST["country"])) {
		
		$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO user(email, fname, lname, gender, password, country)
		VALUES ('".$_POST["email"]."', '".$_POST["fname"]."', '".$_POST["lname"]."',
		'".$_POST["gender"]."', '".$_POST["pwd"]."', '".$_POST["country"]."')";

		if ($conn->query($sql) === TRUE)
			$message = "success";
		else
			$message = "failure";
		
		$conn->close();
		header("Location: signin.php?signup=".urlencode($message));
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
	
	if(isset($_POST["email"])) {
		$email = $_POST["email"];
		$regex = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
		$sql = "SELECT user_id FROM user WHERE email='".$email."'";
		
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