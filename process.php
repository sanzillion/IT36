<?php 

session_start();
$arr = [];

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

	if(preg_match('/\W/', $lname)
		|| preg_match('/[^a-z]\s/i', $lname)
		|| preg_match('/\d/', $lname)
		|| strlen($lname) < 2
		|| empty($lname) ){
		$arr[] = "Invalid! You know what a lastname is! tsk!";
		$er1 = "lname";
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
if(preg_match('/\W/', $lname)
		|| preg_match('/[^a-z]\s/i', $lname)
		|| preg_match('/\d/', $lname)
		|| strlen($lname) < 2
		|| empty($lname) ){
	echo "Infuckingvalid";
}
else{
	echo "Valid";
}
 //header('Location: index.php');
 ?>