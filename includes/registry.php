<?php

function patients()
{
	require 'connect.php';

	// set the number of records per page
$records_per_page = 5;

// get the total number of records in the database
$sql = "SELECT COUNT(*) FROM patient";
$result = mysqli_query($con, $sql);
$total_records = mysqli_fetch_array($result)[0];

// calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// get the current page number
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = $_GET['page'];
} else {
    $current_page = 1;
}

// calculate the offset for the current page
$offset = ($current_page - 1) * $records_per_page;

// retrieve the records for the current page
$sql = "SELECT * FROM patient LIMIT $offset, $records_per_page";
$result = mysqli_query($con, $sql);

// display the records
while ($row = mysqli_fetch_assoc($result))




	/*$sql = "SELECT * FROM hospital.patient";
	$sql2 = "SELECT NUPIN from hospital.users";
	$query = mysqli_query($con,$sql);
	$query2 = mysqli_query($con,$sql2);
	while ($row = mysqli_fetch_array($query)) {
		if($row2 = mysqli_fetch_array($query2))*/ {
		echo "<tr height=30px'>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['fname']."</td>";
		echo "<td>".$row['sname']."</td>";
		echo "<td>".$row['sex']."</td>";
		echo "<td><center><a href='viewpatient.php?id=".$row['id']."'>View Record</a></center></td>";
		echo "<td><center><a href='pharmResults.php?id=".$row['id']."'>View Pharmacy</a></center></td>";
		echo "<td><center><a href='symptoms.php?id=".$row['id']."'>View Complaints</a></center></td>";
		echo "<td><center><a href='laborders.php?id=".$row['id']."'>View Lab Orders</a></center></td>";
		echo "<td><center><a href='results.php?id=".$row['id']."'>View Lab Results</a></center></td>";
		echo "<td><center><a href='doctortype.php?id=".$row['id']."'>View Provider</a></center></td>";
		echo "</tr>";
	}
	
		// display the pagination links
		if ($total_pages > 1) {
			echo "<div>";
			for ($i = 1; $i <= $total_pages; $i++) {
				if ($i == $current_page) {
					echo "<span>$i</span>";
				} else {
					echo "<a href=\"patient.php?page=$i\">$i</a>";
				}
			}
			echo "</div>";
		}
		
		// close the database connection
		mysqli_close($con);
}

	
function viewpatient()
{	
	
	$id = $_GET['id'];
	require 'connect.php';
	$sql = "SELECT * FROM hospital.patient WHERE `id`='$id'";
	$sql2 = "SELECT NUPIN from hospital.users";
	$query = mysqli_query($con,$sql);
	$query2 = mysqli_query($con,$sql2);
	while ($row = mysqli_fetch_array($query)) {
		$year = date('Y') - $row['birthyear'];
		if($row2 = mysqli_fetch_array($query2)) {
		echo "
		
		<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>ID</b></td>
				<td>".$row2[0]."-".$row['id']."</td>
			</tr>
			";
			
		}	
		echo"
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>FIRSTNAME</b></td>
				<td>".$row['fname']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>SURNAME</b></td>
				<td>".$row['sname']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>EMAIL</b></td>
				<td>".$row['email']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>ADDRESS</b></td>
				<td>".$row['address']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>PHONE</b></td>
				<td>".$row['phone']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>GENDER</b></td>
				<td>".$row['sex']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>BLOOD GRUOP</b></td>
				<td>".$row['bloodgroup']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>YEARS</b></td>
				<td>".$year."</td>
			</tr>
		";
		
	}
}


function searchpatients()
{
	require 'connect.php';
	$sachi = isset($_GET['search']) ? $_GET['search'] : '';
	// set the number of records per page
$records_per_page = 5;

// get the total number of records in the database
$sql = "SELECT COUNT(*) FROM patient";
$result = mysqli_query($con, $sql);
$total_records = mysqli_fetch_array($result)[0];

// calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// get the current page number
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = $_GET['page'];
} else {
    $current_page = 1;
}

// calculate the offset for the current page
$offset = ($current_page - 1) * $records_per_page;

// retrieve the records for the current page
$sql = "SELECT * FROM patient WHERE `id` LIKE '%$sachi%' LIMIT $offset, $records_per_page";
$result = mysqli_query($con, $sql);

// display the records
while ($row = mysqli_fetch_assoc($result))

	/*require 'connect.php';
	$sachi = isset($_GET['search']) ? $_GET['search'] : '';
	//$sachi= $_GET['s'];
	$sql = "SELECT * FROM hospital.patient WHERE `id` LIKE '%$sachi%' ";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query))*/ {
		echo "<tr height=30px'>";
		echo "<td>P-".$row['id']."</td>";
		echo "<td>".$row['fname']."</td>";
		echo "<td>".$row['sname']."</td>";
		echo "<td>".$row['sex']."</td>";
		echo "<td><center><a href='viewpatient.php?id=".$row['id']."'>View Record</a></center></td>";
		echo "</tr>";
	}
	
	// display the pagination links
	if ($total_pages > 1) {
		echo "<div>";
		for ($i = 1; $i <= $total_pages; $i++) {
			if ($i == $current_page) {
				echo "<span>$i</span>";
			} else {
				echo "<a href=\"search.php?page=$i\">$i</a>";
			}
		}
		echo "</div>";
	}
	
	// close the database connection
	mysqli_close($con);
}

function addpatient()
{
	//personal information
	global $con;
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$phone = trim(htmlspecialchars($_POST['phone']));
	$address = trim(htmlspecialchars($_POST['address']));
	$occupation = trim(htmlspecialchars($_POST['occupation']));
	$maritalstatus = trim(htmlspecialchars($_POST['maritalstatus']));
	$parentsname = trim(htmlspecialchars($_POST['parentsname']));
	$sex = trim(htmlspecialchars($_POST['sex']));
	$birthyear = trim(htmlspecialchars($_POST['birthyear']));
	$birthmonth = trim(htmlspecialchars($_POST['birthmonth']));
	$birthdate = trim(htmlspecialchars($_POST['birthdate']));
	$bloodgroup = trim(htmlspecialchars($_POST['bloodgroup']));
	//vitals
	$temp = trim(htmlspecialchars($_POST['temp']));
	$bp = trim(htmlspecialchars($_POST['bp']));
	$pulse = trim(htmlspecialchars($_POST['pulse']));
	$weight= trim(htmlspecialchars($_POST['weight']));
	$height = trim(htmlspecialchars($_POST['height']));
	$preg_status = trim(htmlspecialchars($_POST['preg_status']));
	$comments = trim(htmlspecialchars($_POST['comments']));
	$date = trim(htmlspecialchars($_POST['date']));
	//$date = date("y/m/d") ;
	
	//$_POST[".$date."];
	
	require_once "connect.php";

	$sql = "INSERT INTO hospital.patient VALUES ('','$fname','$sname','$address','$phone','$maritalstatus','$sex','$bloodgroup','$birthyear','$birthmonth','$birthdate','$occupation','$parentsname','$temp','$bp','$pulse','$weight','$height','$preg_status','$comments','$date')";
	//$sql = "INSERT INTO hospital.patient `id`,`fname`,`sname`,`address`,`phone`,`maritalstatus`,`sex`,`bloodgroup`,`birthyear`,`birthmonth`,`birthdate`,`occupation`,`parentsname`,`temp`,`bp`,`pulse`,`weight`,`height`,`preg_status`,`comments`,`date` VALUES ('','$fname','$sname','$address','$phone','$maritalstatus','$sex','$bloodgroup','$birthyear','$birthmonth','$birthdate','$occupation','$parentsname','$temp','$bp','$pulse','$weight','$height','$preg_status','$comments','$date')";
	
	//$sql2 = "INSERT INTO hospital.vitals VALUES ('','$temperature','$bp','$pulse','$weight','$height','$preg_status','$comments','$date')";
	$query = mysqli_query($con,$sql);
	//$query2 = mysqli_query($con,$sql2);
	if (!empty($query)) {
		echo "<script>alert('paatient Successfully Added!'); window.location='viewpatient.php'</script>";
	}
	else{
		echo mysqli_error($con);
	}
}


function assigntodoctor()
{	global $con;
	$doctor = trim(htmlspecialchars($_POST['doctor']));

	require_once "connect.php";
	$id = $_GET['id'];
	$day = date('d');
	$month = date('m');
	$year = date('Y');

	
	if ($doctor=="OPDNurse") {
		$price = 1000;
		
				$sql = "INSERT INTO hospital.medication VALUES ('','$id','recdoctor','','','','','','','','','','$price','$doctor','','','','$day','$month','$year')";

			$query = mysqli_query($con,$sql);
			if (!empty($query)) {
				echo "<script>alert('Paatient Successfully Assigned!'); window.location='patient.php'</script>";
			}
			else{
				echo mysqli_error($con);
			}
	}
	elseif ($doctor=="OPDDoctor") {
		$price = 1000;
		$sql = "INSERT INTO hospital.medication VALUES ('','$id','recdoctor','','','','','','','','','','$price','$doctor','','','','$day','$month','$year')";

			$query = mysqli_query($con,$sql);
			if (!empty($query)) {
				echo "<script>alert('Paatient Successfully Assigned!'); window.location='patient.php'</script>";
			}
			else{
				echo mysqli_error($con);
			}
	}
	elseif ($doctor=="ARTDoctor") {
		$price = 1000;
		$sql = "INSERT INTO hospital.medication VALUES ('','$id','recdoctor','','','','','','','','','','$price','$doctor','','','','$day','$month','$year')";

			$query = mysqli_query($con,$sql);
			if (!empty($query)) {
				echo "<script>alert('Paatient Successfully Assigned!'); window.location='patient.php'</script>";
			}
			else{
				echo mysqli_error($con);
			}
	}
	elseif ($doctor=="Dentist") {
		$price = 2000;

		$sql = "INSERT INTO hospital.medication VALUES ('','$id','recdoctor','','','','','','','','','','$price','$doctor','','','','','$day','$month','$year')";

			$query = mysqli_query($con,$sql);
			if (!empty($query)) {
				echo "<script>alert('Paatient Successfully Assigned!'); window.location='patient.php'</script>";
			}
			else{
				echo mysqli_error($con);
			}
	}
	
}

function updatepatient()
{
	$id = $_GET['id'];
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$phone = trim(htmlspecialchars($_POST['phone']));
	$address = trim(htmlspecialchars($_POST['address']));
	$maritalstatus = trim(htmlspecialchars($_POST['maritalstatus']));
	$gender = trim(htmlspecialchars($_POST['gender']));
	$birthyear = trim(htmlspecialchars($_POST['birthyear']));
	$birthmonth = trim(htmlspecialchars($_POST['birthmonth']));
	$birthdate = trim(htmlspecialchars($_POST['birthdate']));
	$occupation = trim(htmlspecialchars($_POST['occupation']));
	$parentsname = trim(htmlspecialchars($_POST['parentsname']));
	$bloodgroup = trim(htmlspecialchars($_POST['bloodgroup']));

	require_once "connect.php";

	$sql = "UPDATE hospital.patient SET `fname`='$fname',`sname`='$sname',`address`='$address',`phone`='$phone','maritalstatus'='$maritalstatus',`sex`='$gender',`bloodgroup`='$bloodgroup',`birthyear`='$birthyear','birthmonth'='$birthmonth','birthday'='$birthdate','occupation'='$occupation' WHERE `id`='$id'";
	//$sql = "INSERT INTO hospital.` VALUES ('','$fname','$sname','$address','$phone','$gender','$bloodgroup','$birthyear')";
	$query = mysqli_query($con,$sql);
	if (!empty($query)) {
		echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Updated</b><br><br>";
	}
	else{
		echo mysqli_error($con);
	}
}

function settings()
{	global $con;
	require_once "connect.php";
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
		$name = $_SESSION['registry'];
		$type = $_SESSION['type'];
			
				$sql = "UPDATE hospital.users SET `fname`='$fname',`sname`='$sname',`password`='$pass' WHERE `username`='$name' AND `type`='$type'";
				$query = mysqli_query($con,$sql);
				if (!empty($query)) {
					echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Updated</b>";

				}	
		}
	}

?>