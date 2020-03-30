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
     
?>
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<title>Room Status</title>

	<!-- Theme Main Css File-->
    <link rel="stylesheet" type="text/css" href="css/cssdb.css">
    <link rel="stylesheet" type="text/css" href="css/dbshow.css">


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
			   <a class="nav-link" href="status.php?logout='1'">Logout</a>
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
  						<th>Room No</th> 
  						<th>Type</th> 
  						<th>Capacity</th>
  						<th>Rent</th>
 					</tr>
 					<!--PHP CODE FOR TABLE-->
 					<?php
					$query = "SELECT Room_No, Type, Capacity, Rent FROM room WHERE status='Booked'";
  					$result = mysqli_query($db, $query);
					  if (mysqli_num_rows($result) > 0) {
					   // output data of each row
					   while($row = $result->fetch_assoc()) {
					    echo "<tr><td>" . $row["Room_No"]. "</td><td>" . $row["Type"] . "</td><td>"
					. $row["Capacity"]. " </td><td>" . $row["Rent"] . "</td></tr>";
					}
					echo "</table>";
					} else { 
					}
					?>
				</table>
			</div>


			<div class="col-md-4">
				<h2>Available</h2>
				<table>
				 <tr>
				  <th>Room No</th> 
				  <th>Type</th> 
				  <th>Capacity</th>
				  <th>Rent</th>
				 </tr>
				 <?php
				 $link_address1 = 'checkout.php';
				$query = "SELECT Room_No, Type, Capacity, Rent FROM room WHERE status='Vacant'";
				  $result = mysqli_query($db, $query);
				  if (mysqli_num_rows($result) > 0) {
				   // output data of each row
				   while($row = $result->fetch_assoc()) {
				    echo "<tr><a href='$link_address1'></a><td>" . $row["Room_No"]. "</td><td>" . $row["Type"] . "</td><td>"
				. $row["Capacity"]. " </td><td>" . $row["Rent"] . "</td></tr>";
				}
				echo "</table>";
				} else { 
				}

				?>
				</table>
			</div>



			
			<div class="col-md-4">
				<div>
					<h3>Room Modifier</h3>
				</div>
				 <form method="post" action="status.php">
				<div class="info-margin">
					<input type="tel" name="room_no" placeholder="Room Number" autocomplete="off" class="info">
				</div>
				<div class="info-margin">
					<input type="tel" name="rent" placeholder="New Rent" autocomplete="off" class="info">
				</div>
				<div>
					<button type="submit" name="Room_Mod" class="btn">Update</button>
				</div>
			</div>
			 </form>
		</div>
	</div>
	<!-- Bootstrap core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>