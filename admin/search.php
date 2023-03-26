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
  <title>All Patient</title>
   <!-- Bootstrap core CSS-->
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
         display: inline-block;
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
          			<a href="index.php" style='color:#000;'>Search Patient</a>
       		 	</li>
        	<li class="breadcrumb-item active">Admin Panel</li>
      	</ol>
	  <form action="search.php" method="get" class="d-flex" role="search">
        <input class="form-control me-2" style="height:40px; width:180px;padding-right:10px;" type="search" name="s"placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
      </form><br />
        <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Serach Result &nbsp;&nbsp;<a href="adduser.php" class="btn btn-primary  ">  <i class="fa fa-plus-circle fw-fa"></i>Add New</a>
		</div>
            <div class="card-body">
        <table class="table table-bordered" id="dataTable" cellspacing="0" style="width:100% !important;">
			<thead class="alert-info">
				<tr>
					<th>ID</th>
					<th>Firstname</th>
					<th>Surname</th>
					<th>Sex</th>
					<th>Record</th>
				</tr>
				<?php 
				require '../includes/registry.php';
				searchpatients();
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