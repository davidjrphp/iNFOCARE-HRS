<?php 
session_start();
if (empty($_SESSION['registry']) OR empty($_SESSION['type'])) {
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
        <input class="form-control me-2" style="height:40px; width:180px;padding-right:10px;" type="search" name="search"placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
      </form><br />
        <div class="card mb-3">
        	

            <i class="fa fa-table"></i>&nbsp;&nbsp;<a href="reports.php" class="btn btn-primary "> <i class="fa fa-plus-circle fw-fa"></i>Update</a>
		</div>

		<div class="card-body">
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
					<th>Address</th>
					<th>Phone</th>
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
					<td><?php echo $fetch['sex']?></td>
					<td><?php echo $fetch['bloodgroup']?></td>
					<td><?php echo $fetch['address']?></td>
					<td><?php echo $fetch['phone']?></td>
					<td><?php echo $fetch['maritalstatus']?></td>
					<td><?php echo $fetch['occupation']?></td>
                    <td><?php echo $fetch['relat_name']?></td>
					<td><?php echo $fetch['relat_phone']?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table><br /><br />
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