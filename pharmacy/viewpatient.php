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
  <title>View Patient-HRS</title>
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
          			<a href="index.php" style='color:#000;'>Patient's Information</a>
       		 	</li>
        	<li class="breadcrumb-item active">Admin Panel</li>
      	</ol>
	  <form action="searchrep.php" class="d-flex" role="search">
        <input class="form-control me-2" style="height:40px; width:180px;padding-right:10px;" type="search" name="search"placeholder="Search by ID" aria-label="Search">
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
			<h4 class="text-center">Patient's Infomation</h4>
        <table class="table table-bordered" id="dataTable" cellspacing="0" style="width:100% !important;">
			<thead class="alert-info">
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Surname</th>
					<th>DOB</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Blood Group</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Maritalstatus</th>
					<th>Occupation</th>
					<th>Relat. Name</th>
					<th>Relat. Phone</th>
				</tr>
			</thead>
			<tbody>
				<?php
					
					require '../includes/connect.php';
					$id = isset($_GET['id']) ? $_GET['id'] : '';
					$query = $con->query("SELECT * FROM `patient` WHERE `id`='$id'");
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><?php echo $fetch['id']?></td>
					<td><?php echo $fetch['fname']?></td>
					<td><?php echo $fetch['sname']?></td>
					<td><?php echo $fetch['DOB']?></td>
					<td><?php echo $fetch['age']?></td>
					<td><?php echo $fetch['occupation']?></td>
					<td><?php echo $fetch['bloodgroup']?></td>
					<td><?php echo $fetch['address']?></td>
					<td><?php echo $fetch['phone']?></td>
					<td><?php echo $fetch['maritalstatus']?></td>
					<td><?php echo $fetch['sex']?></td>
                    <td><?php echo $fetch['relat_name']?></td>
					<td><?php echo $fetch['relat_phone']?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table><br />
		<h4 class="text-center">Vital Signs</h4>
		<table class="table table-bordered" id="dataTable" cellspacing="0" style="width:100% !important;">
			<thead class="alert-info">
				<tr>
					<th>Temperature</th>
					<th>B/P</th>
					<th>Pulse</th>
					<th>Weight</th>
					<th>Height</th>
					<th>Preg. Status</th>
					<th>Enrollment Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					
					require '../includes/connect.php';
					$id = isset($_GET['id']) ? $_GET['id'] : '';
					$query = $con->query("SELECT * FROM `patient` WHERE `id`='$id'");
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><?php echo $fetch['temp']?></td>
					<td><?php echo $fetch['bp']?></td>
					<td><?php echo $fetch['pulse']?></td>
					<td><?php echo $fetch['weight']?></td>
					<td><?php echo $fetch['height']?></td>
					<td><?php echo $fetch['preg_status']?></td>
					<td><?php echo $fetch['date']?></td>
					<td class="text-center" > 
						<a href="editpatient.php?id=<?php echo  $fetch["id"]; ?>" class="edit_data4 btn btn-sm btn-primary "  title='Edit'><span class="fa fa-edit fw-fa"></span>Edit</a>
					</td> 
				</tr>
				<?php
					}
				?>
			</tbody>
		</table><br />
		<h4 class="text-center">Notes</h4>
		<table class="table table-bordered" id="dataTable" cellspacing="0" style="width:100% !important;">
			<thead class="alert-info">
				<tr>
					<th>Medical Comments</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
					
					require '../includes/connect.php';
					$id = isset($_GET['id']) ? $_GET['id'] : '';
					$query = $con->query("SELECT * FROM `patient` WHERE `id`='$id'");
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><?php echo $fetch['comments']?></td>
					
				</tr>
				<?php
					}
				?>
			</tbody>
		</table><br />
		<form action="viewpatient.php?id=<?php echo $id = $_GET['id']; ?>" method="post">
				<select name="doctor" class="form" required="required">
					<option value="">Choose Doctor/Nurse</option>
					<option>ARTDoctor</option>
					<option>OPDDoctor</option>
					<option>Dentist</option>
					<option>OPDNurse</option>
					<option>IPDDoctor</option>
				</select><br><br>
				<button class="btn btn-primary btn-block" name="btn" type="submit" value="Assign"><span class="glyphicon glyphicon-floppy-save"></span> Assign</button>
				<!--<input type="submit" name="btn" value="Assign To Doctor" class="btnlink">-->
			</form><br>
			<?php
			extract($_POST);
			if (isset($btn) && !empty($doctor)) {
				require "../includes/registry.php";
			 	assigntodoctor();
			 } 
			 ?>
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