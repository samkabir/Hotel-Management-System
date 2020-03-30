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
						<h2>Booked </h2>
						 <table>
		 					<tr>
		  						<th>Name</th> 
		  						<th>ID</th> 
		  						<th>ID Type</th>
		  						<th>Phone</th>
		  						<th>Address</th>
		 					</tr>
		 					<!--PHP CODE FOR TABLE-->
		 <?php
		 if (isset($_POST['view_cus_info'])) {
		 $N1 = mysqli_real_escape_string($db, $_POST['name1']);
		 $ID1 = mysqli_real_escape_string($db, $_POST['ID_N1']);

		   
		 if (empty($N1) & empty($ID1)) {
		           $query = "SELECT * from customer;";
		           	$result = mysqli_query($db, $query);
							  if (mysqli_num_rows($result) > 0) {
							   // output data of each row
							   while($row = $result->fetch_assoc()) {
							    echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["ID_Number"] . "</td><td>"
							. $row["ID_Type"]. " </td><td>" . $row["Phone"] . " </td><td>" . $row["Address"] . "</td></tr>";
							}
							echo "</table>";
							} 
		        }
		 	elseif (empty($N1)) {
		 		
		           $query = "SELECT * from customer where ID_Number='$ID1';";
		           	$result = mysqli_query($db, $query);
							  if (mysqli_num_rows($result) > 0) {
							   // output data of each row
							   while($row = $result->fetch_assoc()) {
							    echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["ID_Number"] . "</td><td>"
							. $row["ID_Type"]. " </td><td>" . $row["Phone"] . " </td><td>" . $row["Address"] . "</td></tr>";
							}
							echo "</table>";
							} 
		        else {
		       
		        }
		    }


		 elseif (empty($ID1)) {
		 	echo "3";
		   $query1 = "SELECT * from customer where Name='$N1';";
		           	$result = mysqli_query($db, $query1);
							  if (mysqli_num_rows($result) > 0) {
							   // output data of each row
							   while($row = $result->fetch_assoc()) {
							    echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["ID_Number"] . "</td><td>"
							. $row["ID_Type"]. " </td><td>" . $row["Phone"] . " </td><td>" . $row["Address"] . "</td></tr>";
							}
							echo "</table>";
							}
				else{
		        	echo "3else";
		        }
		     
		        }
		 else{
		  $query2 = "SELECT * from customer Where ID_Number='$ID1' And  Name='$N1' ;";
		  echo "4";
		           	$result = mysqli_query($db, $query2);
							  if (mysqli_num_rows($result) > 0) {
							   // output data of each row
							   while($row = $result->fetch_assoc()) {
							    echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["ID_Number"] . "</td><td>"
							. $row["ID_Type"]. " </td><td>" . $row["Phone"] . " </td><td>" . $row["Address"] . "</td></tr>";
							}
							echo "</table>";
							} 
							    else {
		        	echo "string";
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