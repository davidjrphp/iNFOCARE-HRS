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
	<title>Add Symptoms - HRS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<br>
	<div class="wrapper">
	<?php
		include "includes/header3.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<a href="reception.php" style="margin-left:10px;"><button class="btnlink">back</button></a>
			<br>
			<br>
			<center>
				<form action="addsymptoms.php?id=<?php echo $id = $_GET['id']; ?>" method="POST">
				<input type="text" name="name" class="form" value="

				<?php 
				require '../includes/connect.php';
				$id = $_GET['id'];
				$sql = mysqli_query($con,"SELECT * FROM `medication` WHERE `id`='$id'");
				while ($row=mysqli_fetch_array($sql)) {
					$idd = $row['patient_id'];
					
					$sql1 = mysqli_query($con, "SELECT * FROM `patient` WHERE `id`='$idd'");
					while ($roww = mysqli_fetch_array($sql1)) {
						echo $roww['fname']." ".$roww['sname'];
					}
				}
				 ?>" required="required"  disabled="disabled"><br><br>
				 
				 <center><label for="symptoms"><b>Enter Sysmptoms</b></label></center><br>
				<textarea required="required" name="symptoms" id="symptoms" class="form" style="height:200px; padding-left:20px;padding-top:20px;font-family:Arial;" placeholder=""></textarea><br><br>
			<fieldset style="height:180px;width:300px;margin:0;">
					<legend>Order Labs:</legend>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="checkbox" for="viral_loads">
					<input class="checkbox__input" type="checkbox" name="test" id="viral_loads" value="Viral_loads">
					<div class="checkbox__box"></div>
					Viral Loads
				</label>&nbsp;&nbsp;<label class="checkbox" for="creatinine">
					<input class="checkbox__input" type="checkbox" name="test" id="creatinine" value="Creatinine">
					<div class="checkbox__box"></div>
					Creatinine
				</label><br><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="checkbox" for="hiv">
					<input class="checkbox__input" type="checkbox" name="test" id="hiv" value="HIV">
					<div class="checkbox__box"></div>
					HIV
				</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="checkbox" for="cd4_count">
					<input class="checkbox__input" type="checkbox" name="test" id="cd4_count" value="CD4_Count">
					<div class="checkbox__box"></div>
					CD4 Count
				</label><br><br>
				&nbsp;&nbsp;&nbsp;&nbsp;<label class="checkbox" for="malaria">
					<input class="checkbox__input" type="checkbox" name="test" id="malaria" value="Malaria">
					<div class="checkbox__box"></div>
					Malaria
				</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="checkbox" for="ast">
					<input class="checkbox__input" type="checkbox" name="test" id="ast" value="AST">
					<div class="checkbox__box"></div>
					AST
				</label><br><br>
				&nbsp;&nbsp;&nbsp;&nbsp;<label class="checkbox" for="hgb">
					<input class="checkbox__input" type="checkbox" name="test" id="hgb" value="HGB">
					<div class="checkbox__box"></div>
					HGB
				</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="checkbox" for="rbs">
					<input class="checkbox__input" type="checkbox" name="test" id="rbs" value="RBS">
					<div class="checkbox__box"></div>
					RBS
				</label>
			</fieldset><br><br>
				<input type="submit" value="Send To Lab" class="btnlink" name="btn"><br><br>
			</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($symptoms)) {
				require "../includes/doctor.php";
				addsymptoms();
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