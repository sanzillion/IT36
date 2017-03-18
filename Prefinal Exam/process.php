<?php

include "functions.php"; 
$db = connect();

if(isset($_POST['register'])){
	$n = $_POST['name'];
	$a = $_POST['add'];
	$g = $_POST['sex'];
	$c = $_POST['con'];
	$d = $_POST['deyt'];
	$am = $_POST['amnt'];
	$i = $_POST['item'];

	$query = $db->prepare("INSERT INTO tblPork
		SET Name = '$n',
		Address = '$a', 
		Gender = '$g', 
		Contact = '$c', 
		Date_Purchased = '$d', 
		Amount_Paid = '$am', 
		item_Name = '$i'");

	if($query->execute()){
		header('Location: index.php');
	}else{
		echo "Unsuccessful! "." <a href='register.php'>Try Again</a>";
	}

}

if(isset($_POST['update'])){
	$id = $_POST['id'];
	$n = $_POST['name'];
	$a = $_POST['add'];
	$g = $_POST['sex'];
	$c = $_POST['con'];
	$d = $_POST['deyt'];
	$am = $_POST['amnt'];
	$i = $_POST['item'];

	$query = $db->prepare("UPDATE tblPork SET
	Name = '$n',
	Address = '$a', 
	Gender = '$g', 
	Contact = '$c', 
	Date_Purchased = '$d', 
	Amount_Paid = '$am', 
	item_Name = '$i'
	WHERE CustId = '$id'");

	if($query->execute()){
		header('Location: index.php?success=2');
	}else{
		header('Location: index.php?error=1');
	}
}

 ?>