<?php
session_start();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <title></title>
  </head>
  <body>
    <div class="container">
        <h1>The Unusual Case of <br>
          <?php echo $_SESSION['fullname']; ?> </h1>
          <div class="line"></div>
          <div class="content">
            <h4 text-align="center">
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <?php echo $_SESSION['out']; ?>
            </h4>
          </div>
          <a class="again" href="destroy.php" text-align="ceter">Try Again</a>
    </div>
  </body>
</html>
