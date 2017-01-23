<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>IT36 Midterm Exam
	</title>
	<link rel="stylesheet" href="master.css">
</head>
<body>
	<div class="container text-center padside padtop shadow">
	<h3>WELCOME TO I SCREAM STORE</h3>

	<form method="POST" action="">
		</label><input required type="text" name="name" placeholder="Full"
		value="<?php if(!empty($_SESSION['name'])){
			echo $_SESSION['name'];
		} ?>">
		<br>
		<input required type="text" name="add" placeholder="Address"
		value="<?php if(!empty($_SESSION['add'])){
			echo $_SESSION['add'];
		} ?>"><br>
		<label>Male</label>
		<input required type="radio" name="sex" value="male"
		<?php if(!empty($_SESSION['sex']) && $_SESSION['sex'] = "male"){
			echo "checked";
		} ?>>
		<label>Female</label>
		<input required type="radio" name="sex" value="female"
		<?php if(!empty($_SESSION['sex']) && $_SESSION['sex'] = "female"){
			echo "checked";
		} ?>><br>
		<input class="topmargin block" type="submit" name="submit" value="Order Ice Cream">
	</form>
	<div class="container-2">
		<?php
			if(isset($_POST['submit'])){
				$_SESSION['name'] = ucwords($_POST['name']);
				$_SESSION['add'] = ucwords($_POST['add']);
				$_SESSION['sex'] = $_POST['sex'];
				$_SESSION['cost'] = 0;

				if(checkname($_SESSION['name'])){
					$_SESSION['errname'] = "Invalid Name";
					echo '<script>alert("'.$_SESSION['errname'].'")</script>';
					unset($_SESSION['name']);
				}
				elseif(checkadd($_SESSION['add'])){
					$_SESSION['erradd'] = "Invalid Address";
					echo '<script>alert("'.$_SESSION['erradd'].'")</script>';
					unset($_SESSION['add']);
				}
				else {
					echo "
						<form method='POST' action=''>
						<label>Choose ice cream type : </label><select name='type' required>
							<option>Classic</option>
							<option>Special</option>
						</select><br>
						<label>How many order?</label><select name='scoop' required=>
							<option disabled>How many order?</option>
							 <option>1</opttion><option>2</opttion>
							 <option>3</opttion><option>4</opttion>
							 <option>5</opttion><option>6</opttion>
							 <option>7</opttion><option>8</opttion>
							 <option>9</opttion><option>10</opttion>
						</select><br>
						<button class='block' type='submit' name='cont'>Continue</button>
						</form>
					";
				}
			}
			if(isset($_POST['cont'])){

					$_SESSION['type'] = $_POST['type'];
					$_SESSION['scoop'] = $_POST['scoop'];
					if($_SESSION['type'] == "Classic"){
						$_SESSION['cost'] = 25;
					}else{
						$_SESSION['cost'] = 35;
					}

					if($_SESSION['type'] == "Classic"){
						echo "
						<form method='POST' action=''>
							<label>Choose Classic Flavor</label><select name='flavor'>
								<option>Chocolate</option>
								<option>Vanilla</option>
								<option>Mango</option>
							</select><br>
							<label>Choose Special Flavor</label><select name='flavor' disabled>
								<option>Rocky Road</option>
								<option>Oreo Road</option>
								<option>Chimichangga</option>
							</select>
							<p>Topppings :</p>
							<input type='checkbox' name='Sprinkles' value='Sprinkles'><label>Sprinkles</label>
							<input type='checkbox' name='Chocotop' value='Chocotop'><label>Choco Top</label>
							<input type='checkbox' name='Cookies' value='Cookie'><label>Cookies</label>
							<p>Cones :</p>
							<input type='radio' name='cone' value='Cup Plus'><label>Cup-plus</label>
							<input type='radio' name='cone' value='Sweet Cone'><label>Sweet Cone</label><br>
							<button class='topmargin block' type='submit' name='final'>Finalize Order</button>
						</form>
						";
					}else{
						echo "
						<form method='POST' action=''>
							<label>Choose Classic Flavor</label><select name='flavor' disabled>
								<option>Chocolate</option>
								<option>Vanilla</option>
								<option>Mango</option>
							</select><br>
							<label>Choose Special Flavor</label><select name='flavor'>
								<option>Rocky Road</option>
								<option>Oreo Road</option>
								<option>Chimichangga</option>
							</select>
							<p>Topppings :</p>
							<input type='checkbox' name='Sprinkles' value='Sprinkles'><label>Sprinkles</label>
							<input type='checkbox' name='Chocotop' value='Chocotop'><label>Choco Top</label>
							<input type='checkbox' name='Cookies' value='Cookie'><label>Cookies</label>
							<p>Cones :</p>
							<input type='radio' name='cone' value='Cup Plus' required><label>Cup-plus</label>
							<input type='radio' name='cone' value='Sweet Cone' required><label>Sweet Cone</label><br>
							<button class='topmargin block' type='submit' name='final'>Finalize Order</button>
						</form>
						";
					}
				}
				if(isset($_POST['final'])){
					echo '<br>';
					echo 'Name: <b>'.$_SESSION['name'].'</b><br>';
					echo 'Address: <b>'.$_SESSION['add'].'</b><br>';
					echo 'Gender: <b>'.$_SESSION['sex'].'</b><br>';
					if($_SESSION['type'] = "Classic"){
						$tcost = 25;
					}
					else{
						$tcost = 35;
					}
					if(isset($_POST['cone'])){
						$cone = $_POST['cone'];
					}
					else{
					 $cone - "None";
					}
					$toppings = "";
					$topcost = 0;
					if(isset($_POST['Sprinkles'])){
						$toppings .= $_POST['Sprinkles'].' ';
						$_SESSION['cost'] += 5;
						$topcost += 5;
					}
					if(isset($_POST['Cookies'])){
						$toppings .= $_POST['Cookies'].' ';
						$_SESSION['cost'] += 5;
						$topcost += 5;
					}
					if(isset($_POST['Chocotop'])){
						$_SESSION['cost'] += 5;
						$toppings .= $_POST['Chocotop'];
						$topcost += 5;
					}
					if(empty($toppings)){
						$toppings = "None";
					}
					if(isset($_POST['cone'])){
						$_SESSION['cost'] += 3;
					}

					$_SESSION['cost'] = $_SESSION['cost'] * $_SESSION['scoop'];

					echo "<table style='width: 100%'>
						<tr>
							<th>Items</th>
							<th>Name</th>
							<th>Cost</th>
						</tr>
						<tr>
							<td>Type</td>
							<td>".$_SESSION['type']."</td>
							<td>".$tcost." pesos</td>
						</tr>
						<tr>
							<td>Flavor</td>
							<td>".$_POST['flavor']."</td>
							<td></td>
						</tr>
						<tr>
							<td>Toppings</td>
							<td>".$toppings."</td>
							<td>".$topcost." pesos</td>
						</tr>
						<tr>
							<td>Cone</td>
							<td>".$cone."</td>
							<td>3 pesos</td>
						</tr>
						<tr>
							<td>Order</td>
							<td></td>
							<td>".$_SESSION['scoop']."</td>
						</tr>
						<tr>
							<td>Total</td>
							<td></td>
							<td>".$_SESSION['cost']." pesos</td>
						</tr>
					</table>";

					$name = strtoupper($_SESSION['name']);
					$add = strtoupper($_SESSION['add']);
					echo "<h5>HELLO ".$name." of ".$add." your total bill is : ".$_SESSION['cost']."</h5>";
					unset($_POST['final']);
				}



		?>
	</div>

	<hr class="topmargin">
	<a href="destroy.php">Order Again</a>
	</div>

</body>
</html>

<?php
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

function checkadd($var){
	if(!isset($var)){
		return true;
	}
	elseif(strlen($var) < 5){
		return true;
	}
}


 ?>
