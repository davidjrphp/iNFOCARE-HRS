<?php 

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
				<td style='width:40%;padding-left:20px;'><b>MOTHER'S FIRST NAME</b></td>
				<td>".$row['parentsname']."</td>
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
				<td style='width:40%;padding-left:20px;'><b>OCCUPATION</b></td>
				<td>".$row['occupation']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>MARITALSTATUS</b></td>
				<td>".$row['maritalstatus']."</td>
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
				<td>".$row['birthyear']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>MONTH</b></td>
				<td>".$row['birthmonth']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>DATE</b></td>
				<td>".$row['birthdate']."</td>
			</tr>
		";
	}
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

	if (!empty($query)) {
		echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Added</b><br><br>";
	}
	else{
		echo mysqli_error();
	}
}

function addvitals()
{	global $con;
	$temperature = trim(htmlspecialchars($_POST['temperature']));
	$bp = trim(htmlspecialchars($_POST['bp']));
	$pulse = trim(htmlspecialchars($_POST['pulse']));
	$weight = trim(htmlspecialchars($_POST['weight']));
	$height = trim(htmlspecialchars($_POST['height']));
	$preg_status = trim(htmlspecialchars($_POST['preg_status']));
	$comments = trim(htmlspecialchars($_POST['comments']));
	if (!empty($temperature) && !empty($bp) && !empty($pulse) && !empty($weight) && !empty($height) && !empty($preg_status) && !empty($comments)) {
		$id = $_GET['id'];
		@require_once "connect.php";

		$sql = "UPDATE hospital.medication SET `status`='laboratory',`temperature`='$temperature',`bp`='$bp',`pulse`='$pulse',`weight`='$weight',`height`='$height',`preg_status`='$preg_status',`comments`='$comments 'WHERE `id`='$id'";
		$query = mysqli_query($con, $sql);
		if (!empty($query)) {
			$day = date('d');
			$month = date('m');
			$year = date('Y');
			$admin = $_SESSION['admin'];
			$report = mysqli_query($con, "INSERT INTO `doctorreport` VALUES ('','$id','$day','$month','$year')");
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Sent</b>";
		}
	}
}

function queues()
{
	require 'connect.php';
	$sql = "SELECT * FROM hospital.queues";
	$query = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($query)) {
		echo "<tr height=30px'>";
		echo "<td>".$row['queue_no']."</td>";
		echo "<td>".$row['queue_name']."</td>";
		echo "<td>".$row['patientsinqueue']."</td>";
		echo "<td><center><a href='viewqueue.php?id=".$row['queue_no']."'>view</a></center></td>";
		echo "<td><center><a href='editqueue.php?id=".$row['queue_no']."'><img src='../assets/img/glyphicons-151-edit.png' height='16px' width='17px'></a></center></td>";
		
		
	
		echo "</tr>";
	}
}


function adduser()
{
	$username = trim(htmlspecialchars($_POST['username']));
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$email = trim(htmlspecialchars($_POST['email']));
	$mobilephone = trim(htmlspecialchars($_POST['mobilephone']));
	$NRC = trim(htmlspecialchars($_POST['NRC']));
	$department = trim(htmlspecialchars($_POST['department']));
	$type = trim(htmlspecialchars($_POST['type']));
	$password = trim(htmlspecialchars($_POST['password']));
	$NUPIN = trim(htmlspecialchars($_POST['NUPIN']));
	//$pwd = trim(htmlspecialchars($_POST['password']));
	$pass = ($password);
	$date = date("y/m/d") ;
	$date1 = date("y/m/d") ;
  
	require 'connect.php';
	$sql1 = "SELECT * FROM hospital.users WHERE `username`='$username'";
	$query1 = mysqli_query($con, $sql1);
	if (mysqli_num_rows($query1)==0) {
		$sql = "INSERT INTO hospital.users VALUES ('$username','$pass','$fname','$sname','$type','$email','$mobilephone','$NRC','$date1','$department','$NUPIN','$date')";
		$query = mysqli_query($con, $sql);
		if (!empty($query)) {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>User is Succesifully Added</b>";
		}
	}
	else{
		echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Choose Unique Name</b>";
	}

	
}


function addqueue()
{
	$number = trim(htmlspecialchars($_POST['number']));
	$name = trim(htmlspecialchars($_POST['name']));
	require 'connect.php';
	$sql1 = "SELECT * FROM hospital.queues WHERE `queue_name`='$name'";
	$query1 = mysqli_query($con,$sql1);
	if (mysqli_num_rows($query1)==0) {
		$sql = "INSERT INTO hospital.queues VALUES ('$number','$name','0')";
		$query = mysqli_query($con,$sql);
		if (!empty($query)) {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Queue is Succesifully Added</b>";
		}
		else{
			echo "<br>".mysqli_error();
		}
	}
	else{
		echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Choose Unique Name</b>";
	}

	
}


function updateuser()
{
	require 'connect.php';
	//$username = trim(htmlspecialchars($_POST['username']));
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$email = trim(htmlspecialchars($_POST['email']));
	$mobilephone = trim(htmlspecialchars($_POST['mobilephone']));
	$NRC = trim(htmlspecialchars($_POST['NRC']));
	$DOB = trim(htmlspecialchars($_POST['DOB']));
	$department = trim(htmlspecialchars($_POST['department']));
	$password = trim(htmlspecialchars($_POST['password']));
	$pass = ($password);


	$name = $_GET['name'];
	
		$sql = "UPDATE hospital.users SET `fname`='$fname',`sname`='$sname',`email`='$email',`mobilephone`='$mobilephone',`NRC`='$NRC',`DOB`='$DOB',`department`='$department',`password`='$pass' WHERE `username`='$name'";
		$query = mysqli_query($con,$sql);
		if (!empty($query)) {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>User is Succesifully Updated</b>";

		}	
}


function updatequeue()
{
	$name = trim(htmlspecialchars($_POST['name']));
	require 'connect.php';

	$id = $_GET['id'];
	
		$sql = "UPDATE hospital.queues SET `queue_name`='$name' WHERE `queue_no`='$id'";
		$query = mysqli_query($con,$sql);
		if (!empty($query)) {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Queue is Succesifully Updated</b>";

		}	
}


function searchpatients()
{
	require 'connect.php';
	$sachi = $_GET['s'];
	$sql = "SELECT * FROM hospital.patient WHERE `id` LIKE '%$sachi%'";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {
		echo "<tr height=30px'>";
		echo "<td>P-".$row['id']."</td>";
		echo "<td>".$row['fname']."</td>";
		echo "<td>".$row['sname']."</td>";
		echo "<td>".$row['sex']."</td>";
		echo "<td><center><a href='viewpatient.php?id=".$row['id']."'>View Record</a></center></td>";
		echo "</tr>";
	}
}

function viewqueue()
{
	require 'connect.php';
	$sql = "SELECT * FROM hospital.queues WHERE queue_no='$queue_no'";
	$query = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($query)) {
		echo "<tr height=30px'>";
		echo "<td>".$row['queue_no']."</td>";
		echo "<td>".$row['queue_name']."</td>";
		echo "<td>".$row['patientsinqueue']."</td>";
		echo "<td><center><a href='viewqueue.php?id=".$row['queue_no']."'>view queue</a></center></td>";
		
	
		echo "</tr>";
	}
}

function settings()
{
	require 'connect.php';
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
		$name = $_SESSION['admin'];
		$type = $_SESSION['type'];
			
				$sql = "UPDATE hospital.users SET `fname`='$fname',`sname`='$sname',`password`='$pass' WHERE `username`='$name' AND `type`='$type'";
				$query = mysqli_query($con,$sql);
				if (!empty($query)) {
					echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Updated</b>";

				}	
		}
	}
	
?>