<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'moviedb');
$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if($_POST['action']=="Delete")
{
   $sql = "Delete from user_feedback where movie_id ='".trim($_POST['movie_id'])."' and user_id='".trim($_POST['user_id'])."'";
   //echo $sql;
   mysqli_query($con, $sql);
   $sql = "update movie set avg_rating = cast((select avg(u.rating) from user_feedback as u where u.movie_id='";
   $sql = $sql.$_POST['movie_id']."') as decimal(3,1))where movie_id='";
   $sql = $sql.$_POST['movie_id']."'";
   //echo $sql;
   mysqli_query($con, $sql);
   header("Location:http://localhost/moviedb/movie.php?id=".$_POST['movie_id'], true);
}
else if($_POST['action']=="Post")
{
  $dateFormat = date('Y-m-d');

  $sql = "insert into user_feedback values(";
  $sql = $sql.$_POST['user_id'];
  $sql = $sql." ,'".$_POST['movie_id']."'";
  $sql = $sql." ,".$_POST['rating'];
  $sql = $sql." ,'".mysqli_real_escape_string($con, $_POST['review'])."'";
  $sql = $sql." ,'".$dateFormat."')";
  //echo $sql;
  mysqli_query($con, $sql);
  $sql = "update movie set avg_rating = cast((select avg(u.rating) from user_feedback as u where u.movie_id='";
  $sql = $sql.$_POST['movie_id']."') as decimal(3,1))where movie_id='";
  $sql = $sql.$_POST['movie_id']."'";
  //echo $sql;
  mysqli_query($con, $sql);
  header("Location:http://localhost/moviedb/movie.php?id=".$_POST['movie_id'], true);
}
?>
