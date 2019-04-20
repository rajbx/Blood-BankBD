<!-- nav-bar.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-aqu border-bottom">
	<button class="btn btn-primary" id="menu-toggle"> Menu</button>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	  <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
	    <li class="nav-item active">
	      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
	    </li>
	   	<li class="nav-item">
	      <a class="nav-link" href="contact.php">Contact Us</a>
	    </li>
	    <?php if((!isset($_SESSION['isLoggedIn']))){ ?>
	    <li class="nav-item">
	      <a class="nav-link" href="signin.php">Sign In</a>
	    </li>
	    <?php } ?>
	    <?php if((isset($_SESSION['isLoggedIn']))){ ?>
	    <li class="nav-item dropdown">
	      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	        <?php echo $_SESSION['name']; ?>
	      </a>
	      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	        <a class="dropdown-item" href="#">Action</a>
	        <a class="dropdown-item" href="update-profile.php">Update Profile</a>
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="logout.php">Logout</a>
	      </div>
	    </li>
	    <?php } ?>
	  </ul>
	</div>
</nav>