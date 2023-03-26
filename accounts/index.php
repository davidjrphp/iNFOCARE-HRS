<?php 
session_start();
if (empty($_SESSION['accounts']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Accountant Dashboard - HRS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<br><br><br><br>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right">
		<div style="padding-left:20px;padding-top:20px;">
			Welcome, <b>Accountant</b><br><br>
			In your Dashboard you can do the following jobs,<br><br>
			<ol>
				<li> See Financial Report</li><br>
				<li>Search Specific Report</li><br>
			</ol>
		</div>
			
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>