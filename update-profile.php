<!-- update-profile.php -->
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
	        <h1 class="mt-4 text-center">Update Your Profile</h1>
	        <div class="container row">
	        	<div class="col-lg-2"></div>
	        	<div class="col-lg-8 mb-4">
	        		<form action="manage-insert.php" method="POST"  enctype="multipart/form-data">
	        			<?php 
	        				include 'dbCon.php';
									$con = connect();
	        				$u_id = $_SESSION['id'];
							$sql = "SELECT * FROM `users` WHERE donar_id = '$u_id';";
							$result = $con->query($sql);
							foreach ($result as $r) {
						?>
	        			<div class="form-group">
		        			<label>Donar Name</label>
		        			<input type="text" class="form-control" name="name" value="<?php echo $r['name']; ?>" placeholder="Doner Name">
		        		</div>
		        		<div class="form-group">
		        			<label>Donar Email</label>
		        			<input type="email" class="form-control" name="email" value="<?php echo $r['email']; ?>" placeholder="Doner Email">
		        		</div>
		        		<div class="form-group">
		        			<label>Gender</label>
		        			<?php $gender = $r['gender']; 
		        			if ($gender == "Male") { ?>
		        			<input type="radio"  name="gender" value="Male" checked="">Male
		        			<input type="radio"  name="gender" value="Female">Female
		        			<?php }elseif ($gender == "Female") { ?>
		        			<input type="radio"  name="gender" value="Male" >Male
		        			<input type="radio"  name="gender" value="Female" checked="">Female
		        			<?php } ?>
		        		</div>
		        		<div class="form-group">
		        			<label>Age</label>
		        			<input type="number" class="form-control" min="1" name="age" value="<?php echo $r['age']; ?>" placeholder="Doner Age">
		        		</div>
		        		<div class="form-group">
		        			<label>Moile Number</label>
		        			<input type="text" class="form-control" name="phone" value="<?php echo $r['mobile']; ?>" placeholder="Doner Phone">
		        		</div>
		        		<div class="form-group">
		        			<label>Address Area</label>
		        			<select class="form-control" name="area">
		        				<?php $area = $r['area_id']; 
		        					$sql3 = "SELECT * FROM `area` where id='$area';";
									$result3 = $con->query($sql3);
									foreach ($result3 as $r3) {
		        				?>
		        				<option value="<?php echo $r3['id']; ?>"><?php echo $r3['area_name']; ?></option>
		        				<?php 
		        				}
									$sql2 = "SELECT * FROM `area`;";
									$result2 = $con->query($sql2);
									foreach ($result2 as $r2) {
								?>
									<option value="<?php echo $r2['id']; ?>"><?php echo $r2['area_name']; ?></option>
								<?php } ?>
		        			</select>
		        		</div>
		        		<input type="hidden" name="id" value="<?php echo $r['donar_id']; ?>">
		        		<input type="submit" name="updateinfo" class="btn  btn-primary" value="Update">
		        		<?php } ?>
	        		</form>
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
