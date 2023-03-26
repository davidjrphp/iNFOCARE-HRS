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
	<title>Edit Queue - HRS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<a href="queues.php" style="margin-left:10px;"><button class="btnlink">View Queues</button></a><br>
			<?php

			$id = $_GET['id'];

			?>
			<center>
				<form action="editqueue.php?id=<?php echo $id; ?>" method="POST">
				<input type="text" name="number" class="form" value="<?php echo $id; ?>" required="required" disabled="disabled"><br><br>
				
				
				<?php 
				require_once '../includes/connect.php';
				$sql = "SELECT * FROM `queues` WHERE `queue_no`='$id'";
				$query = mysqli_query($con,$sql);
				while ($row = mysqli_fetch_array($query)) {
					?>
					<input type="text" name="name" class="form" value="<?php echo $row['queue_name']; ?>" required="required"><br><br>
					<?php
				}
				 ?>
				<input type="submit" value="Update" class="btnlink" name="btn">
			</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($name)) {
				require "../includes/admin.php";
				updatequeue();
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