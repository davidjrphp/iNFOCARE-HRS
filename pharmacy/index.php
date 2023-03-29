<?php 
session_start();
if (empty($_SESSION['pharmacy']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Pharmacy Dashboard - HRS</title>
		<meta name="viewport" content="width=device-width, initial-scale1.0">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
      <!-- Bootstrap core CSS-->
      <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
	    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
     <!--<link rel="stylesheet" type="text/css" href="../assets/style/style2.css" >-->
	 <link rel="stylesheet" type="text/css" href="../assets/style.css">
     <style type="text/css">
    .card
		{
			border-radius: 20px;
			margin: 0;
			float: block;
      font-family: Arial;
			font-size: 16px;
			text-align: center;
			padding: 5px;
      box-shadow: 10px 10px 5px lightblue;
      align-items: center;
      display: flex;
      flex-direction: row;
      position: flex;
      top: 5px;
      left: 40px;
      
		}

    a:link{
      text-decoration: none;
    }
       button {
         width: auto;
         transition-duration: 0.4s;
         font-size: 12px;
         text-align: center;
         padding: 15px 32px;
         float: block;
         border-radius: 5px;
       
       }
       .center{
         margin: 0;
         position: absolute;
         top: 65%;
         left: 50%;
         -ms-transform: translate(-50%,-50%);
         transform: translate(-50%,-50%);
       }
     </style>
  
	</head>
	<body class="dark lighten-4">
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
        	<li class="breadcrumb-item active">Parmacist Panel</li>
      	</ol>
		<div class="row">
         <div class="col-lg-12">
           <div class="text-center">
            <h2 class="page-header" style='color:#000;'>Welcome to iNFOCARE <?php echo $_SESSION['type'];?> Dashboard</h2 >
            </div>
          </div>
          <!-- /.col-lg-12 -->

          <div class="row" style="justifyContent: center">
        <div class="col-sm-3 col-sm-3 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">
              <?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM hospital.users WHERE `type`='Admin'";
				$query = mysqli_query($con, $sql);
				echo "<br><b style='color:#fff; font-family:Arial; font-size:60px;'>".$row = mysqli_num_rows($query)."</b>"; 
				 ?>

             </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="">
              <span class="float-left">Admins</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div><br />
        <div class="col-sm-3 col-sm-3 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">  <?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM hospital.users WHERE `type`='Registry'";
				$query = mysqli_query($con, $sql);
				echo "<br><b style='color:#fff; font-family:Arial; font-size:60px;'>".$row = mysqli_num_rows($query)."</b>"; 
				 ?></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="">
              <span class="float-left">Registry clerks</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div><br />
        <div class="col-sm-3 col-sm-3 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-appointments"></i>
              </div>
              <div class="mr-5">  <?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM hospital.users WHERE type='OPDDoctor' OR type='Dentist' OR type='OPDNurse' OR type='ARTDoctor' OR type='Laboraory' OR type='Pharmacy'";
				$query = mysqli_query($con, $sql);
				echo "<br><b style='color:#fff; font-family:Arial; font-size:60px;'>".$row = mysqli_num_rows($query)."</b>"; 
				 ?></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="">
              <span class="float-left">Healthcare Providers</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div><br />
		<div class="col-sm-3 col-sm-3 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-groups"></i>
              </div>
              <div class="mr-5">  <?php
				require_once "../includes/connect.php";

				$sql = "SELECT * FROM hospital.users WHERE `type`='Accountant'";
				$query = mysqli_query($con, $sql);
				echo "<br><b style='color:#fff; font-family:Arial; font-size:60px;'>".$row = mysqli_num_rows($query)."</b>"; 
				 ?></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="">
              <span class="float-left">Accountants</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
	  <div style="padding-left:400px;padding-top:60px;">
			
			In your Dashboard you can do the following jobs,<br><br>
			<ol>
				<li>Search Drug(s)</li><br>
				<li>View Prescription</li><br>
				<li>Dispense Drug(s)</li><br>
				<li>View Patient's Medical History</li><br>
				<li>Add Price</li><br>
			</ol>
		</div>
       </div>
		</div>
	</div>
	<?php 
		include "includes/footer.php";
		 ?>
</div>
  <!-- Loading Scripts -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap-select.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/dataTables.bootstrap.min.js"></script>
</body>
</html>