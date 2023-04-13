<div class="left"><br>
	<div class="left">
    <nav><br><br>
      <ul>
        <li><a href="index.php" class="logo">
         <img src="../assets/img/photo-icon-home-logo-23.png">
         <i class="fas fa-queues-cog"></i>
          <span class="nav-item">Home</span>
        </a></li><br><br>
        <li><a href="reception.php" class="logo">
		<img src="../assets/img/queue.jpg">
          <i class="fas fa-queues-cog"></i>
          <span class="nav-item">From Registry
		  <?php 
			@require "./../includes/connect.php";
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND `status`='recdoctor'";
			$query = mysqli_query($con, $sql);
			echo "(".mysqli_num_rows($query).")";
		?>
		  </span>
        </a></li><br><br>
        <li><a href="laboratory.php" class="logo">
		<img src="../assets/img/lab.jpg">
          <i class="fas fa-drugs-cog"></i>
          <span class="nav-item">From Lab
		  <?php 
			@require "./../includes/connect.php";
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE `doctor_type`='$typee' AND `status`='labdoctor'";
			$query = mysqli_query($con, $sql);
			echo "(".mysqli_num_rows($query).")";
		?>
		  </span>
        </a></li><br><br>
        <li><a href="reports.php" class="logo">
		<img src="../assets/img/report.png">
          <i class="fas fa-list"></i>
          <span class="nav-item">Reports</span>
        </a></li><br><br>
		<li><a href="patient.php" class="logo">
		<img src="../assets/img/patient.png">
          <i class="fas fa-patients"></i>
          <span class="nav-item">All Patients</span>
        </a></li>
      </ul>
    </nav>
	
	
	
	</div>
				
</div>