<?php 
session_start();
if (empty($_SESSION['doctor']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale1.0">
	<title>Doctor Dashboard - HRS</title>
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
			Welcome, <b>Doctor/Nurse</b><br><br>
			In your Dashboard you can do the following jobs,<br><br>
			<ol>
				<li>Add Symptoms to Patient</li><br>
				<li>View Patient Test Result</li><br>
				<li>View Patient medical History</li><br>
				<li>Prescribe medication</li><br>
			</ol>
		</div>
			
		</div>
		<?php 
		include "includes/footer.php";
		
		 ?>
	</div>
</body>
</html>