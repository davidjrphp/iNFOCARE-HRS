<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=download.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");

	require '../includes/connect.php';
	
	$output = "";
	
	if(ISSET($_POST['export'])){
		$output .="
			<table table-bordered>
				<thead>
					<tr>
						<th>ID</th>
						<th>First Name</th>
						<th>Surame</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Marital Status</th>
						<th>Gender</th>
						<th>Blood Group</th>
						<th>DOB</th>
						<th>Occupation</th>
						<th>Relative's Name</th>
						<th>Relative's Phone</th>
						<th>Temperature</th>
						<th>Blood Pressure</th>
						<th>Pulse</th>
						<th>Weight</th>
						<th>Height</th>
						<th>Preg. Status</th>
						<th>Comments</th>
						<th>Visit Date</th>
					</tr>
				<tbody>
		";
		
		$query = $con->query("SELECT * FROM `patient`") or die(mysqli_errno());
		while($fetch = $query->fetch_array()){
			
		$output .= "
					<tr>
						<td>".$fetch['id']."</td>
						<td>".$fetch['fname']."</td>
						<td>".$fetch['sname']."</td>
						<td>".$fetch['address']."</td>
						<td>".$fetch['phone']."</td>
						<td>".$fetch['maritalstatus']."</td>
						<td>".$fetch['sex']."</td>
						<td>".$fetch['bloodgroup']."</td>
						<td>".$fetch['DOB']."</td>
						<td>".$fetch['occupation']."</td>
						<td>".$fetch['relat_name']."</td>
						<td>".$fetch['relat_phone']."</td>
						<td>".$fetch['temp']."</td>
						<td>".$fetch['bp']."</td>
						<td>".$fetch['pulse']."</td>
						<td>".$fetch['weight']."</td>
						<td>".$fetch['height']."</td>
						<td>".$fetch['preg_status']."</td>
						<td>".$fetch['comments']."</td>
						<td>".$fetch['date']."</td>

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