
<html>
<head>
  <meta charset="utf-8"/ />
  <title>MovieDB</title>
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./assets/css/header.css" />
  <link rel="stylesheet" href="./assets/css/main.css" />
  <link rel="stylesheet" href="./assets/css/footer.css" />

</head>
<body>
  <div class="container main-container">
    <?php include 'header.php'; ?>
    <main>
      <div class="container">
        <h2>Coming Soon...</h2>
        <?php
        $date =  strtotime(date("Y-m-d"));
        $result = mysqli_query($con, "SELECT m.movie_id,m.title, m.release_date, mm.title_poster_path FROM movie as m, movie_meta as mm where m.movie_id = mm.movie_id and unix_timestamp(release_date) >".$date." limit 5");

        $row = mysqli_fetch_assoc($result);
        $ct =  mysqli_num_rows($result); //number of cards to be displayed
        $num_cards = $ct;
        for($card_rows = 0; $card_rows < ceil($ct/3); $card_rows++)
        {
          echo '<div class="row">';
          for($cards= 0; $cards < min(3, $num_cards); $cards++){
            ?>
            <div class="col-md-4" >
              <div class="card" >
                <div class="rating-overlay">
                  <h3>Coming Soon</h3>
                </div>
                <div class="rating-overlay">
                  <h3>RATING:</h3>
                  <h3>7.5/10</h3>
                </div>
                <img class="card-img-top " src="<?php echo $row['title_poster_path']?>" title="<?php echo $row['title'];?>">
                <a href="movie.php?id=<?php echo $row['movie_id']?>">
                  <div class="card-body">
                    <h6 class="card-title"><?php echo $row['title']?></h6>
                    <p class="card-text"><?php echo '('.date("Y",strtotime($row['release_date'])).')';?></p>
                  </div>
                </a>
              </div>
            </div>
            <?php
            $ct--;
          }
          echo '</div>';
        }
        ?>
        <h2>New Releases</h2>
        <?php
        $date =  strtotime(date("Y-m-d"));
        $query = "SELECT m.movie_id,m.title, m.release_date, m.avg_rating, mm.title_poster_path FROM movie as m, movie_meta as mm";
        $query = $query." where m.movie_id = mm.movie_id and unix_timestamp(release_date) <= ".$date." order by release_date desc limit 5";
        $result = mysqli_query($con, $query);

        $row = mysqli_fetch_assoc($result);
        $ct =  mysqli_num_rows($result); //number of cards to be displayed
        $num_cards = $ct;
        for($card_rows = 0; $card_rows < ceil($ct/3); $card_rows++)
        {
          echo '<div class="row">';
          for($cards= 0; $cards < min(3, $num_cards); $cards++){
            ?>
            <div class="col-md-4" >
              <div class="card" >

                <div class="rating-overlay">
                  <h3>RATING:</h3>
                  <h3><?php echo $row['avg_rating'].'/10';?></h3>
                </div>
                <img class="card-img-top " src="<?php echo $row['title_poster_path']?>" title="<?php echo $row['title']?>">
                <a href="movie.php?id=<?php echo $row['movie_id']?>">
                  <div class="card-body">
                    <h6 class="card-title"><?php echo $row['title']?></h6>
                    <p class="card-text"><?php echo '('.date("Y",strtotime($row['release_date'])).')';?></p>
                  </div>
                </a>
              </div>
            </div>
            <?php
            $ct--;
          }
          echo '</div>';
        }
        ?>

        <h2>Top Picks</h2>
        <?php
        $date =  strtotime(date("Y-m-d"));
        $query = "SELECT m.movie_id,m.title, m.release_date, m.avg_rating, mm.title_poster_path FROM movie as m, movie_meta as mm";
        $query = $query." where m.movie_id = mm.movie_id and unix_timestamp(release_date) <= ".$date." order by avg_rating desc limit 5";
        $result = mysqli_query($con, $query);

        $row = mysqli_fetch_assoc($result);
        $ct =  mysqli_num_rows($result); //number of cards to be displayed
        $num_cards = $ct;
        for($card_rows = 0; $card_rows < ceil($ct/3); $card_rows++)
        {
          echo '<div class="row">';
          for($cards= 0; $cards < min(3, $num_cards); $cards++){
            ?>
            <div class="col-md-4" >
              <div class="card" >

                <div class="rating-overlay">
                  <h3>RATING:</h3>
                  <h3><?php echo $row['avg_rating'].'/10';?></h3>
                </div>
                <img class="card-img-top " src="<?php echo $row['title_poster_path']?>" title="<?php echo $row['title']?>">
                <a href="movie.php?id=<?php echo $row['movie_id']?>">
                  <div class="card-body">
                    <h6 class="card-title"><?php echo $row['title']?></h6>
                    <p class="card-text"><?php echo '('.date("Y",strtotime($row['release_date'])).')';?></p>
                  </div>
                </a>
              </div>
            </div>
            <?php
            $ct--;
          }
          echo '</div>';
        }
        ?>

        <h2>You Recently Viewed</h2>
        <?php $num = 8;  //number of cards to display

        if(!isset($_COOKIE["VIEW_HISTORY"]))
          echo '<h5>You view history is empty.</h5>';
        else {
          $viewed = explode(",",$_COOKIE['VIEW_HISTORY']);
        ?>

        <?php
        foreach($viewed as $item)
        {
          $result = mysqli_query($con, "select mm.title_poster_path, m.title from movie_meta as mm, movie as m where m.movie_id = mm.movie_id and m.movie_id= '".$item."'");
          $row = mysqli_fetch_assoc($result);
          ?>
          <a href="movie.php?id=<?php echo $row['movie_id']?>"><img class="card-img-top viewed-img" src="<?php echo $row['title_poster_path']?>" alt="<?php echo $row['title']?>" title="<?php echo $row['title']?>"></a>
          <?php
        }
        } ?>



      </div>
    </main>
    <?php include 'footer.php'; ?>
  </div>
  <script src="./assets/js/jQuery.js"></script>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <script>

  var posters = document.getElementsByClassName("rating-overlay");
  var imgs = document.getElementsByClassName("card-img-top");
  var showRating = function()
  {
    this.parentNode.childNodes[1].style.display = 'block';
  }
  var hideRating = function()
  {
    this.style.display = 'none';
  }
  for (var i = 0; i < imgs.length; i++) {
    posters[i].style.display = 'none';
    imgs[i].addEventListener('mouseover',showRating);
    posters[i].addEventListener('mouseout',hideRating);
  }
  </script>
</body>
</html>
