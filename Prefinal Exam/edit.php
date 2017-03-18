<?php 
include "functions.php";

$field = getone($_GET['id']);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Register</h1>
	<table>
	<form method="POST" action="process.php">
	<input type="text" hidden name="id" 
	value="<?php echo $field->CustId; ?>">
		<tr>
			<td>Name</td>
			<td><input type="text" name="name"
			value="<?php echo $field->Name; ?>"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="add"
			value="<?php echo $field->Address; ?>"></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td><select name="sex">
				<option><?php echo $field->Gender; ?></option>
				<option>MALE</option>
				<option>FEMALE</option>
				<option></option>
			</select></td>
		</tr>
		<tr>
			<td>Contact</td>
			<td><input type="text" name="con"
			value="<?php echo $field->Contact; ?>"></td>
		</tr>
		<tr>
			<td>Date Purchased</td>
			<td><input type="date" name="deyt"
			value="<?php echo $field->Date_Purchased; ?>"></td>
		</tr>
		<tr>
			<td>Amount Paid</td>
			<td><input type="text" name="amnt"
			value="<?php echo $field->Amount_Paid; ?>"></td>
		</tr>
		<tr>
			<td>Item Name</td>
			<td><input type="text" name="item"
			value="<?php echo $field->item_Name; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="update"
			value="Update"></td>
		</tr>
	</form>
	</table>
</body>
</html>