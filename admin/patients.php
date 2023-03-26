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
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<style type="text/css">
	a{
		text-decoration: none;
		color: #408080;
		}a:hover{
			text-decoration: underline;
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
		<div class="right"><br>
		<a href="addpatient.php"><button class="btnlink">back</button></a><br><br><br>
			<table class="table" style="width:98% !important;">
				<tr>
					<th>Id</th>
					<th>Firstname</th>
					<th>Surname</th>
					<th>Sex</th>
					<th>Record</th>
					<th>pharmacy</th>
				</tr>
				<?php 
				require '../includes/registry.php';
				patients();
				 ?>
			</table>
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>