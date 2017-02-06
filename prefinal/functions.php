<?php
function connect(){
  $db = new PDO("mysql:host=localhost;dbname=student","root","");
  return $db;
}

function selectall(){
  $dbs = connect();
  $query = $dbs->prepare("SELECT * FROM students");
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  return $results;
}

function getstudent($var){
  $db = connect();
  $sth = $db->prepare("SELECT * From students WHERE given= ?");
  $sth->bindParam(1,$var);
  $sth->execute();
  $results = $sth->fetchAll(PDO::FETCH_OBJ);
  return $results;
}

function deleteall(){
 $db = connect();
 $sth = $db->prepare("DELETE FROM students");
 $sth->execute();
 }

function getbyid($id){
  $db = connect();
  $sth = $db->prepare("SELECT * From students WHERE id = ?");
  $sth->bindParam(1,$id);
  $sth->execute();
  $results = $sth->fetch(PDO::FETCH_OBJ);
  return $results;
}

?>
