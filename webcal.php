<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head>
    <style media="screen" type="text/css">
        input{
          width: 128px;
        }
        button{
          width: 30px;
        }
    </style>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
        <form class="" action="#" method="post">
          <input style="text-align:right;" type="text" name="input" id="input"
          value="<?php
          if(isset($_SESSION['re'])){
              echo $_SESSION['re'];
          }
           ?>"><br><br>
          <button type="submit" name="num" value="1">1</button>
          <button type="submit" name="num" value="2">2</button>
          <button type="submit" name="num" value="3">3</button>
          <button type="submit" name="op" value="+">+</button>
          <br>
          <button type="submit" name="num" value="4">4</button>
          <button type="submit" name="num" value="5">5</button>
          <button type="submit" name="num" value="6">6</button>
          <button type="submit" name="op" value="-">-</button>
          <br>
          <button type="submit" name="num" value="7">7</button>
          <button type="submit" name="num" value="8">8</button>
          <button type="submit" name="num" value="9">9</button>
          <button type="submit" name="op" value="*">*</button>
          <br>
          <button type="submit" name="de" value=".">.</button>
          <button type="submit" name="op" value="0">0</button>
          <button type="submit" name="reset">CE</button>
          <button type="submit" name="eq" value="=">=</button>
        </form>
  </body>
</html>


<?php

if(isset($_POST['reset'])){
  header('Location: destroy.php');
}
elseif(isset($_POST['num']) || isset($_POST['op']) || isset($_POST['de'])){

  if(isset($_SESSION['count']) && isset($_POST['de'])){
    $_SESSION['re'] .= $_POST['de'];
    header('Location: webcal.php');
  }
  elseif(isset($_SESSION['count']) && isset($_POST['num'])){
    $_SESSION['re'] .= $_POST['num'];
    header('Location: webcal.php');
  }
  elseif(isset($_SESSION['count']) && isset($_POST['op'])){
    $_SESSION['re'] .= $_POST['op'];
    header('Location: webcal.php');
  }
  else{
    if(isset($_POST['num'])){
      $_SESSION['re'] = $_POST['num'];
      header('Location: webcal.php');
    }
    elseif(isset($_POST['op'])){
      $_SESSION['re'] = "syntax error";
      header('Location: webcal.php');
    }
    else{
      $_SESSION['re'] = $_POST['de'];
      header('Location: webcal.php');
    }

  }
$_SESSION['count']=1;
}
elseif(isset($_POST['eq'])){
  if (isset($_SESSION['re'])){
    echo $str = $_SESSION['re'];
//     echo '<br>';
//     echo strpos($str, "+");
// echo '<br>';
//     echo $num1 = substr($str, 0, strpos($str, "+"));
// echo '<br>';
//     echo $str = str_replace($num1,'',$str);
//     echo '<br>';
//       $op = strpos($str, "+");
//           echo '<br>';
//       echo $str = str_replace($op,'',$str);
//     echo '<br>';
    echo $num1 = substr($str, 0, strpos($str, "+"));
        echo '<br>';
    echo $num2 = substr($str, strpos($str, "+")+1, strlen($str));
        echo '<br>';
    echo $_SESSION['re'] = $num1 + $num2;
    header('Location: webcal.php');
  } else {
    $_SESSION['re'] = "syntax error!";
  }

}

 ?>
