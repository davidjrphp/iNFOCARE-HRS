<?php 
session_start();
if (empty($_SESSION['admin']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>

<!DOCTYPE html> 
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Export patient's Medical History-HRS</title>
   <!-- Bootstrap core CSS-->
   <!-- Bootstrap core CSS-->
   <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
  <!--<link href="../assets/style/style2.css" rel="stylesheet" type="text/css">-->
  <link rel="stylesheet" type="text/css" href="../assets/style.css">
  
  <style type="text/css" >
	    button {
         width: auto;
         transition-duration: 0.4s;
         font-size: 12px;
		 margin-right: 10px;
         text-align: center;
         padding: 15px 32px;
         float: right;
         border-radius: 5px;
       
       }
   </style>
</head>
 <body class="fixed-nav sticky-footer" id="page-top">
 <?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
    <div class="content-wrapper">
      <div class="container-fluid">
		  	<!-- Breadcrumbs-->
			<ol class="breadcrumb">
        		<li class="breadcrumb-item">
          			<a href="index.php" style='color:#000;'>Dashboard</a>
       		 	</li>
        	<li class="breadcrumb-item active">Admin Panel</li>
      	</ol>
		  
        <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i>Patient's Medical History 
			<form method="POST" action="excel1.php">
			<button class="btn btn-success pull-right" name="export"><span class="glyphicon glyphicon-print"></span>Export</button>
		</form><br />
		</div>
            <div class="card-body">
			<h4 class="text-center">Medical Service Findings</h4>
        <table class="table table-bordered" id="dataTable" cellspacing="0" style="width:100% !important;">
			<thead class="alert-info">
				<tr>
					<th>Patient ID</th>
					<th>Symptoms</th>
					<th>Ordered Labs</th>
					<th>Results & Investingation</th>
					<th>Provider</th>
					<th>Doc. Price</th>
					<th>Medical Price</th>
					<th>Date</th>
					<th>Month</th>
					<th>Year</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require '../includes/connect.php';
					
					$query = $con->query("SELECT * FROM `medication`");
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><?php echo $fetch['patient_id']?></td>
					<td><?php echo $fetch['symptoms']?></td>
					<td><?php echo $fetch['tests']?></td>
					<td><?php echo $fetch['test_results']?></td>
					<td><?php echo $fetch['doctor_type']?></td>
					<td><?php echo $fetch['doctor_price']?></td>
					<td><?php echo $fetch['medical_price']?></td>
					<td><?php echo $fetch['date']?></td>
					<td><?php echo $fetch['month']?></td>
					<td><?php echo $fetch['year']?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table><br />
		<h4 class="text-center">Pharmacy History</h4>
		<table class="table table-bordered" id="dataTable" cellspacing="0" style="width:100% !important;">
			<thead class="alert-info">
				<tr>
					<th>Patient ID</th>
					<th>Pharmacy Dispensation</th>
					<th>Drug Strength</th>
					<th>Units Disp.</th>
					<th>Measurements</th>
					<th>Item/Dose</th>
					<th>Form</th>
					<th>Frequency</th>
					<th>Date</th>
					<th>Month</th>
					<th>Year</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require '../includes/connect.php';
					
					$query = $con->query("SELECT * FROM `medication`");
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><?php echo $fetch['patient_id']?></td>
					<td><?php echo $fetch['medical']?></td>
					<td><?php echo $fetch['drug_strength']?></td>
					<td><?php echo $fetch['units_dispensed']?></td>
					<td><?php echo $fetch['drug_units']?></td>
					<td><?php echo $fetch['item_dose']?></td>
					<td><?php echo $fetch['drug_form']?></td>
					<td><?php echo $fetch['intake_freq']?></td>
					<td><?php echo $fetch['date']?></td>
					<td><?php echo $fetch['month']?></td>
					<td><?php echo $fetch['year']?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
		</div>
 </div>
</div>
</div>
</div>
<?php 
	include "includes/footer.php";
?>
</div>
 <!-- Bootstrap core JavaScript-->
 <!-- Loading Scripts -->
 <script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap-select.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/dataTables.bootstrap.min.js"></script>
</body>
</html>