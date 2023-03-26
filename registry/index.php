<?php 
session_start();
if (empty($_SESSION['registry']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale1.0">
	<title>Registry Dashboard - HRS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<style type="text/css">
	.total{
		height: 100px;
		width: 170px;
		border: 10px solid #ccf;
		margin-top: 5px;
		margin-bottom: 5px;
		margin-left: 30%;
		text-align: center;
		padding-top: 10px;
	}
	</style>
</head>
<body>
<br>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right">
		<div style="padding-left:300px;padding-top:100px;">
			Welcome, <b>Registry</b><br><br>
			In your Dashboard you can do the following jobs,<br><br>
			<ol>
				<li>Search Patient</li><br>
				<li>Register Patient</li><br>
				<li>Assign Patients Queue/Doctor</li><br>
				<li>View Patients</li><br>
			</ol>
		</div>
			<div class="total">
				<b>Total Patients</b><hr>
				<?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM `patient`";
				$query = mysqli_query($con, $sql);
				echo "<br><b style='color:#408080; font-family:Arial; font-size:35px;'>".$row = mysqli_num_rows($query)."</b>"; 
				 ?>
			</div>
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>