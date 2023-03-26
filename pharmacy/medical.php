<?php 
session_start();
if (empty($_SESSION['pharmacy']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale1.0">
	<title>All Drugs - HRS</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<br>
	<div class="wrapper">
	<?php
		include "includes/header1.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<a href="patients.php" style="margin-left:10px;"><button class="btnlink">back</button></a>
			<a href="pharmacy.php" style="margin-left:300px;"><button class="btnlink">Dispense Drugs</button></a> <form action="searchdrug.php" method="get" style="float:right;margin-right:15px;"><input type="text" style="height:25px; width:180px;padding-left:15px;" name="s" placeholder="Search Drug By Name"></form><br><br>
			<table class="table table-bordered">
				<tr>
					<th>Drug Name</th>
					<th>Drug Strength</th>
					<th>Units</th>
					<th>Dose/Item</th>
					<th>Form</th>
					<th>Frequency</th>
					<th>Price</th>
					<th>Fill In</th>
					
				</tr>
				<?php 
				require '../includes/pharmacy.php';
				pharmacy();
				 ?>
			</table>
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>
</html>