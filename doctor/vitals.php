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
	<title> Add Vitals/Anthropometrics- HRS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<br><br><br>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
		<?php 
				require '../includes/connect.php';
				$id = $_GET['id'];
				$sql = mysqli_query($con, "SELECT * FROM `medication` WHERE `id`='$id'");
				while ($row=mysqli_fetch_array($sql)) {
					$idd = $row['patient_id'];
					
					$sql1 = mysqli_query($con, "SELECT * FROM `patient` WHERE `id`='$idd'");
					while ($roww = mysqli_fetch_array($sql1)) {
						echo "<h4 align='center'><u>".$roww['fname']." ".$roww['sname']."</u></h4>";
					}
				}
				 ?><br>
			<center>
			<form action="vitals.php" method="POST">
				<input type="number" name="temperature" class="form" placeholder="Enter Temperature" required="required"><input type="number" name="bp" class="form" placeholder="Enter BP" required="required"><br><br>
				<input type="number" name="pulse" class="form" placeholder="Enter Pulse rate" required="required"><input type="number" name="weight" class="form" placeholder="Enter Weight" required="required"><br><br>
				<input type="number" name="height" class="form" placeholder="Enter Height" required="required"><input type="text" name="preg_status" class="form" placeholder="Pregnancy Status" required="required"><br><br>
				<input type="text" name="comments" class="form" placeholder="Enter Your Comment" required="required">
				<input type="submit" value="Add" class="btnlink" name="btn"><br><br>
			</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($temperature) && !empty($bp) &&!empty($pulse)&&!empty($weight)&&!empty($height)&&!empty($preg_status) &&!empty($comments)) {
				require "../includes/doctor.php";
				vitals();
			}
			 ?>
			</center>
			
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>