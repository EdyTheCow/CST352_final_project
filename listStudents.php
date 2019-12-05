<?php

	include "ConnectServer.php";

	function displayStudents(){
		global $dbConn;
		$sql = "SELECT nameLast, nameFirst, studentID FROM gb_students";

		$stmt = $dbConn -> prepare ($sql);
		$stmt->execute();
		$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">

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
      <li class="nav-item active">
        <a class="nav-link" href="listStudents.php">Students <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listAssignments.php">Assignments</a>
      </li>
    </ul>
	<a href="login/login.php"><button type="button" class="btn btn-primary">Login</button></a>
  </div>
  </div>
</nav>


	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1 class="display-4">Student List</h1>
	    <p class="lead">List of current students in the system</p>
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
				<th data-sortable="true">First name</th>
				<th data-sortable="true">Last name</th>
				<th>View profile</th>
			</tr>
		</thead>
		<tbody>

			<?php
			//echo "<a href='http://itcd4.csumb.edu/~diagarcia/CST352/FinalProject/studentProfile.php?studentID=". $students[$i]['studentID'] ."' ><p class='card-text'>".$students[$i]['nameFirst'] ." ". $students[$i]['nameLast'] ."</p></a><br>";

				$students = displayStudents();

				for ($i=0; $i < sizeof($students); $i++){
					echo "<tr>";
					echo "<th scope='row'>" . $students[$i]['studentID'] . "</th>";
					echo "<td>" . $students[$i]['nameFirst'] . "</td>";
					echo "<td>" . $students[$i]['nameLast'] . "</td>";
					echo "<td scope='row'> <a href='http://itcd4.csumb.edu/~diagarcia/CST352/FinalProject/studentProfile.php?studentID=" . $students[$i]['studentID'] . "'> <button type='button' class='btn btn-primary'>View</button> </a> </td>";
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
</body>
</html>
