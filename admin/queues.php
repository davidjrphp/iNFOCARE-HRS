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
	<title>Service Queues Admin Dashboard - HRS</title>
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
			<a href="addpatient.php"><button class="btnlink">back</button></a><a href="addqueue.php" style="margin-left:350px;"><button class="btnlink">Add Queue</button></a><br>
			<table class="table">
				<tr>
					<th>Queue Number</th>
					<th>Queue Name</th>
					<th>Patients In Queue</th>
					<th>View</th>
					<th>Edit</th>
				</tr>
				<?php 
				require '../includes/admin.php';
				queues();
				 ?>
			</table>
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>