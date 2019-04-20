<!-- update-donation.php -->
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
	        <h1 class="mt-4 text-center">Update Blood Donate Information </h1>
	        <div class="container row">
	        	<div class="col-lg-2"></div>
	        	<?php 
	        		$did = $_GET['did'];
	        		include 'dbCon.php';
					$con = connect();
					$no = 1;
					$sql = "SELECT * FROM `donate_info` WHERE id = '$did';";
					$result = $con->query($sql);
					foreach ($result as $r) {
	        	?>
	        	<div class="col-lg-8 mb-4">
	        		<form action="manage-insert.php" method="POST"  enctype="multipart/form-data">
	        			<div class="form-group">
		        			<label>Hospital Name</label>
		        			<input type="text" class="form-control" name="hname" value="<?php echo $r['h_name']; ?>" placeholder="Hospital Name">
		        		</div>
		        		<div class="form-group">
		        			<label>Number Of Unit (Bags)</label>
		        			<input type="number" class="form-control" min="1" value="<?php echo $r['nounit']; ?>" name="nounit" placeholder="Number Of Unit (Bags)">
		        		</div>
		        		<div class="form-group">
		        			<label>Donate Date</label>
		        			<input type="date" class="form-control" value="<?php echo $r['donate_date']; ?>" name="ddate">
		        		</div>
		        		<input type="hidden" name="did" value="<?php echo $did; ?>">
		        		<input type="submit" name="donateupdate" class="btn  btn-success" value="Update">
	        		</form>
	        	</div>
	        	<?php } ?>
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
