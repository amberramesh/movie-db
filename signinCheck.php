<?php
	
	session_start();
	require "config/dbconfig.php";

	if(isset($_POST["email"]) &&
	isset($_POST["password"])) {
		
		$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "SELECT user_id, email FROM USER WHERE email='".$_POST["email"]."' AND password='".$_POST["password"]."'";
		
		$result = $conn->query($sql);
				
		if($result->num_rows == 1) {
			$user_id = (string)mysqli_fetch_row($result)[0];
			$_SESSION["user_id"] = $user_id;
			header("Location: account.php");
			// isset($_POST["createCookie"])
		} else
			header("Location: signin.php?signin=invalid");
		
		$conn->close();
	}
	
?>