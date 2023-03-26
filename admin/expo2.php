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
			<form method="POST" action="excel2.php">
			<button class="btn btn-success pull-right" name="export"><span class="glyphicon glyphicon-print"></span>Export</button>
		</form>
		<br /><br />
		<table class="table table-bordered">
			<thead class="alert-info">
				<tr>
					<th>ID</th>
					<th>Drug Name</th>
					<th>Drug Strength</th>
					<th>Measurements</th>
					<th>Item/Dose</th>
					<th>Form</th>
					<th>Frequency</th>
					<th>Drug Price</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require '../includes/connect.php';
					
					$query = $con->query("SELECT * FROM `pharmacy`");
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><?php echo $fetch['id']?></td>
					<td><?php echo $fetch['drug_name']?></td>
					<td><?php echo $fetch['drug_strength']?></td>
					<td><?php echo $fetch['measurement']?></td>
					<td><?php echo $fetch['dose_item']?></td>
					<td><?php echo $fetch['drug_form']?></td>
					<td><?php echo $fetch['intake_freq']?></td>
					<td><?php echo $fetch['drug_price']?></td>
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