<?php
session_start();
$n = 1;
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

		<form method="POST" action="process.php">
			<h3>Personal Information</h3>
			<table>
			<tr align="">
				<td width="50%">
				<input type="text" name="lname" placeholder="Last Name"><br>
		 		<input type="text" name="gname" placeholder="Given Name"><br>
		 		<input type="text" name="mname" placeholder="Middle name"><br>
		 		<label>Birthdate</label>
		 		<select name="b-month"
		 			<option>Jan</option><option>Feb</option>
		 			<option>Mar</option><option>Apr</option>
		 			<option>May</option><option>Jun</option>
		 			<option>Jul</option><option>Aug</option>
		 			<option>Sep</option><option>Oct</option>
		 			<option>Nov</option><option>Dec</option>
		 		</select>
		 		<select name="b-date">
		 			<?php for ($i= 1; $i <= 31; $i++) {
		 				echo '<option>'.$i.'</option>';
		 			} ?>
		 		</select>
		 		<select name="b-yr">
		 			<?php for ($i=1945; $i <= 2000; $i++) {
		 				echo '<option>'.$i.'</option>';
		 			} ?>
		 		</select> <br>
		 		<label>Civil Status</label>
		 		<select name="mstatus">
		 			<option>Single</option>
		 			<option>Married</option>
		 			<option>Separated</option>
		 			<option>Divorced</option>
		 			<option>Widowed</option>
		 		</select><br>
		 		<input type="text" name="dad" placeholder="Father's Name"><br>
		 		<input type="text" name="mom" placeholder="Mother's Name"><br>
				</td>

				<td width="50%" style="padding-left: 20px; !important">

		 		<textarea type="text" name="address" placeholder="Home Address"></textarea>
		 		<input type="text" name="nation" placeholder="Nationality"><br>
		 		<input type="text" name="cnum" placeholder="Contact Number"><br>
		 		<input type="text" name="email" placeholder="Email Address"><br>
		 		<input type="text" name="fb" placeholder="Facebook Account">
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
	 		<input type="text" name="edlvl" placeholder="Educational Level"><br>
	 		<input type="text" name="school" placeholder="School Name"><br>
	 		<label>Year Graduated </label>
	 		<select name="g-yr">
		 			<?php for ($i=1945; $i <= 2016; $i++) {
		 				echo '<option>'.$i.'</option>';
		 			} ?>
		 		</select>
	 		<input type="text" name="award" placeholder="Award Received">
		 </td>

		 <td width="50%" valign="top" style="padding-left: 20px; !important">
	 		<input type="text" name="company" placeholder="Company name"><br>
	 		<table>
	 		<tr>
	 			<td><label>Date Started: </label></td>
	 			<td style="padding-left: 10px;"><input type="Date" name="sdate" placeholder="Date started"></td>
	 		</tr>
	 		<tr>
	 			<td><label>Date Ended: </label></td>
	 			<td style="padding-left: 10px;"><input type="Date" name="edate" placeholder="Date ended"></td>
	 		</tr>
	 		</table>
		 </td>
		</tr>
		</table>

		<table width="100%">
		 <tr>
		  <td width="50%">
	 		<h3>Certificates and Trainings</h3>
	 		<input type="text" name="train" placeholder="Name of Training"><br>
	 		<label>Training Date </label><input type="date" name="dtrain" placeholder="Date of Training">
		  </td>

		  <td width="50%" valign="bottom" align="center" style="padding-left: 20px; !important">
			<input type="submit" name="submit" value="Submit Form">
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
	</div>

</body>
</html>
