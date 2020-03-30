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


	<title>Home</title>

	<!-- Theme Main Css File-->
    <link rel="stylesheet" type="text/css" href="css/cssdb.css">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">

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
		<h2>Room</h2>
		<div class="row">
				<div class="col-md-7">
					<form method="post" action="history.php">
					<div> 
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="info-margin">
								<input type="text" name="Room_No"	placeholder="Room Number" autocomplete="off" class="info">
							</div>
						</div>
						<div class="col-md-6">
							<div class="info-margin">
								<input type="text" name="s_date" class="info" placeholder="Start Date">
							</div>
						</div>
					</div>

					<h2>Personal Information</h2>
					<div class="row">
						<div class="col-md-6">
							<div class="info-margin">
								<input type="text" name="name"	placeholder="Name" autocomplete="off" class="info">
							</div>					
							<div class="info-margin">
								<input type="tel" name="phn" placeholder="Phone Number" autocomplete="off" class="info">
							</div>
						
						</div>

						<div class="col-md-6">
							<div class="info-margin">
								<input type="text" name="ad"	placeholder="Address" autocomplete="off" class="info">
							</div>
							<div class="info-margin">
								<input list="ID" name="ID_T" placeholder="ID Type" class="info">
								  <datalist id="ID">
								    <option value="Passport">
									<option value="NID">
								    <option value="Driving License">
								  </datalist>  					
							</div>
							<div class="info-margin">
								<input type="tel" name="ID"	placeholder="ID Number" autocomplete="off" class="info">
							</div>
						</div>

						<div>
							<button type="submit" name="Book_room" class="btn">Submit</button>
						</div>
		</form>
					</div>
				</div>
	




<!--FODD ADD -->
			
				<div class="col-md-5 food">
					<form method="post" action="history.php">
						<?php include('errors.php'); ?>
					<div>
						<h2>Order Food</h2>
					</div>
					<div class="info-margin">
						<input type="text" name="r_id"	placeholder="Room ID" autocomplete="off" class="info">
					</div>
					<div class="info-margin">
						<input type="text" name="f_id"	placeholder="Food ID" autocomplete="off" class="info">
					</div>
					<div class="info-margin">
						<input type="tel" name="Q"	placeholder="Quantity" autocomplete="off" class="info">
					</div>
					<div class="info-margin">
						<input type="text" name="date" class="info" placeholder="Date">
					</div>
					<div>
						<button type="submit" name="order" class="btn">Order</button>
					</div>
				</div>
			</form>		

		</div>
	</div>



	<!-- Bootstrap core JavaScript -->
	<script src="js/bootstrap.min.js"></script>


</body>
</html>