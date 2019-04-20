<!-- donation-list.php -->
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
	        <h1 class="mt-4 text-center">Donation List</h1>
	        <div class="container row">
	        	<div class="col-lg-12 mb-4">
	        		<table class="table">
					  	<thead class="thead-dark">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Name</th>
						      <th scope="col">Hospital Name</th>
						      <th scope="col">Unit</th>
						      <th scope="col">Donate Date</th>
						      <th scope="col">Action</th>
						    </tr>
					  	</thead>
					  	<tbody>
					  		<?php 
					  			$did= $_SESSION['id'];
					  			include 'dbCon.php';
								$con = connect();
								$no = 1;
								$sql = "SELECT `id`, `d_id`, `h_name`, `nounit`, `donate_date`,(SELECT name from users WHERE donate_info.d_id = users.donar_id) as dname FROM `donate_info` WHERE d_id = '$did';";
								$result = $con->query($sql);
								foreach ($result as $r) {
					  		?>
						    <tr>
						      <th scope="row"><?php echo $no; ?></th>
						      <td><?php echo $r['dname']; ?></td>
						      <td><?php echo $r['h_name']; ?></td>
						      <td><?php echo $r['nounit']; ?> (Bag)</td>
						      <td><?php echo $r['donate_date']; ?></td>
						      <td><a class="btn btn-info" href="update-donation.php?did=<?php echo $r['id']; ?>">Update</a></td>
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
