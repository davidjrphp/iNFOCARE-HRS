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
                    <th>Congregation ID</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Phone</th>
					<th>Gender</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
<?php
include '../includes/pagination.php';
?>
				<tr>
					<td><?php echo $row['username']?></td>
                    <td><?php echo $row['cong_ID']?></td>
					<td><?php echo $row['f_name']?></td>
					<td><?php echo $row['l_name']?></td>
					<td><?php echo $row['phone']?></td>
					<td><?php echo $row['sex']?></td>
					<td><?php echo $row['status']?></td>
					<td class="text-center" > 
						<a href="filt_user.php?id=<?php echo $row["username"]; ?>" title='View'><i class="btn btn-success btn-sm"><span class="fa fa-edit fw-fa"></span>View</i></a>
						<a href="edit_user.php?id=<?php echo  $row["id"]; ?>" class="edit_data4 btn btn-sm btn-primary "  title='Edit'><span class="fa fa-edit fw-fa"></span>Edit</a>
						<a href="deleteuser.php?id=<?php echo $row["username"]; ?>" title='Delete'><i class="btn btn-danger btn-sm"><span class="fa fa-delete fw-fa"></span>Delete</i></a>
					</td> 
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>

		<!--  start  modal -->
<div id="editData4" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Upadte User details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="info_update4">
						<?php include("../edit_user.php");?>
					</div>
					<div class="modal-footer ">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
		</div>
		<!--   end modal -->

	<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination justify-content-end" style="margin:20px 0">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 6) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 6 && $page_no < $total_no_of_pages - 6) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>
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
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('click','.edit_data4',function(){
				var edit_id4=$(this).attr('id');
				$.ajax({
					url:"edit_user.php",
					type:"post",
					data:{edit_id4:edit_id4},
					success:function(data){
						$("#info_update4").html(data);
						$("#editData4").modal('show');
					}
				});
			});
		});
	</script>
</body>
</html>