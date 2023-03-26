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
			<form method="POST" action="excel1.php">
			<button class="btn btn-success pull-right" name="export"><span class="glyphicon glyphicon-print"></span>Export</button>
		</form>
		<br /><br />
		<table class="table table-bordered">
			<thead class="alert-info">
				<tr>
					<th>Pat. ID</th>
					<th>Symptoms</th>
					<th>Ordered Labs</th>
					<th>Results & Investingation</th>
					<th>Pharmacy Dispensation</th>
					<th>Drug Strength</th>
					<th>Units Disp.</th>
					<th>Measurements</th>
					<th>Item/Dose</th>
					<th>Form</th>
					<th>Frequency</th>
					<th>Provider</th>
					<th>Doc. Price</th>
					<th>Medical Price</th>
					<th>Date</th>
					<th>Month</th>
					<th>Year</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require '../includes/connect.php';
					
					$query = $con->query("SELECT * FROM `medication`");
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><?php echo $fetch['patient_id']?></td>
					<td><?php echo $fetch['symptoms']?></td>
					<td><?php echo $fetch['tests']?></td>
					<td><?php echo $fetch['test_results']?></td>
					<td><?php echo $fetch['medical']?></td>
					<td><?php echo $fetch['drug_strength']?></td>
					<td><?php echo $fetch['units_dispensed']?></td>
					<td><?php echo $fetch['drug_units']?></td>
					<td><?php echo $fetch['item_dose']?></td>
					<td><?php echo $fetch['drug_form']?></td>
					<td><?php echo $fetch['intake_freq']?></td>
					<td><?php echo $fetch['doctor_type']?></td>
					<td><?php echo $fetch['doctor_price']?></td>
					<td><?php echo $fetch['medical_price']?></td>
					<td><?php echo $fetch['date']?></td>
					<td><?php echo $fetch['month']?></td>
					<td><?php echo $fetch['year']?></td>
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