<div class="left"><br>
	<div class="left">
    <nav>
      <ul><br><br>
        <li><a href="index.php" class="logo">
         <img src="../assets/img/photo-icon-home-logo-23.png">
          <span class="nav-item">Home</span>
        </a></li><br>
        <li><a href="patients.php" class="logo">
		<img src="../assets/img/queue.jpg">
          <i class="fas fa-menorah"></i>
          <span class="nav-item">My Queue
		  <?php 
			@require "./../includes/connect.php";
			$typee = $_SESSION['type'];
			$sql = "SELECT * From `medication` WHERE  `status`='laboratory'";
			$query = mysqli_query($con,$sql);
			echo "(".mysqli_num_rows($query).")";
		?>
		  </span>
        </a></li><br>
        <li><a href="results.php" class="logo">
		<img src="../assets/img/results-icon-png-25.png">
          <i class="fas fa-patients"></i>
          <span class="nav-item">Results</span>
        </a></li><br>
        <li><a href="patient.php" class="logo">
		<img src="../assets/img/patient.png">
          <i class="fas fa-queues-cog"></i>
          <span class="nav-item">All Patients</span>
        </a></li><br>
        <li><a href="./settings.php" class="logo">
		<img src="../assets/img/Settings-icon.png">
          <i class="fas fa-cog"></i>
          <span class="nav-item">Settings</span>
        </a></li>
      </ul>
    </nav>
	
	
	
		<!--<a href="index.php"><button class="btnlink">Home</button></a><br><br><br>
		<a href="patients.php"><button class="btnlink">Patients
		<?php 
			//@require "./../includes/connect.php";
			//$typee = $_SESSION['type'];
			//$sql = "SELECT * From `medication` WHERE  `status`='laboratory'";
			//$query = mysqli_query($con,$sql);
			//echo "(".mysqli_num_rows($query).")";
		?>
		
		</button></a><br><br><br>
		
		<a href="results.php"><button class="btnlink">Results</button></a><br><br><br>
		<a href="patient.php"><button class="btnlink">Patients</button></a><br><br><br>
		<a href="settings.php"><button class="btnlink">Settings</button></a><br><br>-->
	</div>
				
</div>