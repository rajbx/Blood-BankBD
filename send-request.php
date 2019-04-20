<!-- send-request.php -->
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
	        <h1 class="mt-4 text-center">Send Request</h1>
	        <div class="container row">
	        	<div class="col-lg-2"></div>
	        	<div class="col-lg-8 mb-4">
	        		<form action="manage-insert.php" method="POST"  >
	        			<div class="form-group">
		        			<label>Name</label>
		        			<input type="text" class="form-control" name="name" placeholder="Your Name">
		        		</div>
		        		<div class="form-group">
		        			<label>Gender</label>
		        			<input type="radio"  name="gender" value="Male">Male
		        			<input type="radio"  name="gender" value="Female">Female
		        		</div>
		        		<div class="form-group">
		        			<label>Age</label>
		        			<input type="number" class="form-control" min="1" name="age" placeholder="Your Age">
		        		</div>
		        		<div class="form-group">
		        			<label>Moile Number</label>
		        			<input type="text" class="form-control" name="phone" placeholder="Your Phone">
		        		</div>
		        		<div class="form-group">
		        			<label>Required Blood Group</label>
		        			<select class="form-control" name="b_group">
		        				<option> - Select - </option>
		        				<?php 
									include 'dbCon.php';
									$con = connect();
									$sql = "SELECT * FROM `bloodgroup`;";
									$result = $con->query($sql);
									foreach ($result as $r) {
								?>
									<option value="<?php echo $r['bg_id']; ?>"><?php echo $r['bg_name']; ?></option>
								<?php } ?>
		        			</select>
		        		</div>
		        		<div class="form-group">
		        			<label>Which Area?</label>
		        			<select class="form-control" name="area">
		        				<option> - Select - </option>
		        				<?php 
									$sql2 = "SELECT * FROM `area`;";
									$result2 = $con->query($sql2);
									foreach ($result2 as $r2) {
								?>
									<option value="<?php echo $r2['id']; ?>"><?php echo $r2['area_name']; ?></option>
								<?php } ?>
		        			</select>
		        		</div>
		        		<div class="form-group">
		        			<label>Required Date</label>
		        			<input type="date" class="form-control" name="rdate" >
		        		</div>
		        		<div class="form-group">
		        			<label>Details</label>
		        			<textarea rows="3" cols="50" name="details" class="form-control"></textarea>
		        		</div>
		        		<input type="submit" name="sendrequest" class="btn  btn-success" value="Send Request">
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
