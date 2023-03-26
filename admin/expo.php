<?php 
session_start();
if (empty($_SESSION['admin']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<title> Export- HRS</title>
		<meta name="viewport" content="width=device-width, initial-scale1.0">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="../assets/style.css"
	</head>
<body>
	<br>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<form method="POST" action="excel.php">
			<button class="btn btn-success pull-right" name="export"><span class="glyphicon glyphicon-print"></span>Export</button>
		</form>
		<br /><br />
		<table class="table table-bordered">
			<thead class="alert-info">
				<tr>
					<th>ID</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Marital Status</th>
					<th>Gender</th>
					<th>Blood Group</th>
					<th>Birth Year</th>
					<th>Birth month</th>
					<th>Birth date</th>
					<th>Occupation</th>
					<th>Mother's Firstname</th>
					<th>Temperature</th>
					<th>Blood Pressure</th>
					<th>Pulse</th>
					<th>Weight</th>
					<th>Height</th>
					<th>Preg. Status</th>
					<th>Comments</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require '../includes/connect.php';
					
					$query = $con->query("SELECT * FROM `patient`");
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><?php echo $fetch['id']?></td>
					<td><?php echo $fetch['fname']?></td>
					<td><?php echo $fetch['sname']?></td>
					<td><?php echo $fetch['address']?></td>
					<td><?php echo $fetch['phone']?></td>
					<td><?php echo $fetch['maritalstatus']?></td>
					<td><?php echo $fetch['sex']?></td>
					<td><?php echo $fetch['bloodgroup']?></td>
					<td><?php echo $fetch['birthyear']?></td>
					<td><?php echo $fetch['birthmonth']?></td>
					<td><?php echo $fetch['birthdate']?></td>
					<td><?php echo $fetch['occupation']?></td>
					<td><?php echo $fetch['parentsname']?></td>
					<td><?php echo $fetch['temp']?></td>
					<td><?php echo $fetch['bp']?></td>
					<td><?php echo $fetch['pulse']?></td>
					<td><?php echo $fetch['weight']?></td>
					<td><?php echo $fetch['height']?></td>
					<td><?php echo $fetch['preg_status']?></td>
					<td><?php echo $fetch['comments']?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<?php 
		include "includes/footer.php";
		 ?>
</body>
<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>
</html>