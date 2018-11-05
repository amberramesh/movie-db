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
            <h4>AVG. RATING: 
			<?php if($row['avg_rating']==0)
				echo "-";
			else
			echo $row['avg_rating'] ?> 
			</h4>

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
                <br />
                <div class="rating-slider">
                  <label name="rating" id="user-rating">5.0 </label><label>/ <b>10.0</b></label>
                  <input type = "range" min="1.0" max="10.0" step="0.5" value="5.0" oninput="changeRating(this.value);"/ >
                </div>
                <br/>
                <!-- for toggling reviewbox
                <div class="enable-review-div">
                  <input type = "checkbox" onclick="toggleReviewBox(this.checked);"/ >
                  <label>Leave a review</label>
                </div>
              -->
              </div>
              <div class="col-md-9">
                <br /><br />
              <form class="post-review" action="review.php" method="POST" >
                <textarea id="text-review" name="review" rows="5"  placeholder = "Your review here (Min. 50 characters)..."  oninput= "checkReviewLength(this.value);" ></textarea>
                <input type="number" name="user_id" value =<?php echo $_SESSION['user_id']?> hidden />
                <input type="text" name="movie_id" value =<?php echo $movieid?> hidden/>
                <input type="text" id="rating-for-submit" name="rating" value="5.0" hidden/ >
                <input type="submit" id="review-submit" name="action" value="Post"  disabled/>
                <input type="text" name="movie_id" value="<?php echo $movieid ?>"  hidden>
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
            $rater_name = mysqli_fetch_assoc($user_row)['fname'];
            if($uname==0)
              echo "<b>Anonymous</b>";
            else {
              echo '<b><a href="account.php';
			  if(isset($_SESSION["user_id"]) && $_SESSION['user_id'] != $uname)
				echo '?user_id='.$uname;
			  echo '">'.$rater_name.'</a></b>';
			}

            ?>
          </h6>
          <p>rated this <h3 class = "rating"><?php echo $row['rating']; ?></h3></p>
          <p>
            <?php echo '(',date("F jS, Y", strtotime($row["date"])),')'; ?>

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
      <hr>
  </br>


      <?php } ?>
      </div>
    <?php } ?>
    </div>
    </main>
    <?php include 'footer.php';?>
    <script>

      function changeRating(val)
      {
        document.getElementById("user-rating").innerHTML = val;
        document.getElementById("rating-for-submit").value = val;
      }
      /*
      function toggleReviewBox(checked)
      {
        var text = document.getElementById("text-review");

        var submit = document.getElementById("review-submit")
        if(checked == true)
        {
          text.disabled = false;
          checkReviewLength(text.value);
        }
        else {
          text.disabled = true;
          submit.disabled = true;
        }
      }
      */
      function checkReviewLength(review)
      {

        if(review.trim().length >= 50)
        {
          document.getElementById("review-submit").disabled = false;
        }
        else {
          document.getElementById("review-submit").disabled = true;
        }
      }
    </script>
  </div>
</body>
</html>
