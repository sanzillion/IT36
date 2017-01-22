<!DOCTYPE html>
<html>
<head>
	<title>

	</title>
</head>
<body>
	<div class="container">
	<h2>WELCOME TO</h2>
	<h3>I SCREAM STORE</h3>

	<form method="POST" action="">
		</label><input required type="text" name="name" placeholder="Full">
		<br>
		<input required type="text" name="add" placeholder="Address"
		><br>
		<label>Male</label>
		<input required type="radio" name="sex" value="male">
		<label>Female</label>
		<input required type="radio" name="sex" value="female"><br>
		<input type="submit" name="submit" value="Order Ice Cream">
	</form>		
		<?php  
		session_start();
			if(isset($_POST['submit'])){
				echo "ordering...";
				echo "<br>";
				$_SESSION['name'] = ucwords($_POST['name']);
				$_SESSION['add'] = ucwords($_POST['add']);
				$_SESSION['sex'] = $_POST['sex'];
				$_SESSION['cost'] = 0;
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
					<button type='submit' name='cont'>Continue</button>
					</form>
				";
			}
			if(isset($_POST['cont'])){
					echo 'Name: '.$_SESSION['name'].'<br>';
					echo 'Address: '.$_SESSION['add'].'<br>';
					echo 'Gender: '.$_SESSION['sex'].'<br>';

					$_SESSION['type'] = $_POST['type'];
					$_SESSION['scoop'] = $_POST['scoop'];
					if($_SESSION['type'] == "Classic"){
						$_SESSION['cost'] = 25;
					}else{
						$_SESSION['cost'] = 35;
					}

					$_SESSION['cost'] = $_SESSION['cost'] * $_SESSION['scoop'];

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
							<p>Topppings:</p>
							<input type='checkbox' name='Sprinkles' value='Sprinkles'><label>Sprinkles</label>
							<input type='checkbox' name='Chocotop' value='Chocotop'><label>Choco Top</label>
							<input type='checkbox' name='Cookies' value='Cookie'><label>Cookies</label>
							<p>Cones [Default Cone: Free]:</p>
							<input type='radio' name='cone' value='Cup Plus'><label>Cup-plus [3 pesos]</label>
							<input type='radio' name='cone' value='Sweet Cone'><label>Sweet Cone [3 pesos]</label><br> 
							<button type='submit' name='final'>Finalize Order</button>
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
							<p>Topppings:</p>
							<input type='checkbox' name='Sprinkles' value='Sprinkles'><label>Sprinkles</label>
							<input type='checkbox' name='Chocotop' value='Chocotop'><label>Choco Top</label>
							<input type='checkbox' name='Cookies' value='Cookie'><label>Cookies</label>
							<p>Cones [Default Cone: Free]:</p>
							<input type='radio' name='cone' value='Cup Plus'><label>Cup-plus [3 pesos]</label>
							<input type='radio' name='cone' value='Sweet Cone'><label>Sweet Cone [3 pesos]</label><br> 
							<button type='submit' name='final'>Finalize Order</button>
						</form>
						";
					}
				}
				if(isset($_POST['final'])){
					echo '<br>';
					echo 'Name: '.$_SESSION['name'].'<br>';
					echo 'Address: '.$_SESSION['add'].'<br>';
					echo 'Gender: '.$_SESSION['sex'].'<br>';
					echo 'Ice Cream type: '.$_SESSION['type'].'<br>';
					echo 'Oder: '.$_SESSION['scoop'].'<br>';
					echo 'Flavor: '.$_POST['flavor'].'<br>';
					$toppings = "";
					if(isset($_POST['Sprinkles'])){
						$toppings .= $_POST['Sprinkles'].' ';
						$_SESSION['cost'] += 5;
					}
					if(isset($_POST['Cookies'])){
						$toppings .= $_POST['Cookies'].' ';
						$_SESSION['cost'] += 5;
					}
					if(isset($_POST['Chocotop'])){
						$_SESSION['cost'] += 5;
						$toppings .= $_POST['Chocotop'];
					}
					echo 'Toppings: '.$toppings;
					echo '<br>';
					if(isset($_POST['cone'])){
						echo 'Cone: '.$_POST['cone'];
						$_SESSION['cost'] += 3;
					}
					echo '<br>'."Cost: ".$_SESSION['cost']. "Pesos";
					echo '<br><br>';
					$name = strtoupper($_SESSION['name']);
					$add = strtoupper($_SESSION['add']);
					echo "HELLO ".$name." of ".$add." your total bill is : ".$_SESSION['cost'];
				}



		?>
		
		
			
	</div>
	<a href="destroy.php">Order Again</a>
</body>
</html>

<style type="text/css">
	


</style>