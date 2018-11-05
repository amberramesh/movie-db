<?php

if(isset($_COOKIE["user"])) {
	unset($_COOKIE["user"]);
	setcookie("user", "", time() - 3600, "/");
}

session_start();
session_destroy();
if(isset($_SESSION['url']))
{
  header("Location:".$_SESSION['url']);
}
else
  header("Location:http://localhost/moviedb/", true);
?>
