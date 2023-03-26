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
	<title>Dispensation - HRS</title>
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
			<a href="queues.php" style="margin-left:10px;"><button class="btnlink">back</button></a><a href="medical.php" style="margin-left:400px;"><button class="btnlink">View Drugs</button></a> <form action="searchdrug.php" method="get" style="float:right;margin-right:10px;"><input type="text" style="height:20px; width:180px;padding-left:10px;" name="s" placeholder="Search Drug By Name"></form><br><br>
			<center>
					<h3><center><b>Enter Drug Details</b></center></h3>
				<br><br><form action="dispensations.php" method="POST">
				<input type="text" name="drug_name" class="form" placeholder="Enter Drug Name" required="required">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="drug_strength" class="form" placeholder="Enter Drug Strength" required="required">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="measurement" class="form" style="height:32px; width:100px;margin:0;" required="required">
					<option value="">Choose Units</option>
					<option>mg</option>
					<option>mcg</option>
					<option>gm</option>
					<option>ml</option>
					<option>vial</option>
				</select><br><br>
				<select name="drug_form" class="form" style="height:32px; width:100px;margin:0;" required="required">
					<option value="">Form</option>
					<option>capsules</option>
					<option>tablets</option>
					<option>drops</option>
					<option>solution</option>
					<option>sachets</option>
					<option>teaspoon</option>
				</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="dose_item" class="form" required="required">
					<option value="">Item/dose</option>
					<option>1</option>
					<option>2</option>
					<option>1/2</option>
					<option>1/4</option>
				</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="intake_freq" class="form" required="required">
					<option value="">Choose Frequency</option>
					<option>o/d</option>
					<option>2/d</option>
					<option>3/daily</option>
					<option>1/week</option>
					<option>2/week</option>
					<option>3/week</option>
				</select><br><br>
				<input type="number" name="drug_price" class="form" placeholder="Enter Drug Price" required="required">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear" class="btnlink" name="btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Add" class="btnlink" name="btn"><br>
			</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($drug_name) && !empty($drug_strength) && !empty($measurement) && !empty($dose_item) && !empty($drug_form) && !empty($intake_freq) && !empty($drug_price)) {
				require "../includes/pharmacy.php";
				dispensations();
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