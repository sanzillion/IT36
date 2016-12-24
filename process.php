<?php 

session_start();
$arr = [];
$err = [];

if(isset($_POST['submit'])){
	$lname = $_POST['lname']; 		$fb = $_POST['fb'];
	$gname = $_POST['gname']; 		$edlvl = $_POST['edlvl'];
	$mname = $_POST['mname']; 		$school = $_POST['school'];
	$bmonth = $_POST['b-month']; 	$gyr = $_POST['g-yr'];
	$bdate = $_POST['b-date']; 		$award = $_POST['award'];
	$byr = $_POST['b-yr']; 			$company = $_POST['company'];
	$mstatus = $_POST['mstatus']; 	$sdate = $_POST['sdate'];
	$dad = $_POST['dad']; 			$edate = $_POST['edate'];
	$mom = $_POST['mom']; 			$train = $_POST['train'];
	$address = $_POST['address']; 	$dtrain = $_POST['dtrain'];
	$nation = $_POST['nation']; 	$email = $_POST['email'];
	$cnum = $_POST['cnum']; 

	if(checkname($lname)){
		$arr[] = "Invalid Last Name: Type a name correctly";
		$err[] = "lname";
	}
	if(checkname($gname)){
		$arr[] = "Invalid Given Name: Type a name correctly";
		$err[] = "gname";
	}
	if(checkname($mname)){
		$arr[] = "Invalid Middle Name: Type a name correctly";
		$err[] = "mname";
	}
	
	if(!filter_var($int, FILTER_VALIDATE_INT)){
		echo "Whatever";
	}


}

$arr[] = "waher";
$arr[] = "who";
$arr[] = "ye";

$_SESSION['errorlog'] = $arr;

print_r($arr);

print_r($_SESSION['errorlog']);

$name = "SANZ MOSES";
echo '<br>'.strlen($name);
echo '<br>'.$name.'<br>';

funtion checkname($var){
	if(preg_match('/\W/', $var)
		|| preg_match('/[^a-z]\s/i', $var)
		|| preg_match('/\d/', $var)
		|| strlen($var) < 2
		|| empty($var) ){
		return true;
	}
	else{
		return false;
	}
}

 //header('Location: index.php');
 ?>