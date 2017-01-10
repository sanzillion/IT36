<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="#" method="post">
      <input type="text" name="a" value="" placeholder="Enter 1st Value"><br>
      <input type="text" name="b" value="" placeholder="Enter 2nd Value"><br>
      <button type="submit" name="add">ADD</button>
      <button type="submit" name="mul">MULTIPLY</button>
      <button type="submit" name="sub">SUBTRACT</button>
    </form>
  </body>
</html>

<?php

if(isset($_POST['add'])){
  $a = $_POST['a'];
  $b = $_POST['b'];

  if(is_numeric($a) && is_numeric($b)){
    echo "SUM = ".($a+$b);
  }
  elseif(empty($a) || empty($b)){
     echo "EMPTY TEXTBOXES IS NOT ALLOWED <BR> PLEASE TRY AGAIN <BR> FILL IN ALL TEXTBOXES";
  }
  else{
    echo "$a $b";
  }
}

if(isset($_POST['mul'])){
  $a = $_POST['a'];
  $b = $_POST['b'];

  if(is_numeric($a) && is_numeric($b)){
    echo "PRODUCT = ".($a*$b);
  }
  elseif(empty($a) || empty($b)){
     echo "EMPTY TEXTBOXES IS NOT ALLOWED <BR> PLEASE TRY AGAIN <BR> FILL IN ALL TEXTBOXES";
  }
  else{
    echo "$a $b";
  }
}
if(isset($_POST['sub'])){
  $a = $_POST['a'];
  $b = $_POST['b'];

  if(is_numeric($a) && is_numeric($b)){
    echo "DIFFERENCE = ".($a-$b);
  }
  elseif(empty($a) || empty($b)){
     echo "EMPTY TEXTBOXES IS NOT ALLOWED <BR> PLEASE TRY AGAIN <BR> FILL IN ALL TEXTBOXES";
  }
  else{
    echo "$a $b";
  }
}
 ?>
