
<?php
session_start();

$_SESSION['texterr'] = null; //for textarea
$errorcount = 0; //initialize variable for it to be always 0 before validation
$arr = array(); // for user interface error log
$err = []; // for input box error color
$err_s = array(); // for select box error color
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
if(!empty($bmonth) || strlen($bmonth) == 3){
	$bmonth = $bmonth.'-'.$byr;
	$bmonth = date('m', strtotime($bmonth));
	$bmonth2 = date('M', strtotime($bmonth));
}

//Lastname validation
	if(strlen($lname) < 1){
		$arr[] = "Lastname Required!";
		$err[] = "lname";
		$errorcount++;
	}
	elseif(checkname($lname)){
		$arr[] = "Invalid Last Name: Type a name correctly!";
		$err[] = "lname";
		$errorcount++;
	}

//Given name validation
		if(strlen($gname) < 1){
			$arr[] = "Given Name Required!";
			$err[] = "gname";
			$errorcount++;
		}
		elseif(checkname($gname)){
			$arr[] = "Invalid Given Name: Type a name correctly!";
			$err[] = "gname";
			$errorcount++;
		}

//Middle name validation
	if(strlen($mname) < 1){
		$arr[] = "Middle Name Required!";
		$err[] = "mname";
		$errorcount++;
	}
	elseif(checkname($mname)){
		$arr[] = "Invalid Middle Name: Type a name correctly!";
		$err[] = "mname";
		$errorcount++;
	}

//Birth Date Validation
if(strlen($bmonth) < 2 || strlen($bdate) < 2 || strlen($byr) < 4){
	if(strlen($bmonth) < 2 || empty($bmonth)){
		$arr[] = "Birhtdate Month required!";
		$err_s[] = "b-month";
		$errorcount++;
	}
	if(strlen($bdate) < 1 || empty($bdate)){
		$arr[] = "Birth Date required!";
		$err_s[] = "b-date";
		$errorcount++;
	}
	if(strlen($byr) < 4 || empty($byr)){
		$arr[] = "Birthdate Year required!";
		$err_s[] = "b-yr";
		$errorcount++;
	}
} elseif(!checkdate($bmonth, $bdate, $byr)){
		$arr[] = "Invalid Birth Date!";
		$err_s[] = "b-date";
		$err_s[] = "b-month";
		$err_s[] = "b-yr";
		$errorcount++;
	}

//Marital Status Validation
 if(strlen($mstatus) < 6){
	 $arr[] = "Civil Status required!";
	 $err_s[] = "mstatus";
	 $errorcount++;
 }

//Fathers Name Validation
if(!isset($dad)){
	$arr[] = "Fathers Name required!";
	$err[] = "dad";
	$errorcount++;
}
elseif(checkname($dad)){
	$arr[] = "Invalid Fathers Name!";
	$err[] = "dad";
	$errorcount++;
}

//Mothers Name Validation
if(!isset($mom)){
	$arr[] = "Mothers Name Required!";
	$err[] = "mom";
	$errorcount++;
}
elseif(checkname($mom)){
	$arr[] = "Invalid Mothers Name!";
	$err[] = "mom";
	$errorcount++;
}

//Home Address Validation
if(!isset($address)){
	$arr[] = "Home Address Required!";
	$_SESSION['texterr'] = "address";
	$errorcount++;
}
elseif(strlen($address) < 5){
	$arr[] = "Invalid Home Address!";
	$_SESSION['texterr'] = "address";
	$errorcount++;
}

//Nationality Validation
if(!isset($nation)){
	$arr[] = "Nationality Required!";
	$err[] = "nation";
	$errorcount++;
}
elseif(strlen($nation) < 5){
	$arr[] = "Invalid Nationality!";
	$err[] = "nation";
	$errorcount++;
}

// Mobile Number Validation
if(!isset($cnum) || strlen($cnum) < 11){
	$arr[] = "Mobile Number Required";
	$err[] = "cnum";
	$errorcount++;
}
elseif(!preg_match('/\d/', $cnum)
|| !is_numeric($cnum)){
		$arr[] = "Invalid Mobile Number";
		$err[] = "cnum";
		$errorcount++;
	}

//Email Validation
if(!isset($email)){
	$arr[] = "Email Required";
	$err[] = "email";
	$errorcount++;
}
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$arr[] = "Invalid Email";
	$err[] = "email";
	$errorcount++;
}

// fb validation
if(!isset($fb) || strlen($fb) < 2 || preg_match('/\W/', $fb)
	|| checkname($fb)){
	$arr[] = "fb name invalid: type your fb username";
	$err[] = "fb";
	$errorcount++;
}

// Educational Level
if(empty($edlvl) || checkname($edlvl)){
	$arr[] = "Educational Level Required or Invalid Input";
	$err[] = "edlvl";
	$errorcount++;
}

//School Name Validation
if(empty($school) || preg_match("/[^a-zA-Z\s\.\-]/", $school)){
	$arr[] = "School Required or Invalid School Name";
	$err[] = "school";
	$errorcount++;
}

// select drop down year graduated Validation
if(empty($gyr) || strlen($gyr) < 4){
	$arr[] = "Year Graduated Required";
	$err_s[] = "g-yr";
	$errorcount++;
}
elseif(($gyr - $byr) < 5 && ($gyr - $byr) > -1){
	$arr[] = "Did you graduate from school when you were just milking your mom?";
	$err_s[] = "g-yr";
	$err_s[] = "b-yr";
	$errorcount++;
}
elseif($byr > $gyr){
	$arr[] = "Did you graduate from any school when you were just a sperm?";
	$err_s[] = "g-yr";
	$err_s[] = "b-yr";
	$errorcount++;
}
else{
	$empdatey = date('Y', strtotime($sdate));
	$tdatey = date('Y', strtotime($dtrain));
	if($byr >= $empdatey && ($empdate - $byr) < 7 ){
		$arr[] = "Employment or Birthyear Invalid! Not possible!";
		$err_s[] = "b-yr";
		$err[] = "sdate";
		$errorcount++;
	}
	elseif($byr >= $tdatey && ($tdatey - $byr) < 7){
		$arr[] = "Training or Birthyear Invalid! Not plausible!";
		$err_s[] = "b-yr";
		$err[] = "dtrain";
		$errorcount++;
	}
}

//Award Received Validation
if(empty($award) || preg_match("/[^a-zA-Z\s\d\.\-]/",$award)){
	$arr[] = "Award Received Required or Invalid Input";
	$err[] = "award";
	$errorcount++;
}

//Company Name Validation
if(empty($company) || preg_match("/[^a-zA-Z\s\d\.\-]/",$company)){
	$arr[] = "Company name required or Invalid Company Name";
	$err[] = "company";
	$errorcount++;
}

//Employment Date Started Validation
if(empty($sdate)){
	$arr[] = "Employment Start Date is required!";
	$err[] = "sdate";
	$errorcount++;
}
else{
	$sdatem = date('m', strtotime($sdate));
	$sdated = date('d', strtotime($sdate));
	$sdatey = date('Y', strtotime($sdate));
	if(!checkdate($sdatem, $sdated, $sdatey)){
		$arr[] = "Employment Start Date is an invalid Date";
		$err[] = "sdate";
		$errorcount++;
	}
}

//Employment Date Ended Validaiton
if(empty($edate)){
	$arr[] = "Employment End Date is required!";
	$err[] = "edate";
	$errorcount++;
}
else{
	$edatem = date('m', strtotime($edate));
	$edated = date('d', strtotime($edate));
	$edatey = date('Y', strtotime($edate));
	if(!checkdate($edatem, $edated, $edatey)){
		$arr[] = "Employment End Date is an invalid Date";
		$err[] = "edate";
		$errorcount++;
	}
}

//Start and End date evaluation
if(empty($sdate) && empty($edate)){
	$arr[] = "Start date and end date required!";
	$errorcount++;
}
else{
	if(check2dates($sdate,$edate)){
		$arr[] = "Start date should be earlier than end date!";
		$err[] = "edate";
		$err[] = "sdate";
		$errorcount++;
	}
}

//Name of Training Validation
if(empty($train) || preg_match("/[^a-zA-Z\s\d\.\-]/",$train)){
	$arr[] = "Training name required or Invalid Input";
	$err[] = "train";
	$errorcount++;
}

//Training Date Validation
if(empty($dtrain)){
	$arr[] = "Training Date is required!";
	$err[] = "dtrain";
	$errorcount++;
}
else{
	$dtrainm = date('m', strtotime($dtrain));
	$dtraind = date('d', strtotime($dtrain));
	$dtrainy = date('Y', strtotime($dtrain));
	if(!checkdate($dtrainm, $dtraind, $dtrainy)){
		$arr[] = "Training Date is an invalid Date";
		$err[] = "dtrain";
		$errorcount++;
	}
}

$_SESSION['return'] = $re;
$_SESSION['errorlog'] = $arr;
$_SESSION['input'] = $err;
$_SESSION['select'] = $err_s;
$_SESSION['fullname'] = $gname.' '.$mname.' '.$lname;

	if($errorcount > 0){
		header('Location: index.php');
	}
	else{
		unset($_SESSION['errorlog']);
		unset($_SESSION['input']);
		unset($_SESSION['select']);

		echo $_SESSION['out'] = "There was once a <i>$nation</i> boy named <i>$gname</i> born on $bmonth2</i>
		 <i>$bdate</i> on the year <i>$byr</i>. His father <i>$dad</i> works as a fisherman and his mother
		 ashore from a distant shipwreck. <i>$gname</i> thought it was odd that the bag was
		 <i>$mom</i> is a housewife. They lived at <i>$address</i>, nearby coast. One day, a bag drift
		 wrapped in plastic. He opened it and was amaze that the bag was as dry as the
		 desert. He opened the bag and saw wonderful devices, so he thought. He took it
		 home and played and studied it for years while he was still completing
		 his <i>$edlvl studying at <i>$school</i>. As he discovered a world inside the devices,
		 he thought how would the number <i>\"$cnum\"</i> or a bunch of characters like <i>\"$email\"</i>
		 or even just a name like <i>\"$fb\"</i> could communicate from people all over the world.
		 He thought it was real magic! So that, when he graduated on year <i>$gyr</i> from <i>$edlvl</i>
		 he received the <i>\"$award\"</i> because of his constant contact from his virtual
		 friends of which he kept secret from the rest of his classmates. Because of his
		 award, he was immediately hired in a company named <i>\"$company\"</i> on <i>$sdate</i>,
		 had some training regarding <i>$train</i> on <i>$dtrain</i> until he ended his employment
		 contract on <i>$edate</i>. The only thing unusual would be the shipwreck.";

		header('Location: output.php');
	}
 }

 function checkname($var){
	 if(preg_match("/[^a-zA-Z\s]/", $var)
			|| strlen($var) < 2
			|| empty($var)){
				return true;
			}
			else{
				false;
			}
 }

 function check2dates($sdate,$edate){
	$sdatem = date('m', strtotime($sdate));
 	$sdated = date('d', strtotime($sdate));
 	$sdatey = date('Y', strtotime($sdate));
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
