<?php 
session_start();
if (empty($_SESSION['registry']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale1.0">
	<title> Add Patient - HRS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<style type="css/text">
	div:first-of-type{
		display: flex;
		align-items: flex-start;
		margin-bottom: 5px;
	}
	label {
		margin-right: 15px;
		line-height: 32px;
	}
	input{
		appearance: none;
		border radius: 50%;
		width: 16px;
		height: 16px;
		border: 2px solid #999;
		transition: 0.25s all linear;
		margin-right:5px;
		postion: relative;
		top: 4px;
	}
	input:checked{
		border: 6px solid black;
	}
	button-legend{
		color: white;
		background-color: black;
		padding-left: 20px;
		border-radius: 5px;
		border: 0;
		font-size: 14px;
		
	}
	fieldset {
		width:60px;
		height: 60px;
		margin: 0 auto;
		margin-top: 10px;
		border: 1px solid #000;
		font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
		font-size:14px;
		font-weight:100;
	}
	button:hover{
		background-color: white;
		color: black;
		outline: 1px solid black;
	}
	
</style>
	
</head>
<body>
<br>
	<div class="wrapper">
	<?php
		include "includes/header.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<a href="patients.php" style="margin-left:500px;"><button class="btnlink">View Patients</button></a><br>
			
			<center>
				<h4><center>Patient Information</center></h4><br><br>
				<form action="addpatient.php" method="POST">
					<input type="text" name="fname" class="form" placeholder="Enter Firstname" required="required">&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="sname" class="form" placeholder="Enter Surname" required="required"><br><br>
					<input type="number" name="phone" class="form" placeholder="Enter Phone number" required="required">&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="address" class="form" placeholder="Enter Address" required="required"><br><br>
					<select name="occupation" class="form" required="required">
						<option value="">occupation</option>
						<option>Healthcare Provider</option>
						<option>Teacher</option>
						<option>Banker</option>
						<option>Farmer</option>
						<option>Transport</option>
						<option>Trader</option>
						<option>Others</option>
					</select>&nbsp;&nbsp;&nbsp;&nbsp;<select name="maritalstatus" class="form" required="required">
						<option value="">marital status</option>
						<option>single</option>
						<option>married</option>
						<option>divorced</option>
						<option>widowed</option>
						<option>Other</option>
					</select><br><br>
					<input type="text" name="parentsname" class="form" placeholder="Mother's First Name" required="required">&nbsp;&nbsp;&nbsp;&nbsp;<select name="sex" class="form" required="required">
						<option value="">Gender</option>
						<option>Male</option>
						<option>Female</option>
					</select>&nbsp;&nbsp;&nbsp;&nbsp;<select name="bloodgroup" class="form" required="required">
						<option value="">Blood Group</option>
						<option>A</option>
						<option>B</option>
						<option>AB</option>
						<option>O</option>
					</select><br><br>
					
					<select name="birthyear" class="form" required="required">
						<option value="">Birth Year</option>
						<option>2022</option>
						<option>2021</option>
						<option>2020</option>
						<option>2019</option>
						<option>2018</option>
						<option>2017</option>
						<option>2016</option>
						<option>2015</option>
						<option>2014</option>
						<option>2013</option>
						<option>2012</option>
						<option>2011</option>
						<option>2010</option>
						<option>2009</option>
						<option>2008</option>
						<option>2007</option>
						<option>2006</option>
						<option>2005</option>
						<option>2004</option>
						<option>2003</option>
						<option>2002</option>
						<option>2001</option>
						<option>2000</option>
						<option>1999</option>
						<option>1998</option>
						<option>1997</option>
						<option>1996</option>
						<option>1995</option>
						<option>1994</option>
						<option>1993</option>
						<option>1992</option>
						<option>1991</option>
						<option>1990</option>
						<option>1989</option>
						<option>1988</option>
						<option>1987</option>
						<option>1986</option>
						<option>1985</option>
						<option>1984</option>
						<option>1983</option>
						<option>1982</option>
						<option>1981</option>
						<option>1980</option>
						<option>1979</option>
						<option>1978</option>
						<option>1977</option>
						<option>1976</option>
						<option>1975</option>
						<option>1974</option>
						<option>1973</option>
						<option>1972</option>
						<option>1971</option>
						<option>1970</option>
						<option>1969</option>
						<option>1968</option>
						<option>1967</option>
						<option>1966</option>
						<option>1965</option>
						<option>1964</option>
						<option>1963</option>
						<option>1962</option>
						<option>1961</option>
						<option>1960</option>
					</select>&nbsp;&nbsp;&nbsp;&nbsp;<select name="birthmonth" class="form" required="required">
						<option value="">birth month</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>11</option>
						<option>12</option>
					</select>&nbsp;&nbsp;&nbsp;&nbsp;<select name="birthdate" class="form" required="required">
						<option value="">Birth date</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>11</option>
						<option>12</option>
						<option>13</option>
						<option>14</option>
						<option>15</option>
						<option>16</option>
						<option>17</option>
						<option>18</option>
						<option>19</option>
						<option>20</option>
						<option>21</option>
						<option>23</option>
						<option>24</option>
						<option>25</option>
						<option>26</option>
						<option>27</option>
						<option>28</option>
						<option>29</option>
						<option>30</option>
						<option>31</option>
					</select><br><br>
					
					<hr>
					
						<h4>Vitals/Anthropometrics</h4><br><br>
						
						<input type="number" name="temp" class="form" placeholder="Enter Temperature" required="required">&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="bp" class="form" placeholder="Enter BP" required="required"><br><br>
						<input type="number" name="pulse" class="form" placeholder="Enter Pulse rate" required="required">&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="weight" class="form" placeholder="Enter Weight" required="required"><br><br>
						<input type="number" name="height" class="form" placeholder="Enter Height" required="required">&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="preg_status" class="form" placeholder="Pregnancy Status" disabled="disabled"><br><br>
						<input type="text" name="comments" class="form" placeholder="Comment" required="required">&nbsp;&nbsp;&nbsp;&nbsp;<input class="form" type="date" placeholder="Enter date (y/m/d)" name="date" required="required"><br><br><br>
						<fieldset style="height:60px;width:430px;margin:0;">
							<legend>Pregnant Status:</legend>
						<div>
							<input type="radio" id="pregnant" name="preg_status" value="pregnant" checked>
							<label for="pregnant">Pregnant</label>
							<input type="radio" id="Not pregnant" name="preg_status" value="Not pregnant">
							<label for="not_pregnant">Not Pregnant</label>
							<input type="radio" id="Not applicable" name="preg_status" value="Not applicable">
							<label for="pregnant">Not Applicable</label>
						</div>
						</fieldset>
						<br><br>
						<input type="reset" value="Clear" class="btnlink" name="btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Submit" class="btnlink" name="btn"><br><br><br>
						<br>
				</form>
			<?php 
			extract($_POST);
			if (isset($btn) && !empty($fname) && !empty($sname) && !empty($phone) && !empty($maritalstatus) && !empty($address) && !empty($parentsname) && !empty($sex) && !empty($birthyear) && !empty($birthmonth) && !empty($birthdate) && !empty($occupation) && !empty($bloodgroup) && !empty($date) && !empty($temp) && !empty($bp) && !empty($pulse) && !empty($weight) && !empty($height) && !empty($preg_status) && !empty($comments)) {
				require "../includes/registry.php";
				addpatient();
			}
			 ?>
			
			 
			</center>
			
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>