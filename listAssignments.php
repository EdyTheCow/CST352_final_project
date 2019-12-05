<?php
   include('login/session.php');
?>


<?php 

	include "ConnectServer.php";

	function displayAssignments(){
		global $dbConn;	
		$sql = "SELECT assnID, subject, assnName, description, pointsAvailable FROM gb_assignments";
		
		$stmt = $dbConn -> prepare ($sql);
		$stmt->execute();
		$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		//print_r($records);
		return $records;
	};

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Student List</title>

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Bootstrap -->
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">	</script>

	<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
<style>

.logoutBtn {
	margin-left: 10px;
}

</style>
</head>

<body>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <a class="navbar-brand" href="#">SchoolName</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="listStudents.php">Students</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="listAssignments.php">Assignments <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span>Logged in as <b><?php echo $login_session; ?></b> </span>
	<a class="logoutBtn" href="login/logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
  </div>
  </div>
</nav>


	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1 class="display-4">Assignments List</h1>
	    <p class="lead">List of current assignments in the system</p>
	    <a href="addAssn.php"><button type="button" class="btn btn-primary">Add Assignment</button></a>
	  </div>
	</div>


<div class="container">

	<table 
	  data-toggle="table"
  	  data-pagination="true"
  	  data-search="true"
  	  data-sort-class="table-active"
  	  data-sortable="true"
  	  data-page-size="30"
	>
		<thead>
			<tr>
				<th data-sortable="true">ID</th>
				<th data-sortable="true">Subject</th>
				<th data-sortable="true">Name</th>
				<th>Description</th>
				<th data-sortable="true">Score</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>

			<?php
			//echo "<a href='http://itcd4.csumb.edu/~diagarcia/CST352/FinalProject/studentProfile.php?studentID=". $students[$i]['studentID'] ."' ><p class='card-text'>".$students[$i]['nameFirst'] ." ". $students[$i]['nameLast'] ."</p></a><br>";

				$assignments = displayAssignments();

				for ($i=0; $i < sizeof($assignments); $i++){

					echo "<tr>";
					echo "<th scope='row'>" . $assignments[$i]['assnID'] . "</th>";
					echo "<td>" . $assignments[$i]['subject'] . "</td>";
					echo "<td>" . $assignments[$i]['assnName'] . "</td>";
					echo "<td>" . $assignments[$i]['description'] . "</td>";
					echo "<td>" . $assignments[$i]['pointsAvailable'] . "</td>";
					echo "<td><a class='btn btn-primary' href='editAssn.php?assnID=" . $assignments[$i]['assnID'] . "' >Edit</a></td>";
					echo "<td><a class='btn btn-danger' href='deleteAssn.php?assnID=" . $assignments[$i]['assnID'] . "' >Delete</a></td>";
					echo "</tr>";
				};			
			?>

		</tbody>
	</table>

	</div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
</body>
</html>
