<?php

session_start();
$arr = []; // for user interface error log
$err = []; // for input box error color
$re = []; //for filling-up form with previous inputs

if(isset($_POST['submit'])){
	$_SESSION['sub'] = 1; // fill up form with previous inputs

	$re[] = $lname = $_POST['lname'];
	$re[] = $gname = $_POST['gname'];
	$re[] = $mname = $_POST['mname'];
	$re[] = $bmonth = $_POST['b-month'];
	$re[] = $bdate = $_POST['b-date'];
	$re[] = $byr = $_POST['b-yr'];
	$re[] = $mstatus = $_POST['mstatus'];
	$re[] = $dad = $_POST['dad'];
	$re[] = $mom = $_POST['mom'];
	$re[] = $address = $_POST['address'];
	$re[] = $nation = $_POST['nation'];
	$re[] = $cnum = $_POST['cnum'];
  	$re[] = $fb = $_POST['fb'];
	$re[] = $edlvl = $_POST['edlvl'];
	$re[] = $school = $_POST['school'];
	$re[] = $gyr = $_POST['g-yr'];
	$re[] = $award = $_POST['award'];
	$re[] = $company = $_POST['company'];
	$re[] = $sdate = $_POST['sdate'];
	$re[] = $edate = $_POST['edate'];
	$re[] = $train = $_POST['train'];
	$re[] = $dtrain = $_POST['dtrain'];
	$re[] = $email = $_POST['email'];

//set date for validation
  $bmonth = $bmonth.'-'.$byr;
	$bmonth = date('m', strtotime($bmonth));

//Lastname validation
	if(strlen($lname) < 1){
		$arr[] = "Lastname Required!";
		$err[] = "lname";
	}
	elseif(checkname($lname)){
		$arr[] = "Invalid Last Name: Type a name correctly";
		$err[] = "lname";
	}

//Given name validation
		if(strlen($gname) < 1){
			$arr[] = "Given Name Required!";
			$err[] = "gname";
		}
		elseif(checkname($gname)){
			$arr[] = "Invalid Given Name: Type a name correctly";
			$err[] = "lname";
		}

//Middle name validation
	if(!isset($mname)){
		$arr[] = "Middle Name Required!";
		$err[] = "mname";
	}
	elseif(checkname($mname)){
		$arr[] = "Invalid Middle Name: Type a name correctly";
		$err[] = "mname";
	}

//Birth Date Validation
	if(!checkdate($bmonth, $bdate, $byr)){
		$arr[] = "Invalid Birth Date";
		$err[] = "B-date";
		$err[] = "B-month";
		$err[] = "B-yr";
	}

// Mobile Number Validation
  if(!preg_match('/\d/', $cnum) || is_numeric($cnum)){
		$arr[] = "Invalid Mobile Number";
		$err[] = "cnum";
	}

//Email Validation
	if(!filter_var($email, FILTER_VALIDATE_INT)){
		$arr[] = "Invalid Email";
		$err[] = "email";
	}

}

//Function for name Validation
function checkname($var){
	if(preg_match('/\W/', $var)
		|| preg_match('/[^a-z]\s/i', $var)
		|| preg_match('/\d/', $var)
		|| strlen($var) < 3
		|| empty($var) ){
		return true;
	}
	else{
		return false;
	}
}

$_SESSION['return'] = $re;
$_SESSION['errorlog'] = $arr;

header('Location: index.php');
 ?>
