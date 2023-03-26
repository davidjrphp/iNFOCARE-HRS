<?php 
function login()
{
	require("connect.php");
	//require_once 'connect.php';
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$pass = md5($password);
	$sql = "SELECT * FROM hospital.users WHERE `username`='" . $username. "' AND `password`='" . $password  . "'";
	$query = mysqli_query($con,$sql);

	$row = mysqli_num_rows($query);
	if($row) {

		if ($row == 0) {
			echo "<b style='font-size:12px;'>Wrong Username/Password Combination</b>";
			//echo "<b style='font-size:12px;'><script>console.log('Wrong Username/Password Combination :');</script></b>";
		}
		elseif ($row == 1) {
			$fetch = mysqli_fetch_array($query);
			$type = $fetch['type'];
			$name = $fetch['username'];
			if ($type == "Admin") {
				@session_start();
				$_SESSION['type'] = $type;
				$_SESSION['admin'] = $name;
				header("Location: admin/");
			}
			elseif ($type=="ARTDoctor" OR $type=="OPDDoctor" OR $type=="Dentist" OR $type=="IPDDoctor" OR $type=="OPDNurse") {
				@session_start();
				$_SESSION['type'] = $type;
				$_SESSION['doctor'] = $name;
				header("Location: doctor/");
			}
			elseif ($type=="Registry") {
				@session_start();
				$_SESSION['type'] = $type;
				$_SESSION['registry'] = $name;
				header("Location: registry/");
			}
			elseif ($type=="Laboratory") {
				@session_start();
				$_SESSION['type'] = $type;
				$_SESSION['laboratory'] = $name;
				header("Location: laboratory/");
			}
			elseif ($type=="Pharmacy") {
				@session_start();
				$_SESSION['type'] = $type;
				$_SESSION['pharmacy'] = $name;
				header("Location: pharmacy/");
			}
			elseif ($type=="Accounts") {
				@session_start();
				$_SESSION['type'] = $type;
				$_SESSION['accounts'] = $name;
				header("Location: accounts/");
			}
			else{
				echo "<b>Incorrect details</b>";
				//echo "<b><script>console.log('Incorrect Details :');</script></b>";
			}
		}
		else{
		echo "<b>Incorrect details</b>";
		//echo "<b><script>console.log('Incorrect Details :');</script></b>";
		}
	}
	else{
		echo "<b>Incorrect details</b>";
		//echo "<b><script>console.log('Incorrect Details :');</script></b>";
	}
}

function logout()
{
	@session_start();
	session_destroy();
	header("Location: ./index.php");
}


function admindetails()
{
	@session_start();
	require("connect.php");
	$type = $_SESSION['type'];
	$username = $_SESSION['admin'];
	$sql = "SELECT * FROM hospital.users WHERE `username`='$username' AND `type`='$type'";
	$query = mysqli_query($con, $sql);
	while ($row =mysqli_fetch_array($query)) {
		echo $row['fname']." ".$row['sname']."</i> <a href='../logout.php'>Sign-out</a>";
	}
}

function accountsdetails()
{
	@session_start();
	require("connect.php");
	$type = $_SESSION['type'];
	$username = $_SESSION['accounts'];
	$sql = "SELECT * FROM hospital.users WHERE `username`='$username' AND `type`='$type'";
	$query = mysqli_query($con, $sql);
	while ($row =mysqli_fetch_array($query)) {
		echo $row['fname']." ".$row['sname']."</i> <a href='../logout.php'>Sign-out</a>";
	}
}


function doctordetails()
{
	@session_start();
	require("connect.php");
	$type = $_SESSION['type'];
	$username = $_SESSION['doctor'];
	$sql = "SELECT * FROM hospital.users WHERE `username`='$username' AND `type`='$type'";
	$query = mysqli_query($con, $sql);
	while ($row =mysqli_fetch_array($query)) {
		echo $row['fname']." ".$row['sname']."</i> <a href='../logout.php'>Sign-out</a>";
	}
}

function registrydetails()
{	global $con;
	@session_start();
	$type = $_SESSION['type'];
	$username = $_SESSION['registry'];
	$sql = "SELECT * FROM hospital.users WHERE `username`='$username' AND `type`='$type'";
	$query = mysqli_query($con, $sql);
	while ($row =mysqli_fetch_array($query)) {
		echo $row['fname']." ".$row['sname']."</i> <a href='../logout.php'>Sign-out</a>";
	}
}

function laboratorydetails()
{
	global $con;
	@session_start();
	$type = $_SESSION['type'];
	$username = $_SESSION['laboratory'];
	$sql = "SELECT * FROM hospital.users WHERE `username`='$username' AND `type`='$type'";
	$query = mysqli_query($con, $sql);
	while ($row =mysqli_fetch_array($query)) {
		echo $row['fname']." ".$row['sname']."</i> <a href='../logout.php'>Sign-out</a>";
	}
}

function pharmacydetails()
{
	global $con;
	@session_start();
	$type = $_SESSION['type'];
	$username = $_SESSION['pharmacy'];
	$sql = "SELECT * FROM hospital.users WHERE `username`='$username' AND `type`='$type'";
	$query = mysqli_query($con, $sql);
	while ($row =mysqli_fetch_array($query)) {
		echo $row['fname']." ".$row['sname']."</i> <a href='../logout.php'>Sign-out</a>";
	}
}

?>
