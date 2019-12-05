<?php
   include("config.php");
   session_start();

   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT id FROM admin_users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         header("location: ../listAssignments.php");
      }else {
         $error = '<div class="alert alert-danger" role="alert">Username or password is wrong!</div>';
      }
   }
?>


<html>

   <head>
      <title>Admin Login</title>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link href="signin.css" rel="stylesheet">
   </head>

  <body class="text-center">


   <form class="form-signin" method = "post">
  <h1 class="h3 mb-3 font-weight-normal">Admin Login</h1>

  <?php echo $error; ?>

  <label for="inputUsername" class="sr-only">Username</label>
  <input name="username" type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>

  <label for="inputPassword" class="sr-only">Password</label>
  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

  <div class="checkbox mb-3">
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
  <br />
  <a href="../listStudents.php"><button class="btn btn-lg btn-secondary btn-block">Back</button></a>

</form>



         </div>
      </div>

   </body>
</html>
