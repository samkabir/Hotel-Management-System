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


	<title>Food Status</title>

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
			   <a class="nav-link" href="food.php?logout='1'">Logout</a>
			     
			</form>
			  </li>
			</ul>
		</div>
		 <?php endif ?>
	
	<!--Navigation Bar Ends-->
	
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<table>
					
					<!--PHP code Food-->
					<?php
					 	echo "<tr>
					  			<th>Food ID</th> 
					  			<th>Item</th> 
					  			<th>Price</th>
							</tr>";
						$query = "SELECT * FROM food";
	  					$result = mysqli_query($db, $query);
						  if (mysqli_num_rows($result) > 0) {
						   // output data of each row
						   while($row = $result->fetch_assoc()) {
						    echo "<tr><td>" . $row["F_ID"]. "</td><td>" . $row["Item"] . "</td><td>"
						. $row["Price"]. "</td></tr>";
						}
						echo "</table>";
						} else { 
						}
						?>

				</table>
			</div>

			<div class="col-md-4">
			<form method="post" action="food.php">
				<?php include('errors.php'); ?>
				<div>	
					<div>
						<h2>Add New Food Item</h2>				
					</div>
				
					<div>
						<div class="info-margin">
						<input type="text" name="F_ID" placeholder="Food ID" autocomplete="off" class="info">
						</div>
						<div class="info-margin">
						<input type="text" name="Item" placeholder="Food Item" autocomplete="off" class="info">
						</div>
						<div class="info-margin">
						<input type="tel" name="Price" placeholder="Price" autocomplete="off" class="info">
						</div>
						<div>
						<button type="submit" name="add_food_info" class="btn">ADD</button>
						</div>
					
					</div>	
			 	</div>
			 </form>
			 <form method="post" action="food.php">
			 
			 	<div>
					<div>
						<h2>Delete Food Item</h2>				
					</div>
				
					<div>
						<div class="info-margin">
						<input type="text" name="F1_ID" placeholder="Food ID" autocomplete="off" class="info">
						</div>
						<button type="submit" name="del_food_info" class="btn">Delete!</button>
						</div>
					
					</div>
				<div>
			 </form>
			 <form method="post" action="food.php">	
			 	
					<div>
						<h3>Food Modifier</h3>
					</div>
					<div class="info-margin">
						<input type="text" name="F2_ID" placeholder="Food ID" autocomplete="off" class="info">
					</div>
					<div class="info-margin">
						<input type="tel" name="price1" placeholder="New Price" autocomplete="off" class="info">
					</div>
					<div>
						<button type="submit" name="mod_food_info" class="btn">Update!</button>
					</div>
				</div>

			</form>	
			</div>	

		</div>
	</div>		
			

	
	<!-- Bootstrap core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>