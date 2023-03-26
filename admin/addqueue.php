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
	<title>Add Service Queue - HRS</title>
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
			<a href="queues.php" style="margin-left:10px;"><button class="btnlink">Service Queues</button></a><br>
			<center>
				<form action="addqueue.php" method="POST">
				<input type="number" name="number" class="form" placeholder="Enter Queue Number" required="required"><br><br>
				<input type="text" name="name" class="form" placeholder="Enter Queue Name" required="required"><br><br>
				<input type="submit" value="Add" class="btnlink" name="btn">
			</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($number) && !empty($name)) {
				require "../includes/admin.php";
				addqueue();
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