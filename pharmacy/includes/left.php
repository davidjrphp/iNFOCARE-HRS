<div class="left"><br>
	<div class="left">
    <nav><br><br>
      <ul>
        <li><a href="index.php" class="logo">
         <img src="../assets/img/photo-icon-home-logo-23.png">
		 <i class="fas fa-menorah"></i>
          <span class="nav-item">Home</span>
        </a></li><br>
        <li><a href="medical.php" class="logo">
		<img src="../assets/img/1905707.png">
          <i class="fas fa-menorah"></i>
          <span class="nav-item">All Drugs</span>
        </a></li><br>
        <li><a href="pharmqueue.php" class="logo">
		<img src="../assets/img/queue.jpg">
          <i class="fas fa-queues-cog"></i>
          <span class="nav-item">My Queues
		  <?php 
			@require "./../includes/connect.php";
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE  `status`='pharmacy'";
			$query = mysqli_query($con, $sql);
			echo "(".mysqli_num_rows($query).")";
		?>
		  </span>
        </a></li><br>
        <li><a href="dispensations.php" class="logo">
		<img src="../assets/img/pharm.png">
          <i class="fas fa-drugs-cog"></i>
          <span class="nav-item">Add Drug(s)</span>
        </a></li><br>
        <li><a href="patient.php" class="logo">
		<img src="../assets/img/patient.png">
          <i class="fas fa-list"></i>
          <span class="nav-item">All Patients</span>
        </a></li>
      </ul>
    </nav>
	
	
	
	<!--	<a href="index.php"><button class="btnlink">Home</button></a><br><br><br><br>
		<a href="patient.php"><button class="btnlink">My Queue 
		//<?php 
			//@require "./../includes/connect.php";
			//$typee = $_SESSION['type'];
			//$sql = "SELECT * From `medication` WHERE  `status`='pharmacy'";
			//$query = mysqli_query($con, $sql);
			//echo "(".mysqli_num_rows($query).")";
		?>
		</button></a><br><br><br><br>
		
		<a href="medical.php"><button class="btnlink">All Drugs</button></a><br><br><br><br>
		<a href="dispensations.php"><button class="btnlink">Add Drugs</button></a><br><br><br><br>
		<a href="patients.php"><button class="btnlink">All Patients</button></a><br><br><br><br>-->
	</div>
				
</div>