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

    $bmonth = $bmonth.'-'.$byr;
	$bmonth = date('m', strtotime($bmonth));

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
	if(!checkdate($bmonth, $bdate, $byr)){
		$arr[] = "Invalid Birth Date";
		$err[] = "B-date";
		$err[] = "B-month";
		$err[] = "B-yr";
	}



	if(!filter_var($email, FILTER_VALIDATE_INT)){
		$arr[] = "Invalid Email";
		$err[] = "email";
	}


}

function checkname($var){
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

print_r($err);
 //header('Location: index.php');
 ?>