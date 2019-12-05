<?php
	include "ConnectServer.php";
	
	if(isset($_GET["editAssignment"])){
		$subject = $_GET['subject'];
		$assnName = $_GET['assnName'];
		$description = $_GET['description'];
		$pointsAvailable = $_GET['pointsAvailable'];
		$assnID = $_GET['assnID'];

		$sql = 	"UPDATE gb_assignments SET 
			subject='$subject', assnName='$assnName', description='$description', pointsAvailable='$pointsAvailable', assnID='$assnID'
			WHERE assnID = $assnID";
		$stmt = $dbConn -> prepare ($sql);
		$stmt->execute();
	}; 

	function retriveAssn(){
		global $dbConn;
			$sql = 'SELECT * FROM gb_assignments 
			WHERE assnID ='. $_GET["assnID"];
			
			$stmt = $dbConn -> prepare ($sql);
			$stmt->execute();
			$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $records;
	};
	$assignment=retriveAssn();
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
  
    <!-- Bootstrap -->
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
				<h1>Edit assignment</h1>
			</header>
		</div>
		<div class="card-body">
			<form>
				subject: <input type="text" name="subject" value="<?= $assignment[0]["subject"]?>" />
				Assignment name: <input type="text" name="assnName" value="<?= $assignment[0]["assnName"]?>" />
				Description: <input type="text" name="description" value="<?= $assignment[0]["description"]?>" /> 
				Points: <input type="text" name="pointsAvailable" value="<?= $assignment[0]["pointsAvailable"]?>" />
				<input type="hidden" name="assnID" value="<?= $assignment[0]["assnID"]?>" />
			
				<button name="editAssignment"> Edit Assignment </button>
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
