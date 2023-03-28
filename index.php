<?php
session_start();
if (!empty($_SESSION['admin'])&&!empty($_SESSION['type'])) {
	header("Location: admin/");
}
elseif (!empty($_SESSION['laboratory'])&&!empty($_SESSION['type'])) {
	header("Location: laboratory/");
}
elseif (!empty($_SESSION['doctor'])&&!empty($_SESSION['type'])) {
	header("Location: doctor/");
}
elseif (!empty($_SESSION['registry'])&&!empty($_SESSION['type'])) {
	header("Location: registry/");
}
elseif (!empty($_SESSION['accounts'])&&!empty($_SESSION['type'])) {
	header("Location: registry/");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale1.0">
	<title>Health Records System - Login</title>
			<html>
<head><title>Electronic Health System-HRS</title>
</head>

<center>
<body background = "includes/images/p.jpg">



</body></center>
</html>
	<style type="text/css">
	body
	{
		background: white;
		background-size: 100%;
		
	}
		.wrapper
		{
			height: 250px;
			width: 750px;
			background-color: white;
			border: 10px solid #408080;
			border-radius: 30px;
			margin: 0 auto;
			margin-top: 100px;
		}
		.left
		{
			height: 170px;
			width: 350px;
			border-right: 10px solid #408080;
			float: left;
			font-family: Arial;
			font-size: 25px;
			text-align: center;
			padding-top: 80px;
		}
		.right
		{
			height: 250px;
			width: 390px;
			float: left;
			text-align: center;
			font-family: Arial;
		}
		hr
		{
			border-bottom: 10px solid #408080;
			border-top: 1px solid white;
		}
		.input
		{

			height: 28px;
			width: 50%;
			padding-left: 20px;
		}
		.btn
		{
			height: 30px;
			width: 56%;
			border: 0;
			background-color:#408080;
			margin: 0;
			color: white;
			font-weight: bold;
			cursor: pointer;
		}
	</style>
</head>
<body>
<br><br><br><br><br><br>
<div class="wrapper">
	<div class="left">
		Welcome<br><br>To iNFOCARE<br><b>Health Record System</b><b><br><b>(HRS)</b>
	</div>
	<div class="right">
		<h3>Please Login</h3><hr><br>
		<form action="index.php" method="post">
			<input type="text" class="input" name="username" placeholder="Enter Username"><br><br>
			<input type="password" class="input" name="password" placeholder="Enter Password"><br><br>
			<input type="submit" class="btn" name="btn" value="Login"><br>
		</form><br><br><br><br>

<?php
		extract($_POST);
		if (isset($btn) && !empty($username) && !empty($password)) {
			require 'includes/users.php';
		 	login();
		 } 
		 ?>
		
	</div>
</div><br><br>
<center><i><h5>Developed By David Mwelwa <br /> (BSc.CS)</h5><i></center>
</body>
</html>
