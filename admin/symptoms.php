<?php 
session_start();
if (empty($_SESSION['admin']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale1.0">
	<title>Lab Tech. Dashboard - HRS</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<br>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
				<a href="patient.php" style="margin-left:10px;"><button class="btnlink">back</button></a>
				<br><b><center><u><h2>Complaints</h2></u></center> </b><br>
			<table class="table table-bordered" style="width:98% !important;">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Date</th>
					<th>Complaints</th>
				</tr>
				<?php 
				require '../includes/doctor.php';
				complaints();
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