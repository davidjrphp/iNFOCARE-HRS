<div class="left"><br>
	<div class="left">
    <nav>
      <ul><br><br>
        <li><a href="index.php" class="logo">
         <img src="../assets/img/photo-icon-home-logo-23.png">
		 <i class="fas fa-menorah"></i>
          <span class="nav-item">Home</span>
        </a></li><br><br>
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
        </a></li><br><br>
        <li><a href="results.php" class="logo">
		<img src="../assets/img/results-icon-png-25.png">
          <i class="fas fa-patients"></i>
          <span class="nav-item">Results</span>
        </a></li><br><br>
        <li><a href="patient.php" class="logo">
		<img src="../assets/img/patient.png">
          <i class="fas fa-queues-cog"></i>
          <span class="nav-item">All Patients</span>
        </a></li><br>
      </ul>
    </nav>