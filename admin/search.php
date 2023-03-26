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
	<title>Patients - HRS</title>
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
			<a href="index.php"><button class="btnlink">back</button></a><a href="addpatient.php" style="float:right;margin-right:150px;"><button class="btnlink">Register Patient</button></a> <br><br>
			<form action="search.php" method="get" style="float:left;margin-left:15px;"><input type="text" style="height:25px; width:180px;padding-left:15px;" name="s" placeholder="Patient ID">&nbsp;&nbsp;&nbsp;&nbsp;</form><form action="search.php" method="get" style="float:center;margin-center:15px;"><input type="text" style="height:25px; width:180px;padding-left:15px;" name="" placeholder="Patient Name"><br>
			<table class="table table-bordered" style="width:98% !important;">
				<tr>
					<th>ID</th>
					<th>Firstname</th>
					<th>Surname</th>
					<th>Sex</th>
					<th>Record</th>
				</tr>
				<?php 
				require '../includes/registry.php';
				searchpatients();
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