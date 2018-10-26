<?php
   $title = $_GET['title'];
   $title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $title);
   $genre = $_GET['genre'];

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
      <div class="container content">
        <?php
        $query = "select movieid, title, genre from movie ";
        if($title != '')
          $query = $query."where LOWER(title) like LOWER('%".$title."%') ";
        else
          $query = $query."where 1=1 ";
        if($genre != "All")
          $query = $query."and LOWER(genre) like LOWER('%".$genre."%') ";

         $result = mysqli_query($con, $query);

         if($result == false)
          echo '<h1>No results found :-(</h1>';
        else {
         while($row = mysqli_fetch_assoc($result)){
           echo "<a href='movie.php?id=".$row['movieid']."'><h2>".$row['title']." (".$row['genre'].")</h2></a>";

         }
       }
        ?>
      </div>
    </main>
    <?php include 'footer.php';?>

  </div>
</body>
</html>
<?php mysqli_close($con);?>
