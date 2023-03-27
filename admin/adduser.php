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
  <title>Add User - HRS</title>
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
         text-align: center;
         padding: 15px 32px;
         float: block;
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
	  <form action="searchuser.php" method="get" class="d-flex" role="search">
        <input class="form-control me-2" style="height:40px; width:180px;padding-right:10px;" type="search" name="search" placeholder="Search" aria-label="Search">&nbsp;
    <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
        <div class="card card-register mx-auto mt-2">
          <div class="card-header">Add New User</div>
        <div class="card-body"> 

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

<div class="form-group">
  <div class="form-row">
      <div class="col-md">
    <label for="Username">Username:</label>

      <input name="username" type="hidden" value="">
       <input class="form-control input-sm" id="Username" name="username" placeholder=
          "Username" type="text" required>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="form-row">
    <div class="col-md">
    <label  for="Password">Password:</label>

      <input name="password" type="hidden" value="">
        <input class="form-control input-sm" id="Password" name="password" placeholder=
           "Account Password" type="password" required>
      </div>
      <div class="col-md">
	  <label for="Type">Type:</label>


       <select class="form-control input-sm" name="type" id="Type">
		  <option value="">Choose Type</option>
					<option>Admin</option>
					<option>Accounts</option>
					<option>ARTDoctor</option>
					<option>Dentist</option>
					<option>OPDNurse</option>
					<option>OPDDoctor</option>
					<option>Registry</option>
					<option>Pharmacy</option>
					<option>Laboratory</option>
		</select>
    </div>
  </div>
</div><br />
<div class="form-group">
  <div class="form-row">
      <div class="col-md">
    <label for="Firstname">First Name:</label>

      <input name="fname" type="hidden" value="">
       <input class="form-control input-sm" id="Fname" name="fname" placeholder=
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
      <label for="Sex">Gender:</label>

     <select class="form-control input-sm" name="sex" id="Sex">
        <option value="MALE">MALE</option>
        <option value="FEMALE">FEMALE</option>
       
      </select> 
    </div>
  </div>
</div>
<div class="form-group">
  <div class="form-row">
      <div class="col-md">
    <label for="NRC">Enter NRC:</label>

      <input name="NRC" type="hidden" value="">
       <input class="form-control input-sm" id="NRC" name="NRC"  type="text" value="" required>
    </div>
	<div class="col-md">
    <label for="PhysicalAddress">Email Address:</label>

      <input name="email" type="hidden" value="">
       <input class="form-control input-sm" id="Email" name="email" value="" placeholder=
          "Email" type="text" required>
    </div>
  </div>
</div><br />
<div class="form-group">
  <div class="form-row">
      <div class="col-md">
    <label for="Department">Enter Department</label>

      <input name="Department" type="hidden" value="">
       <input type="text" class="form-control input-sm" id="Department" name="department" placeholder=
          "Department" required>
    </div>
    <div class="col-md">
    <label for="Phone">Contact No:</label>

      <input name="phone" type="hidden" value="">
       <input class="form-control input-sm" id="Phone" name="mobilephone" placeholder=
          "Contact No:" type="number" required>
    </div>
  </div>
</div><br />  

  <button class="btn btn-primary btn-block" name="save" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span>Save</button>
  </form>
  <?php 
	extract($_POST);
	if (isset($btn) && !empty($username) && !empty($password) && !empty($type)) {
		require "../includes/admin.php";
		adduser();
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






