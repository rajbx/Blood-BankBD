<!-- blood-search.php -->
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
	        <h1 class="mt-4 text-center">Search Blood</h1>
	        <div class="container row">
	        	<div class="col-lg-3"></div>
	        	<div class="col-lg-6 mb-4" style="background: rgba(0,0,0,0.2);padding: 1%;border-radius: 15px;">
	        		<form action="" method="POST" class="row">
	        			<div class="col-lg-4 form-group">
	        				<label>Blood Group</label>
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
	        			<div class="col-lg-4 form-group">
	        				<label>Area</label>
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
	        			<div class="col-lg-4 ">
	        				<label style="width: 100%;padding-bottom: 15px;"></label>
	        				<input type="submit" name="search" value="Search" class="btn btn-primary">
	        			</div>
	        		</form>
	        	</div>
	        	<div class="col-lg-3"></div>
	        	<div class="col-lg-2"></div>
	        	<?php if (isset($_POST['search'])) { ?>
	        	<div class="col-lg-8 mb-4" style="background: rgba(0,0,0,0.1);padding: 1%;">
					<?php 
						$bg = $_POST['b_group'];
						$area = $_POST['area'];
						$sql3 = "SELECT `donar_id`, `name`, `gender`, `age`, `email`,`mobile`, `b_id`, `area_id`,`pic`,(SELECT bg_name from bloodgroup WHERE users.b_id = bloodgroup.bg_id) as b_group FROM `users` WHERE b_id = '$bg' And area_id = '$area';";
						$result3 = $con->query($sql3);
						foreach ($result3 as $r3) {
					?>
	        		<div class="row mb-4">
	        			<div class="col-lg-2"></div>
						<div class="col-lg-8 row" style="background: rgba(175, 157, 157, 0.1);padding: 1%;box-shadow: 0px 0px 9px 2px #888888;border-radius: 20px;">
		        			<div class="col-lg-4" style="text-align: center;">
		        				<img style="width: 100%;height: 100%;" src="user-image/<?php echo $r3['pic']; ?>">
							</div>
							<div class="col-lg-8">
								<div class="row">
									<div class="col-lg-4"><h6>Name :</h6></div>
									<div class="col-lg-8"><?php echo $r3['name']; ?></div>
								</div>
								<div class="row">
									<div class="col-lg-4"><h6>Email :</h6></div>
									<div class="col-lg-8"><?php echo $r3['email']; ?></div>
								</div>
								<div class="row">
									<div class="col-lg-4"><h6>Mobile :</h6></div>
									<div class="col-lg-8"><?php echo $r3['mobile']; ?></div>
								</div>

								<div class="row">
									<div class="col-lg-4"><h6>Age :</h6></div>
									<div class="col-lg-8"><?php echo $r3['age']; ?></div>
								</div>

								<div class="row">
									<div class="col-lg-4"><h6>Group :</h6></div>
									<div class="col-lg-8"><?php echo $r3['b_group']; ?></div>
								</div>
								<?php
									$donar_id = $r3['donar_id'];
									date_default_timezone_set("Asia/Dhaka");
         							$current_date =date("Y-m-d");
         							$last_donate_date = '';
         							$sql4 = "SELECT * FROM `donate_info` WHERE d_id = '$donar_id' order by donate_date ;"; 
         							$result4 = $con->query($sql4);
									foreach ($result4 as $r4) {
										$last_donate_date = $r4['donate_date'];
									}
									$now = strtotime($current_date); // or your date as well
									$your_date = strtotime($last_donate_date);
									$datediff = $now - $your_date;
									$total_days = round($datediff / (60 * 60 * 24));
								?>
								<div class="row">
									<div class="col-lg-4"><h6>Status :</h6></div>
									<div class="col-lg-8">
									<?php if ($total_days < 90 ) { ?>
											<p class="text text-danger">Unavailable</p>
									<?php }elseif ($total_days >= 90) { ?>
											<p class="text text-success">Available</p>
									<?php } ?>
									</div>
								</div>
							</div>
						</div>
	        		</div>
					<?php } ?>
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
