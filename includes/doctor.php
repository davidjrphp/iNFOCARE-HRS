<?php

function recdoctor()
{   
	global $con;
	@require_once "connect.php";
			$typee = $_SESSION['type'];
			$sql = "SELECT * FROM hospital.medication WHERE `doctor_type`='$typee' AND `status`='recdoctor'";
	$query = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($query)) {
		$ido = $row['patient_id'];
		$sql2 = "SELECT * FROM hospital.patient WHERE `id`='$ido'";
		$query2 = mysqli_query($con, $sql2);
		while ($row2 = mysqli_fetch_array($query2)) {
			echo "<tr height=30px'>";
			echo "<td>".$row2['id']."</td>";
			echo "<td>".$row2['fname']."</td>";
			echo "<td>".$row2['sname']."</td>";
			echo "<td>".$row2['sex']."</td>";
			echo "<td><center><a href='addsymptoms.php?id=".$row['id']."'>Add</a></center></td>";
			echo "</tr>";
		}
		
	}
}

function complaints()
{
	require "connect.php";
		$id = $_GET['id'];
			//$typee = $_SESSION['type'];
			$sql = "SELECT * From hospital.medication WHERE  `patient_id`='$id' ";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {
		$ido = $row['patient_id'];
		$result = $row['patient_id'];
		$sql2 = "SELECT * From hospital.patient WHERE `id`='$ido'";
		$query2 = mysqli_query($con,$sql2);
		while ($row2 = mysqli_fetch_array($query2)) {
			echo "<tr height=30px'>";
			echo "<td>P-".$row2['id']."</td>";
			echo "<td>".$row2['fname']." ".$row2['sname']."</td>";
			echo "<td>".$row2['sex']."</td>";
			echo "<td>".$row['date']." - ".$row['month']." - ".$row['year']."</td>";
			echo "<td>".$row['symptoms']."</td>";
			echo "</tr>";
		}
		
	}
}


function labdoctor()
{
	global $con;
	@require_once "connect.php";
			$typee = $_SESSION['type'];
			$sql = "SELECT * FROM hospital.medication WHERE `doctor_type`='$typee' AND `status`='labdoctor'";
	$query = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($query)) {
		$ido = $row['patient_id'];
		$result = $row['patient_id'];
		$sql2 = "SELECT * FROM hospital.patient WHERE `id`='$ido'";
		$query2 = mysqli_query($con, $sql2);
		while ($row2 = mysqli_fetch_array($query2)) {
			echo "<tr height=30px'>";
			echo "<td>P-".$row2['id']."</td>";
			echo "<td>".$row2['fname']."</td>";
			echo "<td>".$row2['sname']."</td>";
			echo "<td>".$row2['sex']."</td>";
			echo "<td><center><a href='pharmacy.php?id=".$row['id']."'>view</a></center></td>";
			echo "</tr>";
		}
		
	}
}


function searchpatients()
{
			require 'connect.php';
			$fname = $_GET['s'];
			$typee = $_SESSION['type'];
			$sql = "SELECT * FROM hospital.medication WHERE `doctor_type`='$typee' AND `status`='recdoctor'";
			$query = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_array($query)) {
				$ido = $row['patient_id'];
				$sql2 = "SELECT * FROM hospital.patient WHERE `id`='$ido' AND `id` LIKE '%$fname%'";
				$query2 = mysqli_query($con, $sql2);
		while ($row2 = mysqli_fetch_array($query2)) {
			echo "<tr height=30px'>";
			echo "<td>P-".$row2['id']."</td>";
			echo "<td>".$row2['fname']."</td>";
			echo "<td>".$row2['sname']."</td>";
			echo "<td>".$row2['sex']."</td>";
			echo "<td><center><a href='addsymptoms.php?id=".$row['id']."'>Add</a></center></td>";
			echo "</tr>";
		}
		
	}
}

function provider()
{
	require "connect.php";
		$id = $_GET['id'];
			//$typee = $_SESSION['type'];
		$sql = "SELECT * From hospital.medication WHERE  `patient_id`='$id' ";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {
		$ido = $row['patient_id'];
		$result = $row['patient_id'];
		$sql2 = "SELECT * From hospital.patient WHERE `id`='$ido'";
		$query2 = mysqli_query($con,$sql2);
		while ($row2 = mysqli_fetch_array($query2)) {
			echo "<tr height=30px'>";
			echo "<td>P-".$row2['id']."</td>";
			echo "<td>".$row2['fname']." ".$row2['sname']."</td>";
			echo "<td>".$row2['sex']."</td>";
			echo "<td>".$row['date']." - ".$row['month']." - ".$row['year']."</td>";
			echo "<td>".$row['doctor_type']."</td>";
			echo "<td>".$row['doctor_price']."</td>";
			echo "</tr>";
		}
		
	}
}

function searchnewpatients()
{
			@require 'connect.php';
			$fname = $_GET['s'];
			$typee = $_SESSION['type'];
			$sql = "SELECT * FROM hospital.medication WHERE `doctor_type`='$typee' AND `status`='labdoctor'";
			$query = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_array($query)) {
				$ido = $row['patient_id'];
				$sql2 = "SELECT * FROM hospital.patient WHERE `id`='$ido' AND `id` LIKE '%$fname%'";
				$query2 = mysqli_query($con, $sql2);
		while ($row2 = mysqli_fetch_array($query2)) {
			echo "<tr height=30px'>";
			echo "<td>P-".$row2['id']."</td>";
			echo "<td>".$row2['fname']."</td>";
			echo "<td>".$row2['sname']."</td>";
			echo "<td>".$row2['sex']."</td>";
			echo "<td><center><a href='pharmacy.php?id=".$row['id']."'>View</a></center></td>";
			echo "</tr>";
		}
		
	}
}

function addsymptoms()
{	global $con;
	$symptoms = trim(htmlspecialchars($_POST['symptoms']));
	$test = trim(htmlspecialchars($_POST['tests']));
	$test1 = trim(htmlspecialchars($_POST['test1']));
	$test2 = trim(htmlspecialchars($_POST['test2']));
	$test3 = trim(htmlspecialchars($_POST['test3']));
	$test4 = trim(htmlspecialchars($_POST['test4']));
	$test5 = trim(htmlspecialchars($_POST['test5']));

	if (!empty($symptoms)) {
		$id = $_GET['id'];
		@require_once "connect.php";

		$sql = "UPDATE hospital.medication SET `status`='laboratory',`symptoms`='$symptoms',`tests`='$test',`test1`='$test1',`test2`='$test2',`test3`='$test3',`test4`='$test4',`test5`='$test5' WHERE `id`='$id' ";
		$query = mysqli_query($con, $sql);
		if (!empty($query)) {
			$day = date('d');
			$month = date('m');
			$year = date('Y');
			$doctor = $_SESSION['doctor'];
			$report = mysqli_query($con, "INSERT INTO `doctorreport` VALUES ('','$doctor','$id','$day','$month','$year')");
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Sent</b>";
		}
	}
}


function dispensation()
{	global $con;
	$drug = trim(htmlspecialchars($_POST['drug']));
	if (!empty($drug)) {
		$id = $_GET['id'];
		@require_once "connect.php";

		$sql = "UPDATE hospital.medication SET `status`='pharmacy',`medical`='$drug' WHERE `id`='$id'";
		$query = mysqli_query($con, $sql);
		if (!empty($query)) {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Sent</b>";
		}
		else{
			echo mysql_error();
		}
	}
	else{
		echo mysql_error();
	}
}

function settings()
{	global $con;
	@require_once "connect.php";
	//$username = trim(htmlspecialchars($_POST['username']));
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$password2 = trim(htmlspecialchars($_POST['password2']));
	$password = trim(htmlspecialchars($_POST['password']));
	if ($password != $password) {
		echo "<br><b style='color:red;font-size:14px;font-family:Arial;'>Password Must Match</b>";
	}
	else{
		$pass = ($password);
		$name = $_SESSION['doctor'];
		$type = $_SESSION['type'];
			
				$sql = "UPDATE hospital.users SET `fname`='$fname',`sname`='$sname',`password`='$pass' WHERE `username`='$name' AND `type`='$type'";
				$query = mysqli_query($con, $sql);
				if (!empty($query)) {
					echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Updated</b>";

				}	
		}
	}