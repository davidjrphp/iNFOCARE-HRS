<?php 
session_start();
if (empty($_SESSION['laboratory']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
else{
	require '../includes/connect.php';
				$id = $_GET['id'];
				$sql = "DELETE FROM `medication` WHERE `id`='$id'";
				$query = mysqli_query($con,$sql);
				if (!empty($query)) {
				header("Location: patients.php");
				}
				$show_pending_test_query = "SELECT * FROM `medication` WHERE `id`='$id'";
				$run = mysqli_query($con, $show_pending_test_query);
				while ($row=mysqli_fetch_array($run)) {
				$idd = $row['patient_id'];
					
				$sql1 = mysqli_query($con, "SELECT * FROM `patient` WHERE `id`='$idd'");
				while ($roww = mysqli_fetch_array($sql1)) {
				echo "<h4 align='center'><u>".$roww['fname']." ".$roww['sname']."</u></h4>";
				}
			}	
	}
?>