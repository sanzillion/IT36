<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="#" method="post">
      <input type="date" name="sdate" value="">
      <input type="date" name="edate" value="">
      <input type="submit" name="submit" value="">
    </form>
  </body>
</html>

<?php

if(isset($_POST['submit'])){
  $sdate = $_POST['sdate'];
  $edate = $_POST['edate'];

  if(check2dates($sdate,$edate)){
    echo "invalid date";
  }

}


function check2dates($sdate,$edate){
 echo $sdatem = date('m', strtotime($edate));
 echo $sdated = date('d', strtotime($edate));
 echo $sdatey = date('Y', strtotime($edate));
 $edatem = date('m', strtotime($edate));
 $edated = date('d', strtotime($edate));
 $edatey = date('Y', strtotime($edate));
 if($sdatey == $edatey){
   if($sdatem == $edatem){
     if($sdated == $edated){
       return true; //invalid date
     }
     elseif($sdated > $edated){
       return true; //invalid date
     }
     else{
       return false; //valid date
     }
   }
   elseif($sdatem > $edatem){
     return true; //invalid date
   }
   else{
     return false; //valid date
   }
 }
 elseif($sdatey > $edatey){
   return true; //invalid date
 }
 else{
   return false; //valid date
 }
}



 ?>
