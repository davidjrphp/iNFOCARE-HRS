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
	<title>Edit User - HRS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<a href="users.php" style="margin-left:10px;"><button class="btnlink">View Users</button></a><br>
			<?php

			$name = $_GET['name'];

			?>
			<center>
				<form action="edituser.php?name=<?php echo $name; ?>" method="POST">
				<input type="text" name="username" class="form" value="<?php echo $name; ?>" required="required" ><br><br>
			</center>
				<?php 
				require_once '../includes/connect.php';
				$sql = "SELECT * FROM hospital.users WHERE `username`='$name'";
				$query = mysqli_query($con, $sql);
				while ($row = mysqli_fetch_array($query)) {
					?>
			<div class="left">
				<input type="text" name="fname" class="form" placeholder="Enter Firstname" required="required"><br><br>
				<input type="text" name="sname" class="form" placeholder="Enter Surname" required="required"><br><br>
				<input type="text" name="email" class="form" placeholder="Enter Email" required="required"><br><br>
				<input type="text" name="mobilephone" class="form" placeholder="Enter Mobile Phone" required="required"><br><br>
			</div>
					<?php
				}
				 ?>
				
			<center>
				<input type="text" name="NRC" class="form" placeholder="Enter NRC" required="required"><br><br>
				<input type="text" name="DOB" class="form" placeholder="Enter DOB" required="required"><br><br>
				<input type="text" name="department" class="form" placeholder="Enter department" required="required"><br><br>
				<input type="password" name="password" class="form" placeholder="Enter Password" required="required"><br><br>
				<select name="type" class="form" required="required">
					<option value="">Choose Type</option>
					<option>Admin</option>
					<option>Accouts</option>
					<option>ARTDoctor</option>
					<option>Dentist</option>
					<option>OPDDoctor</option>
					<option>OPDNurse</option>
					<option>Registry</option>
					<option>Pharmacy</option>
					<option>Laboratory</option>
				</select><br><br>
				<input type="submit" value="Update" class="btnlink" name="btn">
			</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($password) &&!empty($type)) {
				require "../includes/admin.php";
				updateuser();
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