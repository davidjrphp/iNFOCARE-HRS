<?php 
session_start();
if (empty($_SESSION['doctor']) OR empty($_SESSION['type'])) {
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
  <title>Pharmacy Interaction-HRS</title>
   <!-- Bootstrap core CSS-->
   <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
  
  <!--<link rel="stylesheet" type="text/css" href="../assets/sb-admin.css">-->
  <style type="text/css" >
	    button {
         width: auto;
         transition-duration: 0.4s;
         font-size: 12px;
         text-align: center;
         display: inline-block;
         padding: 15px 32px;
         border-radius: 5px;
       
       }
	   #dataTable {
  			font-family: Arial, Helvetica, sans-serif;
  			border-collapse: collapse;
  			width: 100%;
	}
		#cdataTable td, #dataTable th {
  			border: 1px solid #ddd;
 			 padding: 8px;
			 color: white;
	
		}
		#dataTable th {
  			padding-top: 12px;
  			padding-bottom: 12px;
  			text-align: left;
  			background-color: #04AA6D;
  			color: white;
		}
		.table thead tr{
			color: #25c346;
  			background: #fff;
  			text-align: left;
  			font-weight: bold;
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
          			<a href="index.php" style='color:#000;'>Pharmacy Interaction</a>
       		 	</li>
        	<li class="breadcrumb-item active">Doctor's Panel</li>
      	</ol>
	  <form action="searchrep.php" class="d-flex" role="search">
        <input class="form-control me-2" style="height:40px; width:180px;padding-right:10px;" type="search" name="search"placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
      </form><br />
        <div class="card mb-3">
		<?php
					
					require '../includes/connect.php';
					$id = isset($_GET['id']) ? $_GET['id'] : '';
					$query = $con->query("SELECT * FROM `patient` WHERE `id`='$id'");
					while($fetch = $query->fetch_array()){
				?>
        	

            <i class="fa fa-table"></i><h3><?php echo $fetch['fname']." ".$fetch['sname'];?></h3> <br><h5 style="color:blue">Age:<?php echo $fetch['age'];?>years old</h5><br> <h5 style="color:green">Enrollment Date:<?php echo $fetch['date'];?></h5>
		</div>
		<?php
			}
		?>
		<div class="card-body">
			<h4 class="text-center">Pharmacy Interaction</h4>
        <table class="table table-bordered" id="dataTable" cellspacing="0" style="width:100% !important;">
			<thead class="alert-info">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Date</th>
					<th>Drug</th>
					<th>Strength</th>
					<th>Units</th>
					<th>Dose/Item</th>
					<th>Form</th>
					<th>Frequency</th>
					<th>Units Disp.</th>
					<th>Drug Price</th>
				</tr>
			</thead>
				<?php 
				require '../includes/pharmacy.php';
				givendrugs();
				 ?>
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