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
  <title>Export patient's Data-HRS</title>
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
            <i class="fa fa-table"></i>Patient's Data 
			<form method="POST" action="excel.php">
			<button class="btn btn-success pull-right" name="export"><span class="glyphicon glyphicon-print"></span>Export</button>
		</form><br />
		</div>
            <div class="card-body">
        <table class="table table-bordered" id="dataTable" cellspacing="0" style="width:100% !important;">
			<thead class="alert-info">
				<tr>
					<th>ID</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Marital Status</th>
					<th>Gender</th>
					<th>Blood Group</th>
					<th>DOB</th>
					<th>Occupation</th>
					<th>Relative's name</th>
					<th>Relative's Phone</th>
					<th>Temperature</th>
					<th>Blood Pressure</th>
					<th>Pulse</th>
					<th>Weight</th>
					<th>Height</th>
					<th>Preg. Status</th>
					<th>Comments</th>
					<th>Birth date</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require '../includes/connect.php';
					
					$query = $con->query("SELECT * FROM `patient`");
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><?php echo $fetch['id']?></td>
					<td><?php echo $fetch['fname']?></td>
					<td><?php echo $fetch['sname']?></td>
					<td><?php echo $fetch['address']?></td>
					<td><?php echo $fetch['phone']?></td>
					<td><?php echo $fetch['maritalstatus']?></td>
					<td><?php echo $fetch['sex']?></td>
					<td><?php echo $fetch['bloodgroup']?></td>
					<td><?php echo $fetch['DOB']?></td>
					<td><?php echo $fetch['occupation']?></td>
					<td><?php echo $fetch['relat_name']?></td>
					<td><?php echo $fetch['relat_phone']?></td>
					<td><?php echo $fetch['temp']?></td>
					<td><?php echo $fetch['bp']?></td>
					<td><?php echo $fetch['pulse']?></td>
					<td><?php echo $fetch['weight']?></td>
					<td><?php echo $fetch['height']?></td>
					<td><?php echo $fetch['preg_status']?></td>
					<td><?php echo $fetch['comments']?></td>
					<td><?php echo $fetch['date']?></td>
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