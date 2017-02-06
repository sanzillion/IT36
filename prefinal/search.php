<?php
include 'functions.php';
$results = selectall();
if(isset($_POST['search'])){
  $results = getstudent($_POST['byname']);
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="index.php"><<< Back</a>
    <h1>SEARCH</h1>
    <form class="" action="#" method="post">
      <input type="text" name="byname" value="">
      <button type="submit" name="search">Submit</button>
    </form>
    <br>
    <table border="1">
    <tr>
     <th>ID</th>
     <th>Givenname</th>
     <th>Middlename</th>
     <th>Lastname</th>
     <th>Nickname</th>
     <th>Sex</th>
     <th>Age</th>
     <th>Address</th>
     <th>School</th>
     <th>Status</th>
    </tr>
    <?php foreach ($results as $g): ?>
    <tr>
       <td><?php echo $g->id?></td>
       <td><?php echo $g->given?></td>
       <td><?php echo $g->middle?></td>
       <td><?php echo $g->last?></td>
       <td><?php echo $g->nick?></td>
       <td><?php echo $g->sex?></td>
       <td><?php echo $g->age?></td>
       <td><?php echo $g->address?></td>
       <td><?php echo $g->school?></td>
       <td><?php echo $g->status?></td>
      </tr>
    <?php endforeach; ?>
    </table>
  </body>
</html>
