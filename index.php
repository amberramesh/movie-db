<!DOCTYPE html>
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
        <?php $num = 3;  //number of cards to display
        $ctr = 0; //to keep track of number of cards in each row
        echo '<div class="row">';
        while($num !=0)
        {
          $num--;
          $ctr++;
          ?>
          <div class="col-md-4">
            <div class="card" >
              <img class="card-img-top" src="./assets/images/spiderman2019.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Spider-Man: Into the Spider-Verse</h5>
                <p class="card-text">(2019)</p>
              </div>
            </div>
          </div>
          <?php
          if($ctr % 3==0)
          {
            echo '</div>';
            if($num !=0)
              echo '<div class="row">';
          }

        }
        if($ctr % 3 > 0)
          echo '</div>';
          ?>
      <h2>New Releases</h2>
      <?php $num = 5;  //number of cards to display
      $ctr = 0; //to keep track of number of cards in each row
      echo '<div class="row">';
      while($num !=0)
      {
        $num--;
        $ctr++;
        ?>
        <div class="col-md-4">
          <div class="card" >
            <img class="card-img-top" src="./assets/images/spiderman2019.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Spider-Man: Into the Spider-Verse</h5>
              <p class="card-text">(2018)</p>
            </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><h5>Average Rating: 7.5/10</h5></li>

              </ul>

          </div>
        </div>
        <?php
        if($ctr % 3==0)
        {
          echo '</div>';
          if($num !=0)
            echo '<div class="row">';
        }

      }
      if($ctr % 3 > 0)
        echo '</div>';
        ?>

      <h2>Top Picks</h2>
      <?php $num = 6;  //number of cards to display
      $ctr = 0; //to keep track of number of cards in each row
      echo '<div class="row">';
      while($num !=0)
      {
        $num--;
        $ctr++;
        ?>
        <div class="col-md-4">
          <div class="card" >
            <img class="card-img-top" src="./assets/images/spiderman2019.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Spider-Man: Into the Spider-Verse</h5>
              <p class="card-text">(2018)</p>
            </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><h5>Average Rating: 7.5/10</h5></li>

              </ul>

          </div>
        </div>
        <?php
        if($ctr % 3==0)
        {
          echo '</div>';
          if($num !=0)
            echo '<div class="row">';
        }

      }
      if($ctr % 3 > 0)
        echo '</div>';
        ?>
        <h2>Recommended</h2>
      <?php $num = 5;  //number of cards to display
      $ctr = 0; //to keep track of number of cards in each row
      echo '<div class="row">';
      while($num !=0)
      {
        $num--;
        $ctr++;
        ?>
        <div class="col-md-4">
          <div class="card" >
            <img class="card-img-top" src="./assets/images/spiderman2019.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Spider-Man: Into the Spider-Verse</h5>
              <p class="card-text">(2018)</p>
            </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><h5>Average Rating: 7.5/10</h5></li>

              </ul>

          </div>
        </div>
        <?php
        if($ctr % 3==0)
        {
          echo '</div>';
          if($num !=0)
            echo '<div class="row">';
        }

      }
      if($ctr % 3 > 0)
        echo '</div>';
        ?>
        <h2>You Recently Viewed</h2>
        <?php $num = 8;  //number of cards to display
        ?>

        <?php
        while($num !=0)
        {
          $num--;
          ?>
              <a href="movie.php?id=001"><img class="card-img-top viewed-img" src="./assets/images/spiderman2019.jpg" alt="Spider-Man" title="Spider-Man"></a>
            <?php
        } ?>



      </div>
    </main>
    <?php include 'footer.php'; ?>
  </div>
  <script src="./assets/js/jQuery.js"></script>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
