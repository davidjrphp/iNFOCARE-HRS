<?php 
session_start();
if (empty($_SESSION['pharmacy']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
else{
	$id = $_GET['id'];

	require_once "../includes/connect.php";
	$sql = "SELECT * FROM `pharmacy` WHERE `id`='$id'";
	$query = mysqli_query($con, $sql);
	if (!empty($query)) {
		header("Location: pharmacy.php");
	}
}
?>