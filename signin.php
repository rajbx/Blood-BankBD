<!-- signin.php -->
<?php include 'temp/header.php'; ?>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php include 'temp/left-bar.php'; ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      	<?php include 'temp/nav-bar.php'; ?>

	    <div class="container-fluid">
	        <h1 class="mt-4 text-center">Sign In</h1>
	        <div class="container row">
	        	<div class="col-lg-2"></div>
	        	<div class="col-lg-8">
	        		<form action="" method="POST">
		        		<div class="form-group">
		        			<label>Donar Email</label>
		        			<input type="email" class="form-control" name="email" placeholder="Doner Email">
		        		</div>
		        		<div class="form-group">
		        			<label>Password</label>
		        			<input type="password" class="form-control" name="password" placeholder="Password">
		        		</div>
		        		<input type="submit" name="login" class="btn  btn-success" value="Log In">
	        		</form>
	        		<p class="text-center"><a href="registration.php">Registration</a></p>
	        	</div>
	        </div>
	    </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
<?php 
  if (isset($_POST['login'])) {
    
  $email = $_POST['email'];
  $password = $_POST['password'];

  //$ecnpassword= md5($password);

  include 'dbCon.php';
  $con = connect();

  $emailSQL = "SELECT * FROM users WHERE email = '$email';";

  $passwordSQL = "SELECT * FROM users WHERE email = '$email' And pwd = '$password';";

  $emailResult = $con->query($emailSQL);

  $passwordResult = $con->query($passwordSQL);

  if ($emailResult->num_rows <= 0) {
    echo '<script>alert("This Email Does Not Exist.")</script>';
    echo '<script>window.location="signin.php"</script>';
  }else if ($passwordResult->num_rows <= 0) {
    echo '<script>alert("This Password is Incorrect.")</script>';
    echo '<script>window.location="signin.php"</script>';
  }else{

    $_SESSION['isLoggedIn'] = TRUE;

    $SQL = "SELECT * FROM users WHERE email = '$email' And pwd = '$password';";

    $result = $con->query($SQL);

    foreach ($result as $r) {
      $_SESSION['id'] = $r['donar_id'];
      $_SESSION['name'] = $r['name'];
      $_SESSION['email'] = $r['email'];
      $_SESSION['password'] = $r['password'];
      $_SESSION['role'] = $r['role'];
    }
    echo '<script>window.location="index.php"</script>';
    
  	}

  }
?>