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
		
		<title>Checkout</title>

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
			   <a class="nav-link" href="homepage.php?logout='1'">Logout</a>
			     
			</form>
			  </li>
			</ul>
		</div>
		 <?php endif ?>
	
	
	<!--Navigation Bar Ends-->
	



			<div class="container">
				<div class="row">
					<div class="col-md-4">
						 <table>
		 					<tr>
		  						<th>Room ID</th> 
		  						<th>Name</th> 
		  						<th>ID</th>
		  						<th>Start Date</th>
		  						<th>End Date</th>
		  						<th>Room Bill</th>
		  						<th>Food Bill</th>
		  						<th>Total bill</th>
		 					</tr>
		 					<!--PHP CODE FOR TABLE-->
		 <?php
		 if (isset($_POST['Check_out'])) {
		 $R1 = mysqli_real_escape_string($db, $_POST['room_no']);
		 $D1 = mysqli_real_escape_string($db, $_POST['fin_no']);
 $query0 = "SELECT * from Room where Room_No='$R1' AND Status='Booked';";
  $results0 = mysqli_query($db, $query0);
  

if(!empty($R1) & !empty($D1)) {

if (mysqli_num_rows($results0) == 1) {
	
    $query1 = "UPDATE booking_info SET End_date='$D1' where RRoom_ID='$R1' and End_date is null";
    $query2  = "UPDATE booking_info INNER join room on (RRoom_ID=Room_No) SET RBill =Rent*(select DISTINCT(End_date-Start_date)where RRoom_ID='$R1' and End_date='$D1') WHERE RRoom_ID='$R1' and End_date='$D1';";
    $results1 = mysqli_query($db, $query1);
    $results2 = mysqli_query($db, $query2);
$query3 = "SELECT RRoom_ID, C_ID, name, Start_date, End_date, RBill, sum(Bill) AS Fi_bill, (RBill+Sum(Bill)) as t_bill from booking_info INNER join customer on (customer.ID_Number=booking_info.C_ID) JOIN food_order on (booking_info.RRoom_ID=food_order.FRRoom_id) where FDate BETWEEN 'start_date' and '$D1' and RRoom_ID='$R1' and End_date='$D1';";
        $results3 = mysqli_query($db, $query3);
							  if (mysqli_num_rows($results3) > 0) {
							   // output data of each row
							   while($row = $results3->fetch_assoc()) {
							    echo "<tr><td>" . $row["RRoom_ID"]. "</td><td>" . $row["name"] . "</td><td>"
					. $row["C_ID"]. " </td><td>" . $row["Start_date"] . " </td><td>" .  $row["End_date"] .  " </td><td>" .  $row["RBill"] . " </td><td>" .  $row["Fi_bill"] . " </td><td>" .  $row["t_bill"] . "</td></tr>";
							}
							echo "</table>";
							$query4 = "UPDATE room SET Status = 'Vacant' WHERE Room_No = '$R1';";
							 $results4 = mysqli_query($db, $query4);
							} 
				}
			}
		}

	
				?>
					</table>
					</div>
					</div>
					</div>

	<!-- Bootstrap core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	</body>
</html>