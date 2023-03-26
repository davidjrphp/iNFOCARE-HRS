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
	<title>Users Admin Dashboard - HRS</title>
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
	<a href="Providers.php" style="margin-left:10px;"><button class="btnlink">View Providers</button></a><br>
		<center>
			<h4 class="text-center">Please fill in this form to create an account.</h4>
	<form  action = "addprovider.php"  method="POST">
		<input type="text" name="username" class="form" placeholder="Enter Username" required="required"><br><br>
				<select name="type" class="form" required="required">
					<option value="">Choose designation</option>
					<option>Admin</option>
					<option>Accounts</option>
					<option>ARTDoctor</option>
					<option>Dentist</option>
					<option>OPDNurse</option>
					<option>OPDDoctor</option>
					<option>Registry</option>
					<option>Pharmacy</option>
					<option>Laboratory</option>
				</select><br><br>
		<input class="form" type="text"placeholder="Enter  First Name" name="fname"required>&nbsp;&nbsp;&nbsp;&nbsp;<input class="form"type="text"placeholder="Enter  Last Name" name="sname"required><br><br><br>
		<input class="form" type="email"placeholder="Enter Email" name="email"required>&nbsp;&nbsp;&nbsp;&nbsp;<input class="form" type="number"placeholder="Enter Mobile Phone" name="mobilephone"required><br><br><br>
		<input class="form" type="department"placeholder="Enter department" name="department"required>&nbsp;&nbsp;&nbsp;&nbsp;<select class="form" name="designation"required>
		<option>Medicine</option>
		<option>Orthopedic</option>
		<option>Gynecologist</option>
		<option>Dentist</option>
		<option> Cardiac electrophysiologist</option>
		<option>Cardiologist </option>
		<option>Surgeon </option></select><br><br><br>
		<input class="form" type="text"placeholder="Enter  Qualification" name="qualification"required>&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="DOB" class="form" placeholder="Enter DOB" required="required"><br><br><br>
		<input type="number" name="NRC" class="form" placeholder="Enter NRC" required="required">&nbsp;&nbsp;&nbsp;&nbsp;<select name="gender" class="form" required="required">
					<option value="">Choose Gender</option>
					<option>Male</option>
					<option>Female</option>
					</select><br><br><br>
				<input class="form" type="date"placeholder="Enter date (y/m/d)" name="date"required>&nbsp;&nbsp;&nbsp;&nbsp;<input class="form" type = "password" placeholder="Create  Password"name="pswd"required><br><br><br>
		 <input type="submit" value="Add" class="btnlink" name="btn">
		</div>
	</form>	
		<?php 
			extract($_POST);
			if (isset($btn) && !empty($username) && !empty($pswd) &&!empty(designation)) {
				require "../includes/admin.php";
				addprovider();
			}
			 ?>
		</center>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>
