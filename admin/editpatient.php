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
  <title>Update Patient-HRS</title>
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
          			<a href="index.php" style='color:#000;'>Update Patient</a>
       		 	</li>
        	<li class="breadcrumb-item active">Admin Panel</li>
      	</ol>
	  <form action="searchuser.php" method="get" class="d-flex" role="search">
        <input class="form-control me-2" style="height:40px; width:180px;padding-right:10px;" type="search" name="search" placeholder="Search by ID" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
        <div class="card card-register mx-auto mt-2">
          <div class="card-header">Update Patient&nbsp;&nbsp;<a href="patient.php" class="btn btn-primary  "><i class="fa fa-plus-circle fw-fa"></i>View Patient</a></div>
        <div class="card-body"> 

		<form action="editpatient.php?id=<?php echo $id; ?>" method="POST">
		<?php
				require "../includes/connect.php";
				$sql = "SELECT * FROM `patient` WHERE `id`='$id'"; 
				$query = mysqli_query($con, $sql);
				while ($row = mysqli_fetch_array($query)) {
					?>
<fieldset>
	<legend><h3>Patient's Information</h3></legend>
		<div class="form-group">
		<div class="form-row">
			<div class="col-md">
			<label for="Firstname">First Name:</label>

			<input name="f_name" type="hidden" value="">
			<input class="form-control input-sm" id="Firstname" name="fname" value="<?php echo $row['fname']; ?>" placeholder=
				"First Name" type="text" required>
			</div>
			<div class="col-md">
			<label for="Lastname">Surname:</label>

			<input name="l_name" type="hidden" value="">
			<input class="form-control input-sm" id="Lastname" name="sname" value="<?php echo $row['sname']; ?>" placeholder=
				"Surname" type="text" required>
			</div>
		</div>
		</div><br />
		<div class="form-group">
		<div class="form-row">
			<div class="col-md">
			<label for="DOB">Date of Birth:</label>
				<input class="form-control input-sm" id="DOB" name="DOB"  type="Date" value="<?php echo $row['DOB']; ?>" required>               
			</div>
			<div class="col-md">
			<label for="Sex">Gender:</label>

			<select class="form-control input-sm" name="sex" value="<?php echo $row['sex']; ?>" id="Sex">
				<option value="MALE">MALE</option>
				<option value="FEMALE">FEMALE</option>
			
			</select> 
			</div>
		</div>
		</div>
	<div class="form-group">
		<div class="form-row">
			<div class="col-md">
			<label for="Age">Current Age:</label>

			<input name="age" type="hidden" value="">
			<input class="form-control input-sm" id="Age" name="age"  type="number" value="<?php echo $row['age']; ?>" required>
			</div>
			<div class="col-md">
			<label for="PhysicalAddress">Physical Address:</label>

			<input name="sex" type="hidden" value="">
			<input class="form-control input-sm" id="Address" name="address" value="<?php echo $row['address']; ?>" placeholder=
				"Address" type="text" required>
			</div>
		</div>
		</div><br />
		<div class="form-group">
		<div class="form-row">
			<div class="col-md">
				<label for="Phone">Mobile Phone</label>

			<input name="phone" type="hidden" value="">
			<input class="form-control input-sm" id="Phone" name="phone" value="<?php echo $row['phone']; ?>" placeholder=
				"Phone No." type="number" required>
			</div>
			<div class="col-md">
			<label for="Occupation">Occupation:</label>

		<select class="form-control input-sm" name="occupation" value="<?php echo $row['occupation']; ?>" id="Occupation">
			<option value="Healthcare Provider">Healthcare Provider</option>
			<option value="Teacher">Teacher</option>
			<option value="Banker">Banker</option>
			<option value="Farmer">Farmer</option>
			<option value="Transport">Transport</option>
			<option value="Trader">Trader</option>
			<option value="Others">Others</option>

		</select> 
			</div>
		</div>
	</div><br />
		<div class="form-group">
		<div class="form-row">
			<div class="col-md">
			<label for="BloodGroup">Choose Blood Group:</label>

				<select class="form-control input-sm" name="bloodgroup" id="BloodGroup">
				<option value="">Choose Blood Group</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="AB">AB</option>
					<option value="O">O</option>
		
				</select> 
			</div> 
			<div class="col-md">
			<label for="MaritalStatus">Marital Status:</label>

			<select class="form-control input-sm" name="maritalstatus" id="maritalstatus">
			<option value="">Choose</option>
				<option value="Single">Single</option>
				<option value="Married">Married</option>
				<option value="Divorced">Divorced</option>
				<option value="Widowed">Widowed</option>
			
			</select> 
			</div>
		</div>
		</div><br />
		<div class="form-group">
		<div class="form-row">
			<div class="col-md">
			<label for="Phone">Relative's Phone:</label>

			<input name="phone" type="hidden" value="">
			<input class="form-control input-sm" id="Phone" name="relatives_phone" placeholder=
				"Contact No:" type="number" required>
			</div>
				<div class="col-md">
			<label for="ParentsName">Relative's Name:</label>
				<input class="form-control input-sm" id="ParentsName" name="parentsname"  type="text" >               
			</div>
			</div>
		</div><br /> 
</fieldset><br />
<fieldset>
	<legend><h3>Vitals</h3></legend>
		<div class="form-group">
		<div class="form-row">
			<div class="col-md">
			<label for="Temperature">Temperature:</label>

			<input name="temp" type="hidden" value="">
			<input class="form-control input-sm" id="Temperature" name="temp" placeholder=
				"Temperature" type="number" required>
			</div>
			<div class="col-md">
			<label for="bp">B/P:</label>

			<input name="role" type="hidden" value="">
			<input class="form-control input-sm" id="BP" name="bp" placeholder=
				"B/P" type="number" required>
			</div>
		</div>
		</div><br />
		<div class="form-group">
		<div class="form-row">
			<div class="col-md">
			<label for="Pulse">Pulse Rate:</label>

			<input name="pulse" type="hidden" value="">
			<input class="form-control input-sm" id="Pulse" name="pulse" placeholder=
				"Pulse" type="number" required>
			</div>
			<div class="col-md">
			<label for="Weight">Weight (kg):</label>

			<input name="weight" type="hidden" value="">
			<input class="form-control input-sm" id="Weight" name="weight" placeholder=
				"Weight" type="numbers" required>
			</div>
		</div>
	</div> <br />
	<div class="form-group">
		<div class="form-row">
			<div class="col-md">
			<label for="Height">Height (m):</label>

			<input name="height" type="hidden" value="">
			<input class="form-control input-sm" id="Pulse" name="height" placeholder=
				"Height" type="number" required>
			</div>
			<div class="col-md">
			<label for="PregnantStatus">Pregnant Status:</label>

			<select class="form-control input-sm" name="preg_status" id="Pregnantstatus">
			<option value="">Choose</option>
				<option value="Pregnant">Pregnant</option>
				<option value="Not Pregnant">Not Pregnant</option>
				<option value="Not Applicable">Not Applicable</option>
			
			</select> 
			</div>
		</div>
	</div><br />
	<div class="form-group">
		<div class="form-row">
			<div class="col-md">
			<label for="DOB">Enrollment Date:</label>
				<input class="form-control input-sm" id="DOB" name="Date"  type="Date" required>               
		</div>
      <div class="col-md">
    	<label  for="Comments">Type Comments Here:</label>

    		<input name="subject" type="hidden" value="">
      	<textarea class="form-control input-sm" id="Comments" name="comments" placeholder=
          "Comments" style="height: 100px" required></textarea>
      </div>
	</div>
</div>
</fieldset>
		<button class="btn btn-primary btn-block" name="save" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
	</form>
		<?php 
			extract($_POST);
			if (isset($btn) && !empty($fname) && !empty($sname) && !empty($phone) && !empty($maritalstatus) && !empty($address) && !empty($parentsname) && !empty($sex) && !empty($DOB) && !empty($occupation) && !empty($bloodgroup) && !empty($date) && !empty($relat_phone) && !empty($temp) && !empty($bp) && !empty($pulse) && !empty($weight) && !empty($height) && !empty($preg_status) && !empty($comments)) {
				require "../includes/admin.php";
				addpatient();
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













<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale1.0">
	<title>Edit Patient - HRS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<br>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<a href="patient.php" style="margin-left:10px;"><button class="btnlink">View Patients</button></a><form action="search.php" method="get" style="float:right;margin-right:15px;"><input name="s" type="text" style="height:25px; width:180px;padding-left:15px;" placeholder="Search Patient By Firstname"></form><br><br>
			<?php $id = $_GET['id']; ?>
			<center>
				<form action="editpatient.php?id=<?php echo $id; ?>" method="POST">
				<?php
				require "../includes/connect.php";
				$sql = "SELECT * FROM `patient` WHERE `id`='$id'"; 
				$query = mysqli_query($con, $sql);
				while ($row = mysqli_fetch_array($query)) {
					?>
				<input type="text" name="fname" class="form" value="<?php echo $row['fname']; ?>" required="required"><br><br>
				<input type="text" name="sname" class="form" value="<?php echo $row['sname']; ?>" required="required"><br><br>
				<input type="maritalstatus" name="maritalstatus" class="form" value="<?php echo $row['maritalstatus']; ?>" required="required"><br><br>
				<input type="number" name="phone" class="form" value="<?php echo $row['phone']; ?>" required="required"><br><br>
				<input type="text" name="address" class="form" value="<?php echo $row['address']; ?>" required="required"><br><br>
					<?php
				}
				 ?>
				
				<select name="gender" class="form" required="required">
					<option value="">Choose Gender</option>
					<option>Male</option>
					<option>Female</option>
				</select><br><br>

				<select name="bloodgroup" class="form" required="required">
					<option value="">Choose Blood Group</option>
					<option>A</option>
					<option>B</option>
					<option>AB</option>
					<option>O</option>
				</select><br><br>

				<select name="birthyear" class="form" required="required">
					<option value="">Choose Birth Year</option>
					<option>2015</option>
					<option>2014</option>
					<option>2013</option>
					<option>2012</option>
					<option>2011</option>
					<option>2010</option>
					<option>2009</option>
					<option>2008</option>
					<option>2007</option>
					<option>2006</option>
					<option>2005</option>
					<option>2004</option>
					<option>2003</option>
					<option>2002</option>
					<option>2001</option>
					<option>2000</option>
					<option>1999</option>
					<option>1998</option>
					<option>1997</option>
					<option>1996</option>
					<option>1995</option>
					<option>1994</option>
					<option>1993</option>
					<option>1992</option>
					<option>1991</option>
					<option>1990</option>
					<option>1989</option>
					<option>1988</option>
					<option>1987</option>
					<option>1986</option>
					<option>1985</option>
					<option>1984</option>
					<option>1983</option>
					<option>1982</option>
					<option>1981</option>
					<option>1980</option>
					<option>1979</option>
					<option>1978</option>
					<option>1977</option>
					<option>1976</option>
					<option>1975</option>
					<option>1974</option>
					<option>1973</option>
					<option>1972</option>
					<option>1971</option>
					<option>1970</option>
					<option>1969</option>
					<option>1968</option>
					<option>1967</option>
					<option>1966</option>
					<option>1965</option>
					<option>1964</option>
					<option>1963</option>
					<option>1962</option>
					<option>1961</option>
					<option>1960</option>
				</select><br><br>
				<input type="submit" value="Update" class="btnlink" name="btn"><br><br>
			</form>
			
			</center>
			
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>