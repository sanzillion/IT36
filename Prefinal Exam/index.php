<?php 

include "functions.php";

$table = selectall();
if(isset($_POST['search'])){
	$table = search($_POST['search']);
}

if(isset($_GET['deleteall'])){
	deleteall();
	header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<br><br>
	<form method="POST" action="#">
		<input type="text" name="search" 
		placeholder="Search by Name">

	</form>
	<table border="1">
	<tr>
		<th>Id</td>
		<th>Name</td>
		<th>Address</td>
		<th>Gender</td>
		<th>Contact</td>
		<th>Date Purchased</td>
		<th>Amount Paid</td>
		<th>Item Name</td>
		<th>Options</td>
	</tr>
	<?php foreach($table as $g): ?>
	<tr>
		<td><?php echo $g->CustId; ?></td>	
		<td><?php echo $g->Name; ?></td>
		<td><?php echo $g->Address; ?></td>
		<td><?php echo $g->Gender; ?></td>
		<td><?php echo $g->Contact; ?></td>
		<td><?php echo $g->Date_Purchased; ?></td>
		<td><?php echo $g->Amount_Paid; ?></td>
		<td><?php echo $g->item_Name; ?></td>
		<td> <a href='edit.php?id=<?php echo $g->CustId;?>'>
		<button>Edit</button></a> 
		<a href="delete.php?delete=<?php echo $g->Name;?>">
		<button>Delete</button></a>
		</td>
	</tr>	
	<?php endforeach; ?>
	</table>

	<a href="register.php"><button>Add Field</button></a>
	<a href="index.php?deleteall=1"><button>Delete All</button></a>

</body>
</html>

<style type="text/css">
	th,tr{
		padding: 5px 10px 5px 10px;
		text-align: center;
	}
	table{
		margin: 10px 1px;
	}

</style>

<?php 

	if(isset($_GET['success']) && $_GET['success']==2){
		echo '<script type="text/javascript">
				alert("Successfully Updated!");
			</script>';	
	}
	elseif(isset($_GET['error']) && $_GET['error']==1){
		echo '<script type="text/javascript">
				alert("Something went wrong!");
			</script>';		
	}

 ?>

