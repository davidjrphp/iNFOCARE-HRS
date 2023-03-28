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
  <title>Register Patient-HRS</title>
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
          			<a href="index.php" style='color:#000;'>Patient's Registeration</a>
       		 	</li>
        	<li class="breadcrumb-item active">Admin Panel</li>
      	</ol>
	  <form action="search.php" method="get" class="d-flex" role="searchs">
        <input class="form-control me-2" style="height:40px; width:180px;padding-right:10px;" type="search" name="search" placeholder="Search by ID" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
        <div class="card card-register mx-auto mt-2">
          <div class="card-header">Add New Patient&nbsp;&nbsp;<a href="patient.php" class="btn btn-primary  "><i class="fa fa-plus-circle fw-fa"></i>View Patient</a></div>
        <div class="card-body"> 

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	<h3 >Patient's Information</h3>

		<div class="form-group">
			<div class="form-row">
				<div class="col-md">
				<label for="Firstname">First Name:</label>

				<input name="fname" type="hidden" value="">
			<input class="form-control input-sm" id="Firstname" name="fname" placeholder=
				"First Name" type="text" required>
			</div>
			<div class="col-md">
			<label for="Lastname">Surname:</label>

			<input name="l_name" type="hidden" value="">
			<input class="form-control input-sm" id="Lastname" name="sname" placeholder=
				"Surname" type="text" required>
			</div>
		</div>
		</div><br />
		<div class="form-group">
		<div class="form-row">
			<div class="col-md">
			<label for="DOB">Date of Birth:</label>
				<input class="form-control input-sm" id="DOB" name="DOB"  type="Date" required>               
			</div>
			<div class="col-md">
				<label for="Gender">Gender:</label>

				<select class="form-control input-sm" name="sex" id="gender">
					<option value="">Select Gender</option>
					<option value="male">Male</option>
    				<option value="female">Female</option>
				</select> 
			</div>
		</div>
		</div>
	<div class="form-group">
		<div class="form-row">
			<div class="col-md">
			<label for="Age">Current Age:</label>

			<input name="age" type="hidden" value="">
			<input class="form-control input-sm" id="Age" name="age"  type="number" value="" required>
			</div>
			<div class="col-md">
			<label for="PhysicalAddress">Physical Address:</label>

			<input name="sex" type="hidden" value="">
			<input class="form-control input-sm" id="Address" name="address" value="" placeholder=
				"Address" type="text" required>
			</div>
		</div>
		</div><br />
		<div class="form-group">
		<div class="form-row">
			<div class="col-md">
				<label for="Phone">Mobile Phone</label>

			<input name="phone" type="hidden" value="">
			<input class="form-control input-sm" id="Phone" name="phone" placeholder=
				"Phone No." type="number" required>
			</div>
			<div class="col-md">
			<label for="Occupation">Occupation:</label>

		<select class="form-control input-sm" name="occupation" id="Occupation">
			<option>healthcare provider</option>
			<option>teacher</option>
			<option>banker</option>
			<option>farmer</option>
			<option>transport</option>
			<option>trader</option>
			<option>Others</option>

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
					<option>A</option>
					<option>B</option>
					<option>AB</option>
					<option>O</option>
		
				</select> 
			</div> 
			<div class="col-md">
			<label for="MaritalStatus">Marital Status:</label>

			<select class="form-control input-sm" name="maritalstatus" id="maritalstatus">
			<option value="">Choose</option>
				<option>single</option>
				<option>married</option>
				<option>divorced</option>
				<option>widowed</option>
			
			</select> 
			</div>
		</div>
		</div><br />
		<div class="form-group">
			<div class="form-row">
				<div class="col-md">
				<label for="Phone">Relative's Phone:</label>

				<input name="phone" type="hidden" value="">
				<input class="form-control input-sm" id="Phone" name="relat_phone" placeholder=
				"Contact No:" type="number" required>
			</div>
				<div class="col-md">
			<label for="RelativesName">Relative's Name:</label>
				<input class="form-control input-sm" id="RelativesName" name="relat_name"  type="text" placeholder="Relatives Name">               
			</div>
			</div>
		</div><br>
	<h3 style="text-center">Vitals</h3>
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
				"Weight" type="number" required>
			</div>
		</div>
	</div> <br />
	<div class="form-group">
		<div class="form-row">
			<div class="col-md">
			<label for="Height">Height (m):</label>

			<input name="height" type="hidden" value="">
			<input class="form-control input-sm" id="Height" name="height" placeholder=
				"Height" type="number" required>
			</div>
			<div class="col-md">
			<label for="PregnantStatus">Is Pregnant?</label>

			<select class="form-control input-sm" id="pregnant" name="preg_status">
    			<option value="yes">Yes</option>
    			<option value="no">No</option>
  			</select>
			</div>
		</div>
	</div><br />
	<div class="form-group">
		<div class="form-row">
			<div class="col-md">
			<label for="DOB">Enrollment Date:</label>
				<input class="form-control input-sm" id="Date" name="date"  type="Date" required>               
		</div>
      <div class="col-md">
    	<label  for="Comments">Type Comments Here:</label>

    		<input name="comments" type="hidden" value="">
      	<textarea class="form-control input-sm" id="Comments" name="comments" placeholder=
          "Comments" required></textarea>
      </div>
	</div>
</div>
<button class="btn btn-primary btn-block" name="submit" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
	</form>
	<?php
      if(isset($_POST['submit'])){
		$fname = $_POST['fname'];
        $sname = $_POST['sname'];
		$DOB = $_POST['DOB'];
		$sex = $_POST['sex'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
		$occupation = $_POST['occupation'];
        $bloodgroup = $_POST['bloodgroup'];
		$maritalstatus = $_POST['maritalstatus'];
		$relat_name = $_POST['relat_name'];
		$relat_phone = $_POST['relat_phone'];
		$temp = $_POST['temp'];
		$bp = $_POST['bp'];
		$pulse = $_POST['pulse'];
		$weight = $_POST['weight'];
		$height = $_POST['height'];
        $preg_status = $_POST['preg_status'];
		$date = $_POST['date'];
		$comments = $_POST['comments'];
        
        require '../includes/connect.php';

      $query = "INSERT INTO patient VALUES ('','$fname','$sname','$DOB','$age','$address','$phone','$maritalstatus','$sex','$bloodgroup','$occupation','$relat_name','$relat_phone','$temp','$bp','$pulse','$weight','$height','$preg_status','$comments','$date')";

                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    ?>
                     <script type="text/javascript">
            alert("Patient added Successfully.");
            window.location = "patient.php";
        </script>
         <?php
             }               
        ?>  



		<?php 
			/*extract($_POST);
			if (isset($btn) && !empty($fname) && !empty($sname) && !empty($DOB) && !empty($sex) && !empty($age) && !empty($address) && !empty($phone) && !empty($occupation) && !empty($bloodgroup) && !empty($maritalstatus) && !empty($relat_phone) && !empty($relat_name) && !empty($temp) && !empty($bp) && !empty($pulse) && !empty($weight) && !empty($height) && !empty($preg_status) && !empty($date) && !empty($comments)) {
				require "../includes/admin.php";
				addpatient();
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
<script>
  const genderSelect = document.getElementById('gender');
  const pregnantSelect = document.getElementById('pregnant');
  
  genderSelect.addEventListener('change', () => {
    if (genderSelect.value === 'male') {
      pregnantSelect.disabled = true;
      pregnantSelect.value = 'no'; // Set default value to 'no'
    } else {
      pregnantSelect.disabled = false;
    }
  });
</script>

</body>
</html>
