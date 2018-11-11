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
      <div class="container site-main-content">
        <h4>Have a query? Feel that your favourite movie is missing from our listings?</h4>
        <h5>Give us a shout...</h5>
        <br />
        <form name="contact">
          <label>Email: </label>
          <br />
          <input type="email" name="email"/>
          <br /><br />
          <label>Message: </label>
          <br />
          <textarea rows="5" cols="90" name="Message"></textarea>
          <br /><br />
          <input type="submit"/>
        </form>
      </div>
    </main>
    <?php include 'footer.php'; ?>
  </div>

</body>
</html>
