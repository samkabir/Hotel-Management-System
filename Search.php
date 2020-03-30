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

	<title>Search</title>

	<!-- Theme Main Css File-->
    <link rel="stylesheet" type="text/css" href="css/cssdb.css">
    <link rel="stylesheet" type="text/css" href="css/search.css">

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
			<div class="col-md-6">
				<form method="post" action="C_search.php">
				<h2>Customer Info</h2>
				<div class="info-margin">
					<input type="text" name="name1" placeholder="Name" autocomplete="off" class="info">
				</div>
				<div class="info-margin">
					<input type="tel" name="ID_N1" placeholder="ID Number" autocomplete="off" class="info">
				</div>
				<div>
							<button type="submit" name="view_cus_info" class="btn">Submit</button>
						</div>
			     </form>
		    </div>


        <!--Room search-->

        	<div class="row">
			<div class="col-md-7">
				<form method="post" action="R_Search.php">
				<h2>Booking Info</h2>
				<div class="info-margin">
					<input type="tel" name="room_no" placeholder="Room Number" autocomplete="off" class="info">
				</div>
				<div class="info-margin">
					<p>From</p>
					<input type="text" name="f_date" class="info" placeholder="Start Date">
				</div>
				<div class="info-margin">
					<p>To</p>
					<input type="text" name="t_date" class="info" placeholder="Last Date">
				</div>
			<div>
				<button type="submit" name="Search_Room_info" class="btn">Search</button>
			</div>
			    </form>
		</div>
		</div>
	</div>	
	<!-- Bootstrap core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>