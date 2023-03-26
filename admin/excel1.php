<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=download.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");

	require '../includes/connect.php';
	
	$output = "";
	
	if(ISSET($_POST['export'])){
		$output .="
			<table>
				<thead>
					<tr>
					<th>Pat. ID</th>
					<th>Symptoms</th>
					<th>Ordered Labs</th>
					<th>Results & Investingation</th>
					<th>Pharmacy Dispensation</th>
					<th>Drug Strength</th>
					<th>Units Disp.</th>
					<th>Measurements</th>
					<th>Item/Dose</th>
					<th>Form</th>
					<th>Frequency</th>
					<th>Provider</th>
					<th>Doc. Price</th>
					<th>Medical Price</th>
					<th>Date</th>
					<th>Month</th>
					<th>Year</th>
					</tr>
				<tbody>
		";
		
		$query = $con->query("SELECT * FROM `medication`") or die(mysqli_errno());
		while($fetch = $query->fetch_array()){
			
		$output .= "
					<tr>
						<td>".$fetch['patient_id']."</td>
						<td>".$fetch['symptoms']."</td>
						<td>".$fetch['tests']."</td>
						<td>".$fetch['test_results']."</td>
						<td>".$fetch['medical']."</td>
						<td>".$fetch['drug_strength']."</td>
						<td>".$fetch['units_dispensed']."</td>
						<td>".$fetch['drug_units']."</td>
						<td>".$fetch['item_dose']."</td>
						<td>".$fetch['drug_form']."</td>
						<td>".$fetch['intake_freq']."</td>
						<td>".$fetch['doctor_type']."</td>
						<td>".$fetch['doctor_price']."</td>
						<td>".$fetch['medical_price']."</td>
						<td>".$fetch['date']."</td>
						<td>".$fetch['month']."</td>
						<td>".$fetch['year']."</td>
					</tr>
		";
		}
		
		$output .="
				</tbody>
				
			</table>
		";
		
		echo $output;
	}
	
?>