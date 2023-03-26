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
	<title>Pharmacy - HRS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<br>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><b><br>
		 <a href="medical.php" style="margin-left:10px;"><button class="btnlink">back</button></a><form action="searchdrug.php" method="get" style="float:right;margin-right:15px;"><input type="text" style="height:25px; width:180px;padding-left:15px;" name="s" placeholder="Search Drug By Name"></form><br><br>
			<center>
			<?php 
				require '../includes/connect.php';
				$id = $_GET['id'];
				$sql = mysqli_query($con, "SELECT * FROM `medication` WHERE `id`='$id'");
				while ($row=mysqli_fetch_array($sql)) {
					$idd = $row['patient_id'];
					
					$sql1 = mysqli_query($con, "SELECT * FROM `patient` WHERE `id`='$idd'");
					while ($roww = mysqli_fetch_array($sql1)) {
						echo "<h2 align='center'><u>".$roww['fname']." ".$roww['sname']."</u></h2>";
					}
				}
				 ?><br>
				 
				 <?php 
				@require '../includes/connect.php';
				$id = $_GET['id'];
				$sql = mysqli_query($con, "SELECT * FROM `medication` WHERE `id`='$id'");
				while ($row=mysqli_fetch_array($sql)) {
					echo "Please dispense the following Drug(s): <br><b>".$row['medical']."</b>";
					
				}
				 ?><br><br>
				 <center><h3><b>Drug Details</b></h3></center><br>
				<form action="pharmacy.php?id=<?php echo $id = $_GET['id']; ?>" method="POST">
				<input type="number" required="required" name="price" class="form"placeholder="Enter Drug Price" style="width:170px;margin:0;">&nbsp;&nbsp;<input type="text" required="required" name="drug" class="form" style="width:170px;margin:0;" placeholder="Enter Drug Name"><br><br><br><br>
				
				<input type="number" name="strength" class="form" placeholder="Enter Drug Strength" required="required">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="measurement" class="form" style="height:32px; width:100px;margin:0;" required="required">
					<option value=""></option>
					<option>mg</option>
					<option>mcg</option>
					<option>gm</option>
					<option>ml</option>
				</select><br><br><br><br>																							
				<input type="number" name="dosage" class="form" placeholder="dose/item" required="required">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="form" class="form" style="height:32px; width:100px;margin:0;" required="required">
					<option value=""></option>
					<option>capsules</option>
					<option>injection</option>
					<option>tablets</option>
					<option>drops</option>
					<option>solution</option>
					<option>sachets</option>
					<option>teaspoon</option>
				</select><label for="Drug Form"><br><br><br><br>
					<label for="Frequency"><select name="frequency" class="form" style="height:32px; width:100px;margin:0;" required="required">
					<option value=""></option>
					<option>od</option>
					<option>td</option>
					<option>bd</option>
					<option>3/daily</option>
					<option>o/week</option>
					<option>2/week</option>
					<option>3/week</option> 
				</select></label>&nbsp;&nbsp; <input type="number" name="units" class="form" style="height:30px;width:95px;margin:0;" placeholder="" required="required"></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="Drug Form"><select name="form" class="form" style="height:32px; width:100px;margin:0;" required="required">
					<option value=""></option>
					<option>capsules</option>
					<option>injection</option>
					<option>tablets</option>
					<option>drops</option>
					<option>solution</option>
					<option>sachets</option>
					<option>teaspoon</option>
				</select></label><br><br><br><br>
				<button class="btn btn-primary btn-block" name="save" type="save" ><span class="glyphicon glyphicon-floppy-save"></span>Save</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear" class="btnlink" name="btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Finalize" class="btnlink" name="btn"><br><br>
			</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($price) && !empty($drug) && !empty($strength) && !empty($measurement) && !empty($dosage) && !empty($frequency) && !empty($units) && !empty($form)) {
				require "../includes/pharmacy.php";
				dispensation();
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