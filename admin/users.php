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
  <title>All Users</title>
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
          			<a href="index.php" style='color:#000;'>Dashboard</a>
       		 	</li>
        	<li class="breadcrumb-item active"> Panel</li>
      	</ol>
	  <form action="searchuser.php" method="get" class="d-flex" role="search">
        <input class="form-control me-2" style="height:40px; width:180px;padding-right:10px;" type="search" name="search"placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
      </form><br />
        <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> List of All Users &nbsp;&nbsp;<a href="adduser.php" class="btn btn-primary  ">  <i class="fa fa-plus-circle fw-fa"></i>Add New</a>
		</div>
            <div class="card-body">
        <table class="table table-bordered" id="dataTable" cellspacing="0" style="width:100% !important;">
			<thead class="alert-info">
				<tr>
					<th>Username</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Mobile Phone</th>
					<th>NRC</th>
					<th>DOB</th>
					<th>Department</th>
					<th>Date</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody>
<?php

// connect to the database
require '../includes/connect.php';

// set the number of records per page
$records_per_page = 5;

// get the total number of records in the database
$sql = "SELECT COUNT(*) FROM users";
$result = mysqli_query($con, $sql);
$total_records = mysqli_fetch_array($result)[0];

// calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// get the current page number
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = $_GET['page'];
} else {
    $current_page = 1;
}

// calculate the offset for the current page
$offset = ($current_page - 1) * $records_per_page;

// retrieve the records for the current page
$sql = "SELECT * FROM users LIMIT $offset, $records_per_page";
$result = mysqli_query($con, $sql);

// display the records
while ($row = mysqli_fetch_assoc($result)) {
    // display the record data here
	?>
	<tr>
	<td><?php echo $row['username']?></td>
	<td><?php echo $row['fname']?></td>
	<td><?php echo $row['sname']?></td>
	<td><?php echo $row['email']?></td>
	<td><?php echo $row['mobilephone']?></td>
	<td><?php echo $row['NRC']?></td>
	<td><?php echo $row['DOB']?></td>
	<td><?php echo $row['department']?></td>
	<td><?php echo $row['date']?></td>
	<td class="text-aligne" > 
		<a href="viewuser.php?id=<?php echo $row["username"]; ?>" title='View'><i class="btn btn-success btn-sm"><span class="fa fa-edit fw-fa"></span>View</i></a>
		<a href="edituser.php?id=<?php echo  $row["id"]; ?>" class="edit_data4 btn btn-sm btn-primary "  title='Edit'><span class="fa fa-edit fw-fa"></span>Edit</a>
		<a href="deleteuser.php?id=<?php echo $row["username"]; ?>" title='Delete'><i class="btn btn-danger btn-sm"><span class="fa fa-delete fw-fa"></span>Delete</i></a>
	</td> 
</tr>
<?php
	}
?>
</tbody>
</table>
<button><a href="patient.php" method="get" style="margin-left:400px;"><button class="btnlink">View patients</button></a>
<?php
// display the pagination links
if ($total_pages > 1) {
    echo "<div>";
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo "<span>$i</span>";
        } else {
            echo "<a href=\"users.php?page=$i\">$i</a>";
        }
    }
    echo "</div>";
}

// close the database connection
mysqli_close($con);

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