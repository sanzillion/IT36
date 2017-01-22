<!DOCTYPE html>
<html>
<head>
	<title> ice cream </title>
</head>
<body>
<header>
	<div class="container">
		<h1> ICE CREAM </h1>
	</div>
</header>

<form method="POST" action="index.php">
	label:<select name="label" required>
				<option></option>
				<option>MR</option>
				<option>MRS</option>
				<option>MS</option>
			</select>
			<br>
	first name: <input type="text" name="fname" required>
	<br>
	last name: <input type="text" name="lname" required> 
	<br>
	address: <input type="text" name="add" required>
	<br>
	Gender:  <input type="text" name="gender" required>
	<br>

	Classic:<select name="classic">
				<option></option>
				<option>CHOCOLATE</option>
				<option>VANILLA</option>
				<option>UBE PANDAN</option>
			</select>
	Special:<select name="special">
				<option></option>
				<option>DARK CHOCOLATE</option>
				<option>ROCKY ROAD</option>
				<option>MANGO</option>	
			</select>		
			
			<br>
	<pre>ADD TOPPINGS?</pre>		
	<input type="radio" name="toppings" value="Yes"> YES<br>
	<input type="radio" name="toppings" value="No">	NO 
			<br>
			<br>
	<pre>ADD CONE?</pre>		
	<input type="radio" name="cone" value="sweet"> SWEET CONE<br>
	<input type="radio" name="cone" value="cup"> CUP 
			<br>
			<br>		

	<input type="submit" name="submit" value="ORDER" /s>
</form>



</body>
</html>
<?php
	
	


	if (isset($_POST['submit'])) {
			if ($_POST['classic'] && $_POST['special']) {
				echo classic_special();
			}
			elseif ($_POST['classic'] || $_POST['special']) {
				echo classicORspecial();
			}
			
				
    	}
    else{
    	echo "fail";
    }



	function classic_special(){
	$classic = 25;
	$special = 35;
	$toppings = 5;
	$cone = 3;
	$label = $_POST['label'];
	$lastname = $_POST['lname'];
	$firstname = strtoupper($_POST['fname']);
	$address = strtoupper($_POST['add']);
		if ($_POST['toppings']=="Yes") {
			if ($_POST['cone']=="sweet") {
				$total_amount = $classic + $special + $toppings + $cone;
				echo "HELLO ".$label." ".$lastname.",".$firstname." of ".$address." your total bill is ".$total_amount;
			}
			elseif ($_POST['cone']=="cup") {
				$total_amount = $classic + $special + $toppings + $cone;
				echo "HELLO ".$lastname.",".$firstname." of ".$address." your total bill is ".$total_amount;
			}
			
		}
		elseif ($_POST['toppings']=="No") {
			$total_amount = $classic + $special + $cone;
			echo "HELLO ".$lastname.",".$firstname." of ".$address." your total bill is ".$total_amount;
		}
		else
			echo "fail";
	}

	function classicORspecial(){
		$classic = 25;
	$special = 35;
	$toppings = 5;
	$cone = 3;
	$label = $_POST['label'];
	$lastname = $_POST['lname'];
	$firstname = strtoupper($_POST['fname']);
	$address = strtoupper($_POST['add']);


		if ($_POST['classic']) {
			if ($_POST['toppings']=="Yes") {
			if ($_POST['cone']=="sweet") {
				$total_amount = $classic +  $toppings + $cone;
				echo "HELLO ".$label." ".$lastname.",".$firstname." of ".$address." your total bill is ".$total_amount;
			}
			elseif ($_POST['cone']=="cup") {
				$total_amount = $classic + $toppings + $cone;
				echo "HELLO ".$lastname.",".$firstname." of ".$address." your total bill is ".$total_amount;
			}
			
		}
		elseif ($_POST['toppings']=="No") {
			$total_amount = $classic + $cone;
			echo "HELLO ".$lastname.",".$firstname." of ".$address." your total bill is ".$total_amount;
		}
		else
			echo "fail";
		}
	elseif ($_POST['special']) {
		if ($_POST['toppings']=="Yes") {
			if ($_POST['cone']=="sweet") {
				$total_amount =  $special + $toppings + $cone;
				echo "HELLO ".$label." ".$lastname.",".$firstname." of ".$address." your total bill is ".$total_amount;
			}
			elseif ($_POST['cone']=="cup") {
				$total_amount = $special + $toppings + $cone;
				echo "HELLO ".$lastname.",".$firstname." of ".$address." your total bill is ".$total_amount;
			}
			
		}
		elseif ($_POST['toppings']=="No") {
			$total_amount =  $special + $cone;
			echo "HELLO ".$lastname.",".$firstname." of ".$address." your total bill is ".$total_amount;
		}
		else
			echo "fail";
	}
	}

?>