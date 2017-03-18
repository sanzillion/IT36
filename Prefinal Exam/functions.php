<?php 

function connect(){
	$db = new PDO("mysql:host=localhost;dbname=valle_it36","root","");
	return $db;
}

function selectall(){
	$db = connect();
	$query = $db->prepare("SELECT * FROM tblPork");
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	return $results;
}

function getone($var){
	$db = connect();
	$query = $db->prepare("SELECT * from 
		tblPork WHERE CustId = ?");
	$query->bindParam(1,$var);
	$query->execute();
	$results = $query->fetch(PDO::FETCH_OBJ);
	return $results; 
}

function deleteall(){
	$db = connect();
	$query = $db->prepare("DELETE * FROM tblPork");
	if($query->execute()){
		return true;
	}else{
		return false;
	}
}

function deleteone($var){
	$db = connect();
	$query = $db->prepare("DELETE from tblPork WHERE CustId = ?");
	$query->bindParam(1,$var);
	if($query->execute()){
		return true;
	}else{
		return false;
	}
	
}

function search($var){
	$db = connect();
	$name = "";
	$name .= '%';
	$name .= $var;
	$name .= '%';
	$query = $db->prepare("SELECT * FROM
		tblPork WHERE Name LIKE ?");
	$query->bindParam(1, $name);
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_OBJ);
	return $result;
}

 ?>