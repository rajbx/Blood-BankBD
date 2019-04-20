<!-- view-request.php -->
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
	        <h1 class="mt-4 text-center">All Request</h1>
	        <div class="container row">
	        	<div class="col-lg-12 mb-4">
	        		<table class="table">
					  	<thead class="thead-dark">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Name</th>
						      <th scope="col">Gender</th>
						      <th scope="col">Age</th>
						      <th scope="col">Phone</th>
						      <th scope="col">B Group</th>
						      <th scope="col">Area</th>
						      <th scope="col">Date</th>
						      <th scope="col">Details</th>
						    </tr>
					  	</thead>
					  	<tbody>
					  		<?php 
					  			include 'dbCon.php';
								$con = connect();
								$no = 1;
								$sql = "SELECT `id`, `name`, `gender`, `age`, `mobile`, `b_id`, `area_id`, `required_date`, `details`,(SELECT bg_name from bloodgroup WHERE blood_request.b_id = bloodgroup.bg_id) as b_group,(SELECT area_name from area WHERE blood_request.area_id = area.id) as a_name FROM `blood_request`;";
								$result = $con->query($sql);
								foreach ($result as $r) {
					  		?>
						    <tr>
						      <th scope="row"><?php echo $no; ?></th>
						      <td><?php echo $r['name']; ?></td>
						      <td><?php echo $r['gender']; ?></td>
						      <td><?php echo $r['age']; ?></td>
						      <td><?php echo $r['mobile']; ?></td>
						      <td><?php echo $r['b_group']; ?></td>
						      <td><?php echo $r['a_name']; ?></td>
						      <td><?php echo $r['required_date']; ?></td>
						      <td><?php echo $r['details']; ?></td>
						    </tr>
						    <?php  $no++; } ?>
					  	</tbody>
					</table>
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
