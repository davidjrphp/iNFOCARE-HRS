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
  <title>Add Symptoms-HRS</title>
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
         display: block;
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
          			<a href="index.php" style='color:#000;'>Dashboard</a>
       		 	</li>
        	<li class="breadcrumb-item active">Doctor's Panel</li>
      	</ol>
	  <form action="search.php" method="get" class="d-flex" role="searchs">
        <input class="form-control me-2" style="height:40px; width:180px;padding-right:10px;" type="search" name="search" placeholder="Search by ID" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
        <div class="card card-register mx-auto mt-2">
          <div class="card-header">Add Symptoms</div>
        <div class="card-body"> 

			<form action="addsymptoms.php?id=<?php echo $id = $_GET['id']; ?>" method="POST">
				<input type="text" name="name" class="form" value="

				<?php 
				require '../includes/connect.php';
				$id = $_GET['id'];
				$sql = mysqli_query($con,"SELECT * FROM `medication` WHERE `id`='$id'");
				while ($row=mysqli_fetch_array($sql)) {
					$idd = $row['patient_id'];
					
					$sql1 = mysqli_query($con, "SELECT * FROM `patient` WHERE `id`='$idd'");
					while ($roww = mysqli_fetch_array($sql1)) {
						echo $roww['fname']." ".$roww['sname'];
					}
				}
				 ?>" required="required"  disabled="disabled"><br><br>
		 <div class="form-group">
  			<label for="symptoms">Enter Symptoms:</label>
  				<textarea class="form-control" rows="5" name="symptoms" id="symptoms"></textarea>
		</div>
				 
			<fieldset style="height:180px;width:300px;margin:0;">
				<legend>Order Labs:</legend>

		<div class="form-check-inline">
			<label class="form-check-label">
				<input type="checkbox" class="form-check-input" name="viral_loads" value="">Viral Loads
			</label>
			</div>
			<div class="form-check-inline">
			<label class="form-check-label">
				<input type="checkbox" class="form-check-input" name="creatinine" value="">Creatinine
			</label>
			</div>
			<div class="form-check-inline">
			<label class="form-check-label">
				<input type="checkbox" class="form-check-input" name="cd4" value="">CD4 Count
			</label>
			</div>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="malaria" value="">Malaria
				</label>
				</div>
				<div class="form-check-inline">
				<label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="ast" value="">AST
				</label>
				</div>
				<div class="form-check-inline">
				<label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="hgb" value="">HGB
				</label>
				</div>
			</fieldset>
				<input type="submit" value="Send To Lab" class="btnlink" name="btn"><br><br>
			</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($symptoms)) {
				require "../includes/doctor.php";
				addsymptoms();
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