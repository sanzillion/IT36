<?php
session_start();

if(isset($_SESSION['re'])){
  if($_SESSION['re'] == 0){
      $_SESSION['re'] = "0.";
    }
    elseif($_SESSION['re'] == "syntax error!"){
      header('Location: destroy');
    }
}


?>
<!DOCTYPE html>
<html>
  <head>
    <style media="screen" type="text/css">
        input{
          width: 209px;
          height: 30px;
        }
        button{
          width: 30px;
        }
        button{
          width: 50px;
          height: 50px;
        }
        .container{
          width: 100%;
          position: relative;
        }
        .center{
          display: block;
          margin: 0 auto;
          width: 220px;
        }
    </style>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <form class="center" action="webcal" method="post">
        <input style="text-align:right;" type="text" name="input"
        id="input" value="<?php
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
        <button type="submit" name="num" value="0">0</button>
        <button type="submit" name="reset">CE</button>
        <button type="submit" name="eq" value="=">=</button>
      </form>
    </div>
  </body>
</html>

<?php
//num is number, op is operation and de is decimal
if(isset($_POST['reset'])){
  header('Location: destroy');
}
elseif(isset($_POST['num']) || isset($_POST['op'])
|| isset($_POST['de'])){

  if(isset($_POST['de'])){
    $_SESSION['re'] .= $_POST['de'];
    header('Location: webcal');
  }
  elseif(isset($_POST['num'])){
      $_SESSION['re'] .= $_POST['num'];
      header('Location: webcal');
  }
  elseif(isset($_POST['op'])){
    $_SESSION['re'] .= $_POST['op'];
    $_SESSION['op'] = $_POST['op'];
    header('Location: webcal');
  }
  // else{
  //   if(isset($_POST['num'])){
  //       $_SESSION['re'] .= $_POST['num'];
  //       header('Location: webcal');
  //   }
  //   elseif(isset($_POST['op'])){
  //     $_SESSION['re'] = "syntax error";
  //     header('Location: webcal');
  //   }
  //   else{
  //     $_SESSION['re'] = $_POST['de'];
  //     header('Location: webcal');
  //   }
  //    header('Location: webcal');
  // }
}
elseif(isset($_POST['eq'])){
  if (isset($_SESSION['re'])){
    echo $str = $_SESSION['re'];

    echo $num1 = substr($str, 0, strpos($str, $_SESSION['op']));
        echo '<br>';
    echo $num2 = substr($str, strpos($str, $_SESSION['op'])+1, strlen($str));
        echo '<br>';
    if($_SESSION['op'] == "+"){
      echo $_SESSION['re'] = $num1 + $num2;
      header('Location: webcal');
    }
    elseif($_SESSION['op'] == "-"){
      echo $_SESSION['re'] = $num1 - $num2;
      header('Location: webcal');
    }
    elseif($_SESSION['op'] == "*"){
      echo $_SESSION['re'] = $num1 * $num2;
      header('Location: webcal');
    }
    elseif($_SESSION['op'] == "/"){
      echo $_SESSION['re'] = $num1 / $num2;
      header('Location: webcal');
    }

  } else {
    $_SESSION['re'] = "syntax error!";
  }

}

 ?>
