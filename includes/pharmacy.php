<?php 

function patients()
{
	require 'connect.php';
	//$typee = $_SESSION['type'];
	$sql = "SELECT * FROM hospital.medication WHERE  `status`='pharmacy'";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {
		$ido = $row['patient_id'];
		$sql2 = "SELECT * FROM hospital.patient WHERE `id`='$ido'";
		$query2 = mysqli_query($con,$sql2);
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

function dispensation()
{
		require 'connect.php';
			$price = trim(htmlspecialchars($_POST['price']));
			$drug = trim(htmlspecialchars($_POST['drug']));
			$strength = trim(htmlspecialchars($_POST['strength']));
			$measurement = trim(htmlspecialchars($_POST['measurement']));
			$dosage = trim(htmlspecialchars($_POST['dosage']));
			$form = trim(htmlspecialchars($_POST['form']));
			$frequency = trim(htmlspecialchars($_POST['frequency']));
			$units = trim(htmlspecialchars($_POST['units']));
			if (!empty($price) && !empty($drug) && !empty($strength) && !empty($measurement) && !empty($dosage) && !empty($form) && !empty($frequency) && !empty($units)) {
				$id = $_GET['id'];
				@require_once "connect.php";

			$sql = "UPDATE hospital.medication SET `status`='finish',`medical_price`='$price',`medical`='$drug',`drug_strength`='$strength',`drug_units`='$measurement',`item_dose`='$dosage',`drug_form`='$form',`intake_freq`='$frequency',`units_dispensed`='$units' WHERE `id`='$id'";
			$query = mysqli_query($con,$sql);
			if (!empty($query)) {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Finalized!</b><br><br>";
			}
		}
}

function dispensations()
{
		require 'connect.php';
			$drug_name = trim(htmlspecialchars($_POST['drug_name']));
			$drug_strength = trim(htmlspecialchars($_POST['drug_strength']));
			$measurement = trim(htmlspecialchars($_POST['measurement']));
			$dose_item = trim(htmlspecialchars($_POST['dose_item']));
			$drug_form = trim(htmlspecialchars($_POST['drug_form']));
			$intake_freq = trim(htmlspecialchars($_POST['intake_freq']));
			$drug_price = trim(htmlspecialchars($_POST['drug_price']));
			if (!empty($drug_name) && !empty($drug_strength) && !empty($measurement) && !empty($dose_item) && !empty($drug_form) && !empty($intake_freq) && !empty($drug_price)) {
				@require_once "connect.php";

				//$sql = "UPDATE hospital.medication` SET `status`='finish',`medical_price`='$price'  WHERE `id`='$id'";
				$sql = "INSERT INTO hospital.pharmacy VALUES ('','$drug_name','$drug_strength','$measurement','$dose_item','$drug_form','$intake_freq','$drug_price')";
				$query = mysqli_query($con,$sql);
				if (!empty($query)) {
					echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Drug Added</b><br><br>";
				}
			}
}

function updatedrug()
{
		require 'connect.php';
			$name = trim(htmlspecialchars($_POST['name']));
			$strength = trim(htmlspecialchars($_POST['strength']));
			$form = trim(htmlspecialchars($_POST['form']));
			$price = trim(htmlspecialchars($_POST['price']));
			if (!empty($name) && !empty($strength) && !empty($form) && !empty($price)) {
				@require_once "connect.php";

				$id = $_GET['id'];

				$sql = "UPDATE hospital.pharmacy SET `drug_name`='$name',`drug_strength`='$strength`, `drug_form`='$form', `drug_price`='$price' WHERE `id`='$id'";
				//$sql = "INSERT INTO hospital.pharmacy` VALUES ('','$name','$price')";
				$query = mysqli_query($con,$sql);
				if (!empty($query)) {
					echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Drug Updated</b><br><br>";
				}
			}
}

function givendrugs()
{
	require "connect.php";
			//$typee = $_SESSION['type'];
	$id = $_GET['id'];
	$sql = "SELECT * From hospital.medication WHERE  `patient_id`='$id'";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {
		$ido = $row['patient_id'];
		//$result = $row['patient_id'];
		$sql2 = "SELECT * From hospital.patient WHERE `id`='$ido'";
		$query2 = mysqli_query($con,$sql2);
		while ($row2 = mysqli_fetch_array($query2)) {
			echo "<tr height=30px'>";
			echo "<td>P-".$row2['id']."</td>";
			echo "<td>".$row2['fname']." ".$row2['sname']."</td>";
			echo "<td>".$row2['sex']."</td>";
			echo "<td>".$row['date']." - ".$row['month']." - ".$row['year']."</td>";
			echo "<td>".$row['medical']."</td>";
			echo "<td>".$row['drug_strength']."</td>";
			echo "<td>".$row['drug_units']."</td>";
			echo "<td>".$row['item_dose']."</td>";
			echo "<td>".$row['drug_form']."</td>";
			echo "<td>".$row['intake_freq']."</td>";
			echo "<td>".$row['units_dispensed']."</td>";
			echo "<td>".$row['medical_price']."</td>";
			echo "</tr>";
		}
		
	}
}

function searchdrug()
{
			require 'connect.php';
			$name = $_GET['search'];
				$sql2 = "SELECT * FROM hospital.pharmacy WHERE `drug_name` LIKE '%$name%'";
				$query2 = mysqli_query($con,$sql2);
		while ($row2 = mysqli_fetch_array($query2)) {
		echo "<tr height=30px'>";
		echo "<td>".$row2['drug_name']."</td>";
		echo "<td>".$row2['drug_strength']."</td>";
		echo "<td>".$row2['measurement']."</td>";
		echo "<td>".$row2['dose_item']."</td>";
		echo "<td>".$row2['drug_price']."</td>";
		echo "<td><center><a href='editdrug.php?id=".$row2['id']."'><img src='../assets/img/glyphicons-151-edit.png' height='16px' width='17px'></a></center></td>";
		echo "<td><center><a href='pharmacy.php?id=".$row2['id']."'>Dispense</a></center></td>";
		
	
		echo "</tr>";
		}
}

function searchpatients()
{
	require 'connect.php';
	$name = $_GET['s'];
	$sql = "SELECT * FROM hospital.medication WHERE  `status`='pharmacy'";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) {
		$ido = $row['patient_id'];
		$sql2 = "SELECT * FROM hospital.patient WHERE `id`='$ido' AND `id` LIKE '%$name%'";
		$query2 = mysqli_query($con,$sql2);
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

function pharmacy()
{
	
require 'connect.php';

// set the number of records per page
$records_per_page = 5;

// get the total number of records in the database
$sql = "SELECT COUNT(*) FROM pharmacy";
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
$sql = "SELECT * FROM pharmacy LIMIT $offset, $records_per_page";
$result = mysqli_query($con, $sql);

// display the records
while ($row = mysqli_fetch_assoc($result))

	
	/*@require 'connect.php';
	$sql = "SELECT * FROM hospital.pharmacy";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query))*/ {
		echo "<tr height=30px'>";
		echo "<td>".$row['drug_name']."</td>";
		echo "<td>".$row['drug_strength']."</td>";
		echo "<td>".$row['measurement']."</td>";
		echo "<td>".$row['dose_item']."</td>";
		echo "<td>".$row['drug_form']."</td>";
		echo "<td>".$row['intake_freq']."</td>";
		echo "<td>".$row['drug_price']."</td>";
		//echo "<td><center><a href='editdrug.php?id=".$row['id']."'><img src='../assets/img/glyphicons-151-edit.png' height='16px' width='17px'></a></center></td>";
		
	
		echo "</tr>";
	}
	// display the pagination links
	if ($total_pages > 1) {
    echo "<div>";
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo "<span>$i</span>";
        } else {
            echo "<a href=\"medical.php?page=$i\">$i</a>";
        }
    }
    echo "</div>";
}

// close the database connection
mysqli_close($con);

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
		$name = $_SESSION['pharmacy'];
		$type = $_SESSION['type'];
			
				$sql = "UPDATE hospital.users SET `fname`='$fname',`sname`='$sname',`password`='$pass' WHERE `username`='$name' AND `type`='$type'";
				$query = mysqli_query($con,$sql);
				if (!empty($query)) {
					echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Updated</b>";

				}	
		}
	}
?>