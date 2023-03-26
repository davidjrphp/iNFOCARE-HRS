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
	<title>Users Admin Dashboard - HRS</title>
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
			<a href="queues.php"><button class="btnlink">back</button></a><br><a href="addprovider.php" style="margin-left:350px;"><button class="btnlink">Add Provider</button></a><br>
			<table class="table">
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Mobile Phone</th>
					<th>Designation</th>
					<th>Qualification</th>
					<th>NRC</th>
					<th>DOB</th>
					<th>Department</th>
					<th>Date</th>
					<th>Permission</th>
					
				</tr>
				<?php 
				require '../includes/admin.php';
				providers();
				 ?>
			</table>
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>