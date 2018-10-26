<?php

   $movieid = $_GET['id'];
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'root');
   define('DB_DATABASE', 'moviedb');
   $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);



?>
<html>
<head>
  <meta charset="utf-8"/ />
  <title>MovieDB</title>
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./assets/css/header.css" />
  <link rel="stylesheet" href="./assets/css/main.css" />
  <link rel="stylesheet" href="./assets/css/movie.css" />
  <link rel="stylesheet" href="./assets/css/footer.css" />

</head>
<body>
  <div class="container main-container">
    <?php include 'header.php';?>
    <main>

      <h1 style = " display: none;  padding: 30px; font-size: 150px;">UNDER CONSTRUCTION</h1>
      <div class="container content">
        <div class = "row">
          <div class = "col-md-8">
            <?php echo strtotime('10 July 2015');

             $result = mysqli_query($con, "SELECT * FROM movie inner join movie_meta on movie_meta.movie_id = movieid WHERE movieid = $movieid ");
             $row = mysqli_fetch_assoc($result);
             ?>
            <h3><?php echo $row['title'];?></h3>
          </div>
          <div class = "col-md-1">
          </div>
          <div class = "col-md-3">
            <h4>AVG. RATING: <?php echo $row['avg_rating'] ?> </h4>

          </div>
        </div>
        <div class = "row">
          <div class="col-md-3">
            <img src="<?php echo $row['title_poster_path']; ?>" >
          </div>
          <div class="col-md-6">
            <h6><?php echo $row['content_rating'],'|', $row['genre'],'|',$row['runtime'],'|',$row['release_date']?></h6>
            <hr/>
            <?php
             $result = mysqli_query($con, "SELECT * FROM movie_meta WHERE movie_id = $movieid ");
             $row = mysqli_fetch_assoc($result);
             ?>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
          <div class="col-md-3 movie-meta-side">
            <h5>Director</h5>
            <?php echo $row['director'];?>
            <hr />
            <h5>Writers</h5>
            <?php echo $row['writer'];?>
            <hr />
            <h5>Budget</h5>
              <?php echo $row['budget'];?>
          </div>
        </div>
        <?php
         $result = mysqli_query($con, "SELECT * FROM cast WHERE movie_id = $movieid ");

         ?>
        <h4>CAST</h4>
        <div class="cast">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Actor</th>
                <th scope="col">Character</th>

              </tr>
            </thead>
            <tbody>
              <?php while($row = mysqli_fetch_assoc($result)){ ?>
              <tr>
                <td><?php echo $row['actor_name']; ?></td>
                <td><?php echo $row['character_name']; ?></td>
              </tr>

          <?php } ?>
          </tbody>
        </table>
      </div>
      <h4>REVIEWS </h4>
      <div class = "reviews">
        <?php
        $query = "SELECT * FROM user_feedback WHERE movie_id = $movieid ORDER BY ";
        if(isset($_SESSION['user_id']))
          $query = $query."user_id = '".$_SESSION['user_id']."' DESC, ";
        $query = $query."date DESC";

         $result = mysqli_query($con, $query );
         while($row = mysqli_fetch_assoc($result)){
         ?>
        <div class="row">

        <div class = "col-md-3">
          <h6>
            <?php
            $uname = $row['user_id'];
            $user_row =  mysqli_query($con, "SELECT * FROM user WHERE userid = $uname ");
            echo mysqli_fetch_assoc($user_row)['fname'];

            ?>
          </h6>
          <p>rated this <h3 class = "rating"><?php echo $row['rating']; ?></h3></p>
          <p>
            <?php echo '(',$row['date'],')'; ?>

          <?php if(isset($_SESSION['user_id']) && $row['user_id'] == $_SESSION['user_id'] ){
            ?>
            <form class="delete" method="POST" action="review.php">
              <input type="text" name="movie_id" value="<?php echo $movieid ?>"  hidden>
              <input type="text" name="user_id" value="<?php echo $_SESSION['user_id'] ?>"  hidden>
              <input type="submit" name="action" value="Delete"/>
            </form>
          <?php } ?>
        </p>
        </div>
        <div class = "col-md-9">
          <p>
            <?php echo $row['review']; ?>
          </p>
        </div>


      </div>
      <hr/>

      <?php } ?>
      </div>
    </div>
    </main>
    <?php include 'footer.php';?>

  </div>
</body>
</html>
<?php mysqli_close($con);
      ?>
