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
	<title>Pharmacy Dashboard - HRS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<br>
	<div class="wrapper">
	
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right">
			<div style="padding-left:400px;padding-top:100px;">
			Welcome, <b>Pharmacist</b><br><br>
			In your Dashboard you can do the following jobs,<br><br>
			<ol>
				<li>Search Drug(s)</li><br>
				<li>View Prescription</li><br>
				<li>Dispense drug(s)</li><br>
				<li>View Patient's Medical History</li><br>
				<li>Add Price</li><br>
			</ol>
		</div>
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>