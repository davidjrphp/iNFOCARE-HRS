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
		<a href="patient.php" style="margin-left:10px;"><button class="btnlink">back</button></a>
				<br><b><center><u><h2>Personal Information</h2></u></center> </b><br><br>
<table class="table table-bordered">
	<tr>
		<th>
		<?php 
			require '../includes/registry.php';
			viewpatient();
		?>
	</tr>
		</th>

</table><br><br>
			<center>
				<form action="viewpatient.php?id=<?php echo $id = $_GET['id']; ?>" method="post">
				<select name="doctor" class="form" required="required">
					<option value="">Choose Doctor/Nurse</option>
					<option>ARTDoctor</option>
					<option>OPDDoctor</option>
					<option>Dentist</option>
					<option>OPDNurse</option>
					<option>IPDDoctor</option>
				</select><br><br>
				<input type="submit" name="btn" value="Assign To Doctor" class="btnlink">
			</form><br>
			<?php
			extract($_POST);
			if (isset($btn) && !empty($doctor)) {
			 	assigntodoctor();
			 } 
			 ?>
			 <br><br>
			</center>
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>
</html>