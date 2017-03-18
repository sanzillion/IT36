<?php 
include "functions.php";

if(isset($_GET['delete'])){
	$db = connect();
	echo $_GET['delete'];
	echo "Im here";
	$query1 = $db->prepare("DELETE FROM 
		tblPork WHERE Name = ?");
	$query1->bindParam(1,$_GET['delete']);
	if($query1->execute()){
		echo "success";
		header('Location: index.php');
	}
	else{
		echo "failed";
	}
}

 ?>