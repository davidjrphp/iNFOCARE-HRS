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
	<title>Edit Drug - HRS</title>
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
			<a href="medical.php" style="margin-left:10px;"><button class="btnlink">View Medicine</button></a><form action="searchdrug.php" method="get" style="float:right;margin-right:15px;"><input type="text" style="height:25px; width:180px;padding-left:15px;" name="s" placeholder="Search Drug By Name"></form><br><br>
			<center>
				<form action="editdrug.php?id=<?php echo $id = $_GET['id']; ?>" method="POST">
				<label for="name">Drug Name:</label><br>
				<input type="text" name="name" class="form" value=" "
				<?php require "../includes/connect.php";
				$id = $_GET['id'];
				$sql = mysqli_query($con, "SELECT * FROM `pharmacy` WHERE `id`='$id'");
				while ($row = mysqli_fetch_array($sql)) {
				 	echo trim(htmlspecialchars($row['drug_name']));
				 } ?>"required="required"><br><br>
				 
				 <label for="strength">Drug Strength:</label><br>
				 <input type="number" name="strength" class="form" value=" "
				<?php require "../includes/connect.php";
				$id = $_GET['id'];
				$sql = mysqli_query($con, "SELECT * FROM `pharmacy` WHERE `id`='$id'");
				while ($row = mysqli_fetch_array($sql)) {
				 	echo trim(htmlspecialchars($row['drug_strength']));
				 } ?>
				 "required="required"><br><br>
				<label for="form">Drug Form:</label><br>
				<input type="text" name="form" class="form" placeholder="Drug Form" value=" "
				<?php require "../includes/connect.php";
				$id = $_GET['id'];
				$sql = mysqli_query($con, "SELECT * FROM `pharmacy` WHERE `id`='$id'");
				while ($row = mysqli_fetch_array($sql)) {
				 	echo trim(htmlspecialchars($row['drug_form']));
				 } ?> 
				 "required="required"><br><br>
				 <label for="price">Drug Price:</label><br>
				<input type="number" name="price" class="form" value=" "
				<?php @require "../includes/connect.php";
				$id = $_GET['id'];
				$sql = mysqli_query($con, "SELECT * FROM `pharmacy` WHERE `id`='$id'");
				while ($row = mysqli_fetch_array($sql)) 
				{
				 	echo $row['drug_price'];
				 }
				 ?> "required="required"><br><br>
				<input type="submit" value="Update" class="btnlink" name="btn">
			</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($name) && !empty($strength) && !empty($form) && !empty($price)) {
				require "../includes/pharmacy.php";
				updatedrug();
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