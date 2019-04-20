<!-- contact.php -->
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
	        <section class="container mb-4">
		    <!--Section heading-->
		    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
		    <!--Section description-->
		    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
		        a matter of hours to help you.</p>

		    <div class="row">
		    	<div class="col-md-1"></div>
		        <div class="col-md-10 mb-5">
		            <form id="contact-form" name="contact-form" action="" method="POST">
		                <div class="row">
		                    <div class="col-md-6">
		                        <div class="md-form mb-0">
		                            <input type="text" id="name" name="name" class="form-control">
		                            <label for="name" class="">Your name</label>
		                        </div>
		                    </div>
		                    <div class="col-md-6">
		                        <div class="md-form mb-0">
		                            <input type="text" id="email" name="email" class="form-control">
		                            <label for="email" class="">Your email</label>
		                        </div>
		                    </div>
		                </div>
		                <div class="row">
		                    <div class="col-md-12">
		                        <div class="md-form mb-0">
		                            <input type="text" id="subject" name="subject" class="form-control">
		                            <label for="subject" class="">Subject</label>
		                        </div>
		                    </div>
		                </div>
		                
		                <div class="row">
		                    <div class="col-md-12">
		                        <div class="md-form">
		                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
		                            <label for="message">Your message</label>
		                        </div>
		                    </div>
		                </div>

		            </form>
		            <div class="text-center text-md-left">
		                <a class="btn btn-primary">Send</a>
		            </div>
		            <div class="status"></div>
		        </div>
		        
		        
		        <div class="col-md-12 text-center">
		            <ul class="list-unstyled mb-0">
		                <li><i class="fas fa-map-marker-alt fa-2x"></i>
		                    <p>43/o/1,Indira Road,Dhaka 1215</p>
		                </li>

		                <li><i class="fas fa-phone mt-4 fa-2x"></i>
		                    <p>+8801756811359</p>
		                </li>

		                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
		                    <p>rejoanbillah@gmail.com</p>
		                </li>
		            </ul>
		        </div>
		        <!--Grid column-->

		    </div>

		</section>
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
