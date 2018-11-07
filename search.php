<?php
$title = $_GET['title'];
$title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $title);
$genre = $_GET['genre'];
$sort_by = $_GET['sort'];
$look_in = $_GET['look_in'];
?>
<html>
<head>
  <meta charset="utf-8"/ />
  <title>MovieDB</title>
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./assets/css/header.css" />
  <link rel="stylesheet" href="./assets/css/main.css" />
  <link rel="stylesheet" href="./assets/css/movie.css" />
  <link rel="stylesheet" href="./assets/css/search.css" />
  <link rel="stylesheet" href="./assets/css/footer.css" />

</head>
<body>
  <div class="container main-container">
    <?php include 'header.php';?>
    <main>
      <div class="container content">
        <?php
        $query = "select m.*, mm.title_poster_path from movie as m, movie_meta as mm where m.movie_id = mm.movie_id and ";
        if($title != '')
        $query = $query." LOWER(m.title) like LOWER('%".$title."%') ";
        else
        {
          $query = $query." 1=1  ";

        }
        if($genre != "All")
          $query = $query." and LOWER(m.genre) like LOWER('%".$genre."%') ";

        //look_in filter
        if($look_in=="All")
          ;
        else if($look_in=="Coming Soon")
        {
          $date =  strtotime(date("Y-m-d"));
          $query = $query."and unix_timestamp(release_date) >".$date." ";
        }
        else if($look_in=="New Releases")
        {
          $date =  strtotime("2017/12/30");
          $today =  strtotime(date("Y-m-d"));
          $query = $query."and unix_timestamp(release_date) >".$date. " and unix_timestamp(release_date) <=".$today." ";
        }
        else if($look_in=="Modern Picks")
        {
          $date =  strtotime("2000/01/01");
          $today =  strtotime(date("Y-m-d"));
          $query = $query."and unix_timestamp(release_date) >".$date. " and unix_timestamp(release_date) <".$today." and avg_rating>7.0  ";
        }
        else if($look_in=="Classics")
        {
          $date =  strtotime("2000/01/01");

          $query = $query."and unix_timestamp(release_date) <".$date. " and avg_rating>7.5 ";
        }
        //sort by stream_get_filters
        if($sort_by=="Popularity")
          $query = $query." order by avg_rating desc";
        else if($sort_by=="Title")
          $query = $query." order by title desc";
        else if($sort_by=="Release Date")
          $query = $query." order by release_date desc";

        //sort

        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result)== 0 || $result == false)
        echo '<h1>No results found :-(</h1>';
        else {
          while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="movie-result">
              <div class="row">
                <div class="col-md-auto">
                  <a href = "movie.php?id=<?php echo $row['movie_id']?>"><img src = '<?php echo $row['title_poster_path']?>' title = '<?php echo $row['title']?>'/></a>
                </div>
                <div class="col-md-4 result-text">
                  <a href = "movie.php?id=<?php echo $row['movie_id']?>"><h3><?php echo $row['title']?></h3></a>
                  <p class="genre">(<?php echo $row['genre']?>)</p>
                  <h5>Rating: <?php
                  if($row['avg_rating']==0)
                  echo '_';
                  else
                  echo $row['avg_rating'].'/10'?>
                </h5>
                <p>Release Date: <?php echo date("d M, Y", strtotime($row['release_date']))?></p>
              </div>

            </div>
          </div>
          <?php
        }
      }
      ?>
    </div>
  </main>

  <?php include 'footer.php';?>

</div>

</body>
</html>
