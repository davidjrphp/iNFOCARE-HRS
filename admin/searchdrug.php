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
	<title>Search Drug - HRS</title>
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
			<a href="medical.php" style="margin-left:10px;"><button class="btnlink">View Medicine</button></a><form action="searchdrug.php" method="get" style="float:right;margin-right:15px;"></form><br>
			<br><table class="table">
				<tr>
					<th>Drug Name</th>
					<th>Strength</th>
					<th>Units</th>
					<th>Dosage</th>
					<th>Price</th>
					<th>Edit</th>
					<th>Select</th>
				</tr>
				<?php 
				require '../includes/pharmacy.php';
				searchdrug();
				 ?>
			</table>
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>