<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Register</h1>
	<table>
	<form method="POST" action="process.php">
		<tr>
			<td>Name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="add"></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td><select name="sex">
				<option></option>
				<option>MALE</option>
				<option>FEMALE</option>
			</select></td>
		</tr>
		<tr>
			<td>Contact</td>
			<td><input type="text" name="con"></td>
		</tr>
		<tr>
			<td>Date Purchased</td>
			<td><input type="date" name="deyt"></td>
		</tr>
		<tr>
			<td>Amount Paid</td>
			<td><input type="text" name="amnt"></td>
		</tr>
		<tr>
			<td>Item Name</td>
			<td><input type="text" name="item"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="register"></td>
		</tr>
	</form>
	</table>
</body>
</html>