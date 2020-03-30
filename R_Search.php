		<?php
		session_start(); 

		  if (!isset($_SESSION['username'])) {
		    header('location: login.php');
		  }
		  if (isset($_GET['logout'])) {
		    session_destroy();
		    unset($_SESSION['username']);
		    header("location: login.php");
		  }
		?><?php include('server.php') ?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="utf-8">

			<!-- Bootstrap core CSS -->
			<link href="css/bootstrap.min.css" rel="stylesheet">

			<title>History</title>

			<!-- Theme Main Css File-->
		    <link rel="stylesheet" type="text/css" href="css/history.css">
		    <link rel="stylesheet" type="text/css" href="css/cssdb.css">
		    <link rel="stylesheet" type="text/css" href="css/t2.css">
		</head>
		<body>
			<!--Navigation Bar Starts-->

				<div class="navbar-dark bg-dark">
					<?php  if (isset($_SESSION['username'])) : ?>
					<ul class="nav container justify-content-end navbar-dark bg-dark">
					  <li class="nav-item">
					    <a class="nav-link" href="Homepage.php">Home</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="status.php">Status</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="history.php">History</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="Search.php">Search</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="food.php">Food</a>
					  </li>
					  <li class="nav-item">
					   <a class="nav-link" href="history.php?logout='1'">Logout</a>
					     
					</form>
					  </li>
					</ul>
				</div>
				 <?php endif ?>
			
			<!--Navigation Bar Ends-->


			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h2>Booked Room</h2>
						 <table>
		 					<tr>
		  						<th>Room ID</th> 
		  						<th>Name</th> 
		  						<th>ID</th>
		  						<th>Start Date</th>
		  						<th>End Date</th>
		  						<th>Bill</th>
		 					</tr>
		 					<!--PHP CODE FOR TABLE-->
		 <?php
		 if (isset($_POST['Search_Room_info'])) {
		 $R1 = mysqli_real_escape_string($db, $_POST['room_no']);
		 $D1 = mysqli_real_escape_string($db, $_POST['f_date']);
		 $D2 = mysqli_real_escape_string($db, $_POST['t_date']);


        if(empty($R1) & empty($D1) & empty($D2)) {
		
		 	      $query = "SELECT RRoom_ID, Name, C_ID, Start_date, End_date, RBill FROM Booking_info inner join customer on (Booking_info.C_ID=customer.ID_number);";
		           	$result = mysqli_query($db, $query);
							  if (mysqli_num_rows($result) > 0) {
							   // output data of each row
							   while($row = $result->fetch_assoc()) {
							    echo "<tr><td>" . $row["RRoom_ID"]. "</td><td>" . $row["Name"] . "</td><td>"
					. $row["C_ID"]. " </td><td>" . $row["Start_date"] . " </td><td>" .  $row["End_date"] . " </td><td>" .  $row["RBill"] . "</td></tr>";
							}
							echo "</table>";
							} 
							 else {
	
		        }
		        }




		   
		elseif (empty($D1) & empty($D2)) {
	
		           $query = "SELECT RRoom_ID, Name, C_ID, Start_date, End_date FROM Booking_info inner join customer on (Booking_info.C_ID=customer.ID_number) Where RRoom_ID='$R1';";
		           	$result = mysqli_query($db, $query);
							  if (mysqli_num_rows($result) > 0) {
							   // output data of each row
							   while($row = $result->fetch_assoc()) {
							    echo "<tr><td>" . $row["RRoom_ID"]. "</td><td>" . $row["Name"] . "</td><td>"
					. $row["C_ID"]. " </td><td>" . $row["Start_date"] . " </td><td>" .  $row["End_date"] . "</td></tr>";
							}
							echo "</table>";
							} 
							 else {
	
		        }
		        }
		 elseif (empty($R1) & empty($D2)) {
		
		             $query = "SELECT RRoom_ID, Name, C_ID, Start_date, End_date FROM Booking_info inner join customer on (Booking_info.C_ID=customer.ID_number) Where Start_date='$D1';";
		           	$result = mysqli_query($db, $query);
							  if (mysqli_num_rows($result) > 0) {
							   // output data of each row
							   while($row = $result->fetch_assoc()) {
							    echo "<tr><td>" . $row["RRoom_ID"]. "</td><td>" . $row["Name"] . "</td><td>"
					. $row["C_ID"]. " </td><td>" . $row["Start_date"] . " </td><td>" .  $row["End_date"] . "</td></tr>";
							}
							echo "</table>";
							} 
							 else {
	
		        }
		        }

		        		 elseif (empty($R1) & empty($D1)) {
		             $query = "SELECT RRoom_ID, Name, C_ID, Start_date, End_date FROM Booking_info inner join customer on (Booking_info.C_ID=customer.ID_number) Where End_date='$D2';";
		           	$result = mysqli_query($db, $query);
							  if (mysqli_num_rows($result) > 0) {
							   // output data of each row
							   while($row = $result->fetch_assoc()) {
							    echo "<tr><td>" . $row["RRoom_ID"]. "</td><td>" . $row["Name"] . "</td><td>"
					. $row["C_ID"]. " </td><td>" . $row["Start_date"] . " </td><td>" .  $row["End_date"] . "</td></tr>";
							}
							echo "</table>";
							} 
							 else {
	
		        }
		        }
		 elseif (empty($R1)) {
		 
		 	      $query = "SELECT RRoom_ID, Name, C_ID, Start_date, End_date FROM Booking_info inner join customer on (Booking_info.C_ID=customer.ID_number) Where Start_date='$D1' AND End_date='$D2';";
		           	$result = mysqli_query($db, $query);
							  if (mysqli_num_rows($result) > 0) {
							   // output data of each row
							   while($row = $result->fetch_assoc()) {
							    echo "<tr><td>" . $row["RRoom_ID"]. "</td><td>" . $row["Name"] . "</td><td>"
					. $row["C_ID"]. " </td><td>" . $row["Start_date"] . " </td><td>" .  $row["End_date"] . "</td></tr>";
							}
							echo "</table>";
							} 
							 else {
	
		        }
		        }

		         elseif (empty($D1)) {
		       
		 	      $query = "SELECT RRoom_ID, Name, C_ID, Start_date, End_date FROM Booking_info inner join customer on (Booking_info.C_ID=customer.ID_number) Where RRoom_ID='$R1' AND End_date='$D2';";
		           	$result = mysqli_query($db, $query);
							  if (mysqli_num_rows($result) > 0) {
							   // output data of each row
							   while($row = $result->fetch_assoc()) {
							    echo "<tr><td>" . $row["RRoom_ID"]. "</td><td>" . $row["Name"] . "</td><td>"
					. $row["C_ID"]. " </td><td>" . $row["Start_date"] . " </td><td>" .  $row["End_date"] . "</td></tr>";
							}
							echo "</table>";
							} 
							 else {
	
		        }
		        }

   elseif (empty($D2)) {

		 	      $query = "SELECT RRoom_ID, Name, C_ID, Start_date, End_date FROM Booking_info inner join customer on (Booking_info.C_ID=customer.ID_number) Where RRoom_ID='$R1' AND Start_date='$D1';";
		           	$result = mysqli_query($db, $query);
							  if (mysqli_num_rows($result) > 0) {
							   // output data of each row
							   while($row = $result->fetch_assoc()) {
							    echo "<tr><td>" . $row["RRoom_ID"]. "</td><td>" . $row["Name"] . "</td><td>"
					. $row["C_ID"]. " </td><td>" . $row["Start_date"] . " </td><td>" .  $row["End_date"] . "</td></tr>";
							}
							echo "</table>";
							} 
							 else {
	
		        }
		        }
		        }			
				?>
					</table>
					</div>
					</div>
					</div>
			<script src="js/bootstrap.min.js"></script>
		</body>
		</html>