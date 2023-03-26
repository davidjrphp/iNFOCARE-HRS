<?php
$server_hostname = "'us-cdbr-iron-east-01.cleardb.net',";
$database_name = "hospital";
$username = "bd3d73e2577610";
$password = "c1908ccb";
$link_sqli = mysqli_connect($server_hostname, $username, $password, $database_name);

if(!$link_sqli){
echo "Erro: Unable to connect to MySQL.". PHP_EOL;
echo "Debugging error #: " mysqli_connect_errno(). PHP_EOL;
echo "Error description: " mysqli_connect_errno(). PHP_EOL;
exit;
}

$TableName = "Constant _States_Codes";
$Filename = "drug_name";
$Output = "";
$strSQL = "SELECT *FROM $medication";
$sql = mysqli_query($link_sqli, $strSQL);

If(mysqli_error(link_sqli)){
echo mysqli_error($link_sqli);
}
else{
	//Determine the number of data columns  in the table
	$columns_total = mysqli_num_fields($sql);
	
	//Get the name of the data columns so it can be used in the header row of the export file.
	//Content of the export file is temporarily saved in the variable $Output
	for($i = 0; $i < $columns_total; $i++){
		$Heading = mysqli_fetch_field_direct($sql, $i);
		$Output .= '"' . $Heading->name . '",';
	}
	$Output .="\n";
	//Loop through each record in the table and read the data value from each column.
	while ($row = mysqli_fetch_array(sql)){
	for($i = 0; $i < $columns_total; $i++){
		$Output .="\n";
	}
	$Output .= "\n";
	}	
	
	//The /n is the control code to go to new line int he export file.
//Create the Export File and name it with the name specified in the variable $Filename

$TimeNow = date("YmdHis");
$Filename .= $TimeNow . ".csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=' . $Filename);
echo $Output;
}
exit;
?>
