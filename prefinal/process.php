<?php
include 'functions.php';
$db = connect();

echo "PROCESSING...";

if(isset($_POST['option'])){
	if($_POST['options'] == "CREATE"){
		header('Location: create.php');
	}
	elseif ($_POST['options'] == "DELETES") {
		header('Location: delete.php');
	}
	elseif($_POST['options'] == "SEARCH"){
		header('Location: search.php');
	}
	else{
    header('Location: update.php');
	}
}

if(isset($_POST['submit'])){
 $g = $_POST['gname'];
 $m = $_POST['mname'];
 $l = $_POST['lname'];
 $n = $_POST['nick'];
 $s = $_POST['sex'];
 $a = $_POST['age'];
 $ad = $_POST['add'];
 $sc = $_POST['sch'];
 $st = $_POST['stat'];

 $query = $db->prepare("INSERT INTO students
    SET given = :g,
    middle = :m,
    last = :l,
    nick = :n,
    sex = :s,
    age = :a,
    address = :ad,
    school = :sc,
   status = :st");

   $vina = [':g' => $g,
         ':m' => $m,
         ':l' => $l,
         ':n' => $n,
         ':s' => $s,
         ':a' => $a,
         ':ad' => $ad,
         ':sc' => $sc,
         ':st' => $st
         ];

 if($query->execute($vina)){
   echo "Success! "." <a href='index.php'>Back</a> ";
 }
 else{
   echo "Unsuccessful! "."<a href='index.php'>Back</a>";
 }

}

if(isset($_GET['id'])){
 $query2 = $db->prepare("DELETE from students WHERE id = ?");
 $query2->bindParam(1,$_GET['id']);
 if($query2->execute()){
   echo "Success! "." <a href='index.php'>Back</a> ";
 }
 else{
   echo "Unsuccessful! "."<a href='index.php'>Back</a>";
 }
}

 if(!empty($_GET['deleteall'])){
   deleteall();
   echo "Successfully deleted everyone! "." <a href='index.php'>Back</a> ";
 }

 if(isset($_POST['update'])){
   $id = $_POST['id'];
   $g = $_POST['gname'];
   $m = $_POST['mname'];
   $l = $_POST['lname'];
   $n = $_POST['nick'];
   $s = $_POST['sex'];
   $a = $_POST['age'];
   $ad = $_POST['add'];
   $sc = $_POST['sch'];
   $st = $_POST['stat'];

   $stmt = $db->prepare("UPDATE students
      SET given = :g,
      middle = :m,
      last = :l,
      nick = :n,
      sex = :s,
      age = :a,
      address = :ad,
      school = :sc,
     status = :st WHERE id = :id");

     $stmt->bindValue('g',$g);
     $stmt->bindValue('m',$m);
     $stmt->bindValue('l',$l);
     $stmt->bindValue('n',$n);
     $stmt->bindValue('s',$s);
     $stmt->bindValue('a',$a);
     $stmt->bindValue('ad',$ad);
     $stmt->bindValue('sc',$sc);
     $stmt->bindValue('st',$st);
     $stmt->bindValue('id',$id);

     if($stmt->execute()){
       echo "Update Success! "." <a href='index.php'>Back</a> ";
     }
     else{
       echo "Unsuccessful Update! "."<a href='index.php'>Back</a>";
     }

 }

 ?>
