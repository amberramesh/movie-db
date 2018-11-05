<br />
<div class="viewed">

  <?php
  if (isset($_SESSION['user_id']))
  {
    ?>

    <?php $num = 8;  //number of cards to display
    $cookie_name = $_SESSION['user_id']."_HISTORY";
    if(isset($_COOKIE[$cookie_name]))
    {
      echo '<h5 class="footer-heading">Recently Viewed</h5>';
      $viewed = explode(",",$_COOKIE[$cookie_name]);

      foreach($viewed as $item)
      {

        $result = mysqli_query($con, "select mm.title_poster_path, m.title from movie_meta as mm, movie as m where m.movie_id = mm.movie_id and m.movie_id= '".$item."'");
        $row = mysqli_fetch_assoc($result);
        ?>
        <a href="movie.php?id=<?php echo $row['movie_id']?>"><img class="card-img-top viewed-img" src="<?php echo $row['title_poster_path']?>" alt="<?php echo $row['title']?>" title="<?php echo $row['title']?>"></a>
        <?php
      }
    }
  }?>

</div>
<div class = "jumbotron jumbotron-fluid">
  Copyright &copy 2018
</div>

<?php
mysqli_close($con); ?>
