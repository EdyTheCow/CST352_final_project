<?php
	if(isset($_GET['submitEdit'])){ 
	
		include "ConnectServer.php";

		$assnName = $_GET['assnName'];
		$description = $_GET['description'];
		$pointsAvailable = $_GET['pointsAvailable'];
		$subject = $_GET['subject'];

		$sql = "INSERT INTO `gb_assignments` (assnName, description, pointsAvailable, subject)
		VALUE ('$assnName', '$description', '$pointsAvailable', '$subject')";
	
		$stmt = $dbConn -> prepare ($sql);
		$stmt->execute();

	};
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>author</title>
  <meta name="description" content="">
  <meta name="author" content="frank">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  
   	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>

  
</head>

<body>
	<div>
		<div class="card text-center">
			<div class="card-header">
				<header>
					<h1>Add assignment</h1>
				</header>
			</div>
			<div class="card-body">
				<form>
					Assignment name: <input type="text" name="assnName"/>
					subject: <input type="text" name="subject"/> 
					Description: <input type="text" name="description"/> 
					Points: <input type="text" name="pointsAvailable"/>
				
					<button name="submitEdit"> Submit Edit </button>
				</form>
			</div>
			<div class="card-footer text-muted">
				<p>2019&copy; Copyright by frank</p>
				<p>Only used for school purposes</p>
			</div>
		</div>
	</div>
</body>
</html>
