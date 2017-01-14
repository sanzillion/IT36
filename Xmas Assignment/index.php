
<?php
session_start();

// for return value in each fields
if(isset($_SESSION['sub'])){
	if($_SESSION['sub'] == 1 && isset($_SESSION['return'])){
		$_SESSION['return'];
	}
	else{
		$_SESSION['sub'] == 0;
	}
}

$n = 1; // for error log
// for error log red box
if(isset($_SESSION['errorlog'])){
	$opacity = 1;
}
else{
	$opacity = 0;
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>IT36</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

	<div class="container">
		<h1>Form</h1>
		<div class="line"></div>

		<form method="POST" action="process.php" readonly>
			<h3>Personal Information</h3>
			<table>
			<tr align="">
				<td width="50%">
				<input required type="text" name="lname" placeholder="Last Name"
				value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
				&& isset($_SESSION['return'][0]))
				{ echo $_SESSION['return'][0]; }  ?>"><br>
		 		<input required type="text" name="gname" placeholder="Given Name"
				value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
				&& isset($_SESSION['return'][1]))
				{ echo $_SESSION['return'][1]; }  ?>"><br>
		 		<input required type="text" name="mname" placeholder="Middle name"
				value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
				&& isset($_SESSION['return'][2]))
				{ echo $_SESSION['return'][2]; }  ?>"><br>
		 		<label>Birthdate</label>
		 		<select required name="b-month">
					<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
					&& isset($_SESSION['return'][3]))
					{ echo '<option>'.$_SESSION['return'][3].'</option>'; }
					else{ echo '<option></option>'; } ?>
		 			<option>Jan</option><option>Feb</option>
		 			<option>Mar</option><option>Apr</option>
		 			<option>May</option><option>Jun</option>
		 			<option>Jul</option><option>Aug</option>
		 			<option>Sep</option><option>Oct</option>
		 			<option>Nov</option><option>Dec</option>
		 		</select>
		 		<select required name="b-date">
					<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
					&& isset($_SESSION['return'][4]))
					{ echo '<option>'.$_SESSION['return'][4].'</option>'; }
					else { echo '<option></option>'; }
		 			 for ($i= 1; $i <= 31; $i++) {
		 				echo '<option>'.$i.'</option>';	} ?>
		 		</select>
		 		<select required name="b-yr">
					<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
					&& isset($_SESSION['return'][5]))
					{ echo '<option>'.$_SESSION['return'][5].'</option>'; }
					else{ echo '<option></option>'; }  ?>
		 			<?php for ($i=1945; $i <= 2000; $i++) {
		 				echo '<option>'.$i.'</option>';
		 			} ?>
		 		</select> <br>
		 		<label>Civil Status</label>
		 		<select required name="mstatus">
					<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
					&& isset($_SESSION['return'][6]))
					{ echo '<option>'.$_SESSION['return'][6].'</option>'; }
					else { echo '<option></option>'; }?>
		 			<option>Single</option>
		 			<option>Married</option>
		 			<option>Separated</option>
		 			<option>Divorced</option>
		 			<option>Widowed</option>
		 		</select><br>
		 		<input required type="text" name="dad" placeholder="Father's Name"
				value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
				&& isset($_SESSION['return'][7]))
				{ echo $_SESSION['return'][7]; }  ?>"><br>
		 		<input required type="text" name="mom" placeholder="Mother's Name"
				value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
				&& isset($_SESSION['return'][8]))
				{ echo $_SESSION['return'][8]; }  ?>"><br>
				</td>

				<td width="50%" style="padding-left: 20px; !important">

		 		<textarea required type="text" name="address" placeholder="Home Address"
				<?php if(isset($_SESSION['texterr'])){
					echo "style=\"border-color: #E74C3C !important;\"";
				} ?>><?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
				&& isset($_SESSION['return'][9]))
				{ echo $_SESSION['return'][9]; }  ?></textarea>

		 		<input required type="text" name="nation" placeholder="Nationality"
				value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
				&& isset($_SESSION['return'][10]))
				{ echo $_SESSION['return'][10]; }  ?>"><br>

		 		<input required type="text" name="cnum" placeholder="Contact Number ex. 0907..."
				value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
				&& isset($_SESSION['return'][11]))
				{ echo $_SESSION['return'][11]; }  ?>"><br>

		 		<input required type="text" name="email" placeholder="Email Address"
				value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
				&& isset($_SESSION['return'][12]))
				{ echo $_SESSION['return'][12]; }  ?>"><br>

		 		<input required type="text" name="fb" placeholder="Facebook Account"
				value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
				&& isset($_SESSION['return'][13]))
				{ echo $_SESSION['return'][13]; }  ?>">
				</td>
			</tr>
			</table>

		<table width="100%">
		<tr align="left">
			<th><h3>Educational Background</h3></th>
			<th><h3>Employment Status</h3></th>
		</tr>
		<tr heigth="200px">
		 <td width="50%">
	 		<input required type="text" name="edlvl" placeholder="Educational Level"
			value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
			&& isset($_SESSION['return'][14]))
			{ echo $_SESSION['return'][14]; }  ?>"><br>
	 		<input required type="text" name="school" placeholder="School Name"
			value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
			&& isset($_SESSION['return'][15]))
			{ echo $_SESSION['return'][15]; }  ?>"><br>
	 		<label>Year Graduated </label>
	 		<select required name="g-yr">
				<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
				&& isset($_SESSION['return'][16]))
				{ echo '<option>'.$_SESSION['return'][16].'</option>'; }
				else{ echo '<option></option>';}  ?>
		 			<?php for ($i=1945; $i <= 2016; $i++) {
		 				echo '<option>'.$i.'</option>';
		 			} ?>
		 		</select>
	 		<input required type="text" name="award" placeholder="Award Received"
			value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
			&& isset($_SESSION['return'][17]))
			{ echo $_SESSION['return'][17]; }  ?>">
		 </td>

		 <td width="50%" valign="top" style="padding-left: 20px; !important">
	 		<input required type="text" name="company" placeholder="Company name"
			value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
			&& isset($_SESSION['return'][18]))
			{ echo $_SESSION['return'][18]; }  ?>"><br>
	 		<table>
	 		<tr>
	 			<td><label>Date Started: </label></td>
	 			<td style="padding-left: 10px;">
					<input required type="Date" name="sdate" placeholder="dd/mm/yyyy"
					value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
					&& isset($_SESSION['return'][19]))
					{ echo $_SESSION['return'][19]; }  ?>"></td>
	 		</tr>
	 		<tr>
	 			<td><label>Date Ended: </label></td>
	 			<td style="padding-left: 10px;">
					<input required type="Date" name="edate" placeholder="dd/mm/yyyy"
					value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
					&& isset($_SESSION['return'][20]))
					{ echo $_SESSION['return'][20]; }  ?>"></td>
	 		</tr>
	 		</table>
		 </td>
		</tr>
		</table>

		<table width="100%">
		 <tr>
		  <td width="50%">
	 		<h3>Certificates and Trainings</h3>
	 		<input required type="text" name="train" placeholder="Name of Training"
			value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
			&& isset($_SESSION['return'][21]))
			{ echo $_SESSION['return'][21]; }  ?>"><br>
	 		<label>Training Date </label>
			<input required type="date" name="dtrain" placeholder="dd/mm/yyyy"
			value = "<?php if(isset($_SESSION['sub']) && $_SESSION['sub'] == 1
			&& isset($_SESSION['return'][22]))
			{ echo $_SESSION['return'][22]; }  ?>">
		  </td>

		  <td width="50%" valign="bottom" align="center" style="padding-left: 20px; !important">
			<input required type="submit" name="submit" value="Submit Form">
		  </td>
		 </tr>
		</table>

	 	</form>

	 	<div class="error" style="opacity: <?php echo $opacity; ?>">
	 		<p>
	 		<?php
	 		foreach ($_SESSION['errorlog'] as $k) {
	 			echo 'Error '.$n.': '.$k.'<br>';
	 			$n++;
	 		}
	 		?>
	 		</p>
	 	</div>

		<div class="logout">
			<a href="destroy.php">Logout</a>
		</div>

	</div>

</body>
</html>

<?php

if(isset($_SESSION['input']) || isset($_SESSION['select'])){
	echo "<style type='text/css'>";

	if(isset($_SESSION['input'])){
		foreach ($_SESSION['input'] as $c) {
			echo "input[name=\"$c\"]{
								border-color: #E74C3C !important;
							}";
		}
	}
	if(isset($_SESSION['select'])){
		foreach ($_SESSION['select'] as $s) {
			echo "select[name=\"$s\"]{
								border-color: #E74C3C !important;
							}";
		}
	}


	echo "</style>";
}


 ?>
