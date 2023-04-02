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
	<title>Prescription - HRS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<br>
			<br>
			<center>
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
				 
				<form action="pharmacy.php?id=<?php echo $id = $_GET['id']; ?>" method="POST">
				
				 <center><label for="drug">Enter Drug</label></center><br>
				 
				 

				<textarea required="required" name="drug" id="drug" class="form" style="height:200px; padding-left:20px;padding-top:20px;font-family:Arial;" placeholder=""></textarea>
				<br><br>
				
				<input type="submit" value="Send To Pharmacy" class="btnlink" name="btn"><br><br>
			</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($drug)) {
				require "../includes/doctor.php";
				dispensation();
			}
			 ?>
			</center>
			</div>
		</div>
		</div>
	</div>
</div>
	<?php 
		include "includes/footer.php";
		 ?>
		</div>
		<!-- Bootstrap core JavaScript-->
		<!-- Loading Scripts -->
		<script src="../js/jquery.min.js"></script>
			<script src="../js/bootstrap-select.min.js"></script>
			<script src="../js/bootstrap.min.js"></script>
			<script src="../js/jquery.dataTables.min.js"></script>
			<script src="../js/dataTables.bootstrap.min.js"></script>

</body>
</html>