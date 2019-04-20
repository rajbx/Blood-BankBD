<?php 
session_start();
session_destroy();
echo '<script>window.location="signin.php"</script>';
?>