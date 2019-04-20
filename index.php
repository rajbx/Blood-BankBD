<!-- index.php -->
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
	        <h1 class="mt-4 text-center">Home</h1>
          
	        <p>About one million babies are born with thalassemia every year in the world. The patient is given blood after a certain period of time, but the Guardian used to make arrangements. So, we want to build a digital blood bank through which the blood donation is very easy to give or to keep a list on the database. As a result, the blood donor gets a message of all their previous records and when they will again give blood, they will easily know about their blood donation day. Those who give blood and those who need blood, their trouble will be reduced considerably.
</p>
             <h1 class="mt-4 text-center">Our Objectives</h1>
	        <p>The Blood Bank Management System project aims to make all the procedures automated and therefore with web based it can be more fast and accurate.</p>
<p>This system is designed to handle the daily transactions of the blood bank and search the details when required.</p>
 <p>This system is designed in such a manner that it can suit the needs of all the blood bank requirements in the course of future. </p>
</p>
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
