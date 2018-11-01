<?php
   $movieid = $_GET['id'];

   function manage_cookies()
   {
     global $movieid;
     if(!isset($_COOKIE["VIEW_HISTORY"]))
      {
        setcookie("VIEW_HISTORY", $movieid ,time() + (86400 * 30), '/');
        return;
      }
     $cookie_arr = explode(',',$_COOKIE["VIEW_HISTORY"]);
     if(!in_array($movieid, $cookie_arr))
     {
       array_push($cookie_arr, $movieid);
       if(count($cookie_arr) == 8)
        array_splice($cookie_arr, 1, 1);
      $cookie_value = implode(',',$cookie_arr);
       setcookie('VIEW_HISTORY', $cookie_value, time() + 86400 * 30, "/");

     }
   }

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

  <script>
    function checkReviewLength(e)
    {

      var review = document.getElementById("text-review").value.trim();
      if(review.length < 200)
      {

          e.preventDefault();
          document.getElementsByClassName('review-error')[0].innerHMTL = "bla";
      }
    }
  </script>
</head>
<body>
  <div class="container main-container">
    <?php include 'header.php';?>
    <main>

      <h1 style = " display: none;  padding: 30px; font-size: 150px;">UNDER CONSTRUCTION</h1>
      <div class="container content">
        <div class = "row">
          <div class = "col-md-8">
            <?php
            manage_cookies();

             $result = mysqli_query($con, "SELECT * FROM movie inner join movie_meta on movie_meta.movie_id = movie.movie_id WHERE movie.movie_id = $movieid ");
             $row = mysqli_fetch_assoc($result);
             $isReleased = strtotime($row['release_date']) <= strtotime(date("Y-m-d"));
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
            <h6><?php echo $row['content_rating'],'|', $row['genre'],'|',$row['runtime'],'|',date("d M, Y", strtotime($row['release_date']))?></h6>
            <hr/>
            <?php
             $result = mysqli_query($con, "SELECT * FROM movie_meta WHERE movie_id = $movieid ");
             $row = mysqli_fetch_assoc($result);
             ?>
            <p>
              <?php echo $row['summary'];?>
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
    <hr />
    <br/>
    <br/>

      <?php
      if (!$isReleased)
      {
        echo '<h3>Yet to be released. Stay in touch for more updates.</h3>';
      }
      else {


      if(isset($_SESSION['user_id']))
        {
          $query = "SELECT * FROM user_feedback WHERE movie_id = '".$movieid."' and user_id = '".$_SESSION['user_id']."'";
          $result = mysqli_query($con, $query );
          if(mysqli_num_rows($result)==0)
          {
            ?>
            <div class="row">
              <div class="review-error">

              </div>
              <div class="col-md-3">
                <h5>RATE THIS MOVIE:</h5>
              </div>
              <div class="col-md-9">
              <form class="post-review" action="review.php" method="POST">
                <textarea id="text-review" name="review" rows="5"  placeholder = "Your review here (Min. 200 characters)..." ></textarea>
                <input type="submit" id="review-submit" value="submit" name="action" onclick = "checkReviewLength();"/>
              </form>
            </div>
            </div>
            <?php
          }
        }
      ?>
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
            $user_row =  mysqli_query($con, "SELECT * FROM user WHERE user_id = $uname ");
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


      <?php } ?>
      </div>
    <?php } ?>
    </div>
    </main>
    <?php include 'footer.php';?>

  </div>
</body>
</html>
