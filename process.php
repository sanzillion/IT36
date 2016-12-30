<?php

session_start();
$arr = []; // for user interface error log
$err = []; // for input box error color
$err_s = []; // for select box error color
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
	$re[] = $email = $_POST['email'];
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

//convert month from word to number for validation
  $bmonth = $bmonth.'-'.$byr;
	$bmonth = date('m', strtotime($bmonth));
		echo $bmonth.'<br>';
		echo $bdate.'<br>';
		echo $byr;

//Lastname validation
	if(strlen($lname) < 1){
		$arr[] = "Lastname Required!";
		$err[] = "lname";
	}
	elseif(checkname($lname)){
		$arr[] = "Invalid Last Name: Type a name correctly!";
		$err[] = "lname";
	}

//Given name validation
		if(strlen($gname) < 1){
			$arr[] = "Given Name Required!";
			$err[] = "gname";
		}
		elseif(checkname($gname)){
			$arr[] = "Invalid Given Name: Type a name correctly!";
			$err[] = "gname";
		}

//Middle name validation
	if(strlen($mname) < 1){
		$arr[] = "Middle Name Required!";
		$err[] = "mname";
	}
	elseif(checkname($mname)){
		$arr[] = "Invalid Middle Name: Type a name correctly!";
		$err[] = "mname";
	}

//Birth Date Validation
if(strlen($bmonth) < 2 && strlen($bdate) < 2 && strlen($byr) < 4){
	if(strlen($bmonth) < 2){
		$arr[] = "Birhtdate Month required!";
		$err_s = "b-month";
	}
	if(strlen($bdate) < 2){
		$arr[] = "Birth Date required!";
		$err_s = "b-date";
	}
	if(strlen($byr) < 4){
		$arr[] = "Birthdate Year required!";
		$err_s = "b-yr";
	}
} elseif(!checkdate($bmonth, $bdate, $byr)){
		$arr[] = "Invalid Birth Date!";
		$err_s[] = "b-date";
		$err_s[] = "b-month";
		$err_s[] = "b-yr";
	}

//Marital Status Validation
 if(strlen($mstatus) < 6){
	 $arr[] = "Civil Status required!";
	 $err_s[] = "mstatus";
 }

//Fathers Name Validation
if(!isset($dad)){
	$arr[] = "Fathers Name required!";
	$err[] = "dad";
}
elseif(checkname($dad)){
	$arr[] = "Invalid Fathers Name!";
	$err[] = "dad";
}

//Mothers Name Validation
if(!isset($mom)){
	$arr[] = "Mothers Name Required!";
	$err[] = "mom";
}
elseif(checkname($mom)){
	$arr[] = "Invalid Mothers Name!";
	$err[] = "mom";
}

//Home Address Validation
if(!isset($address)){
	$arr[] = "Home Address Required!";
	$_SESSION['texterr'] = "address";
}
elseif(strlen($address) < 5){
	$arr[] = "Invalid Home Address!";
	$_SESSION['texterr'] = "address";
}

//Nationality Validation
if(!isset($nation)){
	$arr[] = "Nationality Required!";
	$err[] = "nation";
}
elseif(strlen($nation) < 5){
	$arr[] = "Invalid Nationality!";
	$err[] = "nation";
}

// Mobile Number Validation
if(!isset($cnum)){
	$arr[] = "Mobile Number Required";
	$err[] = "cnum";
}
elseif(!preg_match('/\d/', $cnum) || is_numeric($cnum)){
		$arr[] = "Invalid Mobile Number";
		$err[] = "cnum";
	}

//Email Validation
if(!isset($email)){
	$arr[] = "Email Required";
	$err[] = "email";
}
elseif(!filter_var($email, FILTER_VALIDATE_INT)){
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

print_r ($_SESSION['return'] = $re);
print_r ($_SESSION['errorlog'] = $arr);
print_r ($_SESSION['input'] = $err);
print_r ($_SESSION['select'] = $err_s);
header('Location: index.php');
 ?>
