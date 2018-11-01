<?php
session_start();
$_SESSION['user_id'] = '111';

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'moviedb');
$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

?>
<header>
  <div class="jumbotron jumbotron-fluid ">
    <div class="container">
      <h1 class="display-4 logo">MovieDB</h1>

      <p class="lead text-center"><em>The best community powered online-catalogue for real moviebuffs. </em></p>
      <ul class="nav justify-content-end header-links">
        <?php if(!isset($_SESSION['user_id']))
        {
          ?>
          <li class="nav-item">
            <a class="nav-link active" href="signin.html">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.html">SignUp</a>
          </li>
        <?php }

        else
        {
          ?>
          <li class="nav-item">
            <a class="nav-link active" href="#">My Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
          <?php
        }
        ?>


      </ul>
    </div>
    <div class="container">
      <form class="form-inline" method="get" action="search.php">
          <input type="text"  class="form-control" placeholder="Search for movie " name="title">
          <label>&nbsp &nbsp in Genre: &nbsp &nbsp</label>
          <select class="form-control" name="genre">
            <option selected>All</option>
            <option value="Action">Action</option>
            <option value="Adventure">Adventure</option>
            <option value="Fantasy">Fantasy</option>
            <option value="Horror">Horror</option>
          </select>
          <input type="submit" class="btn btn-dark" value="Search"/>

      </form>
    </div>
  </div>



  <div class="jumbotron jumbotron-fluid">

  </div>
</header>
