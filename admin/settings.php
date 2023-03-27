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
  <title>Settings- HRS</title>
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

  .dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 12px;
  margin-right: 40px;
  font-size: 14px;
  border: none;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  float: right;
  position: relative;
  
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}
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
          			<a href="index.php" style='color:#000;'>Admin Setings</a>
       		 	</li>
        	<li class="breadcrumb-item active">Admin Panel</li>
      	</ol>
	  <form action="searchuser.php" method="get" class="d-flex" role="search">
        <input class="form-control me-2" style="height:40px; width:180px;padding-right:10px;" type="search" name="search" placeholder="Search" aria-label="Search">&nbsp;
    <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      

        <div class="card card-register mx-auto mt-2">
          <div class="card-header">Admin Settings 
            <div class="dropdown">
              <button onclick="myFunction()" class="dropbtn">Export Data</button>
          <div id="myDropdown" class="dropdown-content">
              <a href="expo.php" style="margin-left:30px;">Patients</a>
              <a href="expo1.php" style="margin-left:30px;">History</a>
              <a href="expo2.php" style="margin-left:30px;">Pharmacy</a>
  </div>
</div>
   </div>
        <div class="card-body"> 
		<?php

		$name = $_SESSION['admin'];
		$type = $_SESSION['type'];

	?>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

<div class="form-group">
  <div class="form-row">
    <div class="col-md">
    <label for="Username">Username:</label>

      <input name="username" type="hidden" value="">
       <input class="form-control input-sm" id="Username" name="username" value="<?php echo $name; ?>" placeholder=
          "Username" type="text" disabled>
    </div>
  </div>
</div><br>
<?php 
	require_once '../includes/connect.php';
	$sql = "SELECT * FROM hospital.users WHERE username='". $name . "' AND type='" . $type . "'";
	$query = mysqli_query($con, $sql);

	while ($row = mysqli_fetch_array($query)) {
?>

<div class="form-group">
  <div class="form-row">
      <div class="col-md">
    <label for="Firstname">First Name:</label>

      <input name="fname" type="hidden" value="">
       <input class="form-control input-sm" id="Fname" name="fname" value="<?php echo $row['fname']; ?>" placeholder=
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
      <label for="Password">Enter Password:</label>
          <input class="form-control input-sm" id="pwd" name="password"  type="password" required>               
    </div>
    <div class="col-md">
      <label for="Password">Confirm Password:</label>

	  <input name="password2" type="hidden" value="">
       <input class="form-control input-sm" id="pwd" name="password" value="" placeholder=
          "Retype" type="password" required>
    </div>
  </div>
</div>
<?php
}
?>
<br />  
  <button class="btn btn-primary btn-block" name="save" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span>Save</button>
  </form>
  <?php 
		extract($_POST);
		if (isset($btn) && !empty($fname)&& !empty($sname)&& !empty($password)&& !empty($password2)) {
		if ($password != $password2) {
		echo "<br><b style='color:red;font-size:14px;font-family:Arial;'>Password Must Match</b>";
		}
		else{
		require "../includes/admin.php";
		settings();
		}
				
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

  <script>
      function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

  </script>

</body>
</html>