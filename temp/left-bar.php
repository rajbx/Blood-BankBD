<!-- left-bar.php -->
<div class="bg-aqu border-right" id="sidebar-wrapper">
  <div class="sidebar-heading" style="font-family: fantasy;color: red;letter-spacing: 6px;">Blood Bank </div>
  <div class="list-group list-group-flush">
    <a href="index.php" class="list-group-item list-group-item-action bg-aqu">Dashboard</a>
    <a href="send-request.php" class="list-group-item list-group-item-action bg-aqu">Send Request</a>
    <a href="view-request.php" class="list-group-item list-group-item-action bg-aqu">View Request</a>
    <a href="blood-search.php" class="list-group-item list-group-item-action bg-aqu">Blood Search</a>
	<?php if((isset($_SESSION['isLoggedIn']))){ ?>
    <a href="blood-donate.php" class="list-group-item list-group-item-action bg-aqu">Blood Donate</a>
    <a href="donation-list.php" class="list-group-item list-group-item-action bg-aqu">Donation List</a>
    <a href="favourites.php" class="list-group-item list-group-item-action bg-aqu">Favourites</a>
	<?php } ?>
  
    <a href="#" class="list-group-item list-group-item-action bg-aqu">Status</a>
  </div>
</div>