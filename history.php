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
	<!--table for history-->
	<div class="container">
		<div class="row">


			<div class="col-md-4">
				<h2>Check IN</h2>
				 <table>
 					<tr>
  						<th>Room No</th> 
  						<th>Name</th> 
  						<th>ID</th>
  						<th>Start Date</th>
  						<th>End Date</th>
 					</tr>
 					<!--PHP CODE FOR TABLE-->
 					<?php
					$query = "SELECT RRoom_ID, Name, C_ID, Start_date, End_date FROM Booking_info inner join customer on (Booking_info.C_ID=customer.ID_number) Where End_date IS Null";
  					$result = mysqli_query($db, $query);
					  	if (mysqli_num_rows($result) > 0) {
					   while($row = $result->fetch_assoc()) {
					    echo "<tr><td>" . $row["RRoom_ID"]. "</td><td>" . $row["Name"] . "</td><td>"
					. $row["C_ID"]. " </td><td>" . $row["Start_date"] . " </td><td>" .  $row["End_date"] . "</td></tr>";
					}
					echo "</table>";
					}
					 else { 
						echo "string";
					}
					?>
				</table>
			</div>
			</div>
	



<div class="row">

	<div class="col-md-4">
				<h2>Food Ordered</h2>
				 <table>
 					<tr>
 						<th>Date</th>
  						<th>Room No</th> 
  						<th>Name</th> 
  						<th>ID</th>
  						<th>Food</th>
  						<th>Quantity</th>
  						<th>Bill</th>
 					</tr>
 					<!--PHP CODE FOR TABLE-->
 					<?php
					$query = "SELECT  Fdate, FRRoom_id ,Name, ID_Number, Item, Quantity, Bill from food_order INNER JOIN booking_info ON (food_order.FRRoom_id=booking_info.RRoom_ID) JOIN customer on (booking_info.C_ID=customer.ID_Number) JOIN food on (food_order.Food_id=food.F_ID) Where food_order.fDate BETWEEN booking_info.Start_date and booking_info.End_date OR food_order.fDate BETWEEN booking_info.Start_date and booking_info.End_date is null";
  					$result = mysqli_query($db, $query);
					  	if (mysqli_num_rows($result) > 0) {
					   while($row = $result->fetch_assoc()) {
					    echo "<tr><td>" . $row["Fdate"]. "</td><td>" . $row["FRRoom_id"]. "</td><td>" . $row["Name"] . "</td><td>"
					. $row["ID_Number"]. " </td><td>" . $row["Item"] . " </td><td>" .  $row["Quantity"] . "</td><td>" .  $row["Bill"] .  "</td></tr>";
					}
					echo "</table>";
					}
					 else { 
					}
					?>
				</table>
			</div>

		</div>

	
</from>
<div class="column">
		<div class="col-md-4">
		<div>
			<form method="post" action="Checkout.php">
			<div class="info-margin">
		<input type="text" name="room_no" placeholder="Room No" autocomplete="off" class="info"> 
		</div>
		<div class="info-margin">
		<input type="text" name="fin_no" placeholder="End Date" autocomplete="off" class="info"> 
		<div class="info-margin">
		<div>

							<button type="submit" name="Check_out" class="btn">Submit</button>
						</div>
					</form>
</div>
	</div>
	<!-- Bootstrap core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>