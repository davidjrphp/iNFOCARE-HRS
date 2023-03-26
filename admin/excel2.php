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
					<th>ID</th>
					<th>Drug Name</th>
					<th>Drug Strength</th>
					<th>Measurements</th>
					<th>Item/Dose</th>
					<th>Form</th>
					<th>Frequency</th>
					<th>Drug Price</th>
					</tr>
				<tbody>
		";
		
		$query = $con->query("SELECT * FROM `pharmacy`") or die(mysqli_errno());
		while($fetch = $query->fetch_array()){
			
		$output .= "
					<tr>
						<td>".$fetch['id']."</td>
						<td>".$fetch['drug_name']."</td>
						<td>".$fetch['drug_strength']."</td>
						<td>".$fetch['measurement']."</td>
						<td>".$fetch['dose_item']."</td>
						<td>".$fetch['drug_form']."</td>
						<td>".$fetch['intake_freq']."</td>
						<td>".$fetch['drug_price']."</td>
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