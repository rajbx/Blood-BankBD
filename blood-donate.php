<!-- blood-donate.php -->
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
	        <h1 class="mt-4 text-center">Blood Donate</h1>
	        <div class="container row">
	        	<div class="col-lg-2"></div>
	        	<div class="col-lg-8 mb-4">
	        		<form action="manage-insert.php" method="POST"  enctype="multipart/form-data">
	        			<div class="form-group">
		        			<label>Hospital Name</label>
		        			<input type="text" class="form-control" name="hname" placeholder="Hospital Name">
		        		</div>
		        		<div class="form-group">
		        			<label>Number Of Unit (Bags)</label>
		        			<input type="number" class="form-control" min="1" name="nounit" placeholder="Number Of Unit (Bags)">
		        		</div>
		        		<div class="form-group">
		        			<label>Donate Date</label>
		        			<input type="date" class="form-control" name="ddate">
		        		</div>
		        		<input type="submit" name="donate" class="btn  btn-success" value="Confirm">
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
