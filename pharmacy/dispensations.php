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
  <title>Pharmacy Update-HRS</title>
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
          			<a href="index.php" style='color:#000;'>Pharmacy Update</a>
       		 	</li>
        	<li class="breadcrumb-item active">Admin Panel</li>
      	</ol>
	  <form action="searchuser.php" method="get" class="d-flex" role="search">
        <input class="form-control me-2" style="height:40px; width:180px;padding-right:10px;" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
        <div class="card card-register mx-auto mt-2">
          <div class="card-header">Enter Drug Details&nbsp;&nbsp;<a href="medical.php" class="btn btn-primary  ">  <i class="fa fa-plus-circle fw-fa"></i>View Drugs</a></div>
        <div class="card-body"> 

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<div class="form-group">
			<div class="form-row">
				<div class="col-md">
				<label for="DrugPrice">Enter Drug Price:</label>

				<input name="drug_price" type="hidden" value="">
				<input class="form-control input-sm" id="DrugPrice" name="drug_price" placeholder=
				"Price" type="number" required>
			</div>
				<div class="col-md">
					<label for="Drugname">Enter Drug Name:</label>

					<input name="drug_name" type="hidden" value="">
					<input class="form-control input-sm" id="Drugname" name="drug_name" placeholder=
					"Drug" type="text" required>
				</div>
			</div>
		</div><br />
		<div class="form-group">
		<div class="form-row">
			<div class="col-md">
			<label for="Drugstrength">Enter Strength:</label>
				<input class="form-control input-sm" id="DrugStrength" name="drug_strength" placeholder="Strength" type="number" required>               
			</div>
			<div class="col-md">
			<label for="Units">Enter Units:</label>

			<select class="form-control input-sm" name="measurement" id="Units">
				<option value="mg">mg</option>
				<option value="mcg">mcg</option>
				<option value="mg">gm</option>
				<option value="mcg">ml</option>
			
			</select> 
			</div>
		</div>
		</div>
	<div class="form-group">
		<div class="form-row">
			<div class="col-md">
			<label for="Dosage">Dose/Item:</label>

			<input name="dose_item" type="hidden" value="">
			<input class="form-control input-sm" id="Dosage" name="dose_item"  type="number" value="" required>
			</div>
			<div class="col-md">
			<label for="Form">Choose Form:</label>

			<select class="form-control input-sm" name="drug_form" id="Form">
			<option value="">Form</option>
					<option value="capsules">capsules</option>
					<option value="tablets">tablets</option>
					<option value="drops">drops</option>
					<option value="drops">injection</option>
					<option value="solution">solution</option>
					<option value="sachets">sachets</option>
					<option value="teaspoon">teaspoon</option>
			
			</select> 
			</div>
		</div>
		</div><br />
		<div class="form-group">
			<div class="form-row">
				<div class="col-md">
				<label for="Frequency">Frequency:</label>

				<select class="form-control input-sm" name="intake_freq" id="Frequency">
					<option value="">Choose Frequency</option>
					<option value="o/d">o/d</option>
					<option value="bed">bed</option>
					<option value="3/d">3/d</option>
					<option value="1/week">1/week</option>
					<option value="2/week">2/week</option>
					<option value="3/week">3/week</option>
			
			</select> 
			</div>
			<div class="col-md">
			<label for="UnitsDisp">Units Disp.:</label>

			<input name="units_disp" type="hidden" value="">
			<input class="form-control input-sm" id="UnitsDisp" name="units_disp" placeholder=
				"" type="number" required>
			</div>
		</div>
	</div><br />
		
		<button class="btn btn-primary btn-block" name="submit" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
	</form>
	<?php 

if(isset($_POST['submit'])){
  $drug_price = $_POST['drug_price'];
  $drug_name = $_POST['drug_name'];
  $drug_strength = $_POST['drug_strength'];
  $measurement = $_POST['measurement'];
  $dose_item = $_POST['dose_item'];
  $drug_form = $_POST['drug_form'];
  $intake_freq = $_POST['intake_freq'];
  $units_disp = $_POST['units_disp'];
  
  
  require '../includes/connect.php';

$query = "INSERT INTO pharmacy VALUES ('','$drug_name','$drug_strength','$measurement','$dose_item','$drug_form','$intake_freq','$units_disp', '$drug_price')";

			  $result = mysqli_query($con, $query) or die(mysqli_error($con));
			  ?>
			   <script type="text/javascript">
	  alert("User added Successfully.");
	  window.location = "medical.php";
  </script>
   <?php
	   }               
  ?>  
	   <?php
			/*extract($_POST);
			if (isset($btn) && !empty($drug_name) && !empty($drug_strength) && !empty($measurement) && !empty($dose_item) && !empty($drug_form) && !empty($intake_freq) && !empty($units_disp) && !empty($drug_price)) {
				require "../includes/pharmacy.php";
				dispensations();
			}*/
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
