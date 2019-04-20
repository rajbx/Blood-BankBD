<!-- manage-insert.php -->
<?php 
session_start();
	include_once 'dbCon.php';
	$con = connect();
// registratuion 
	if (isset($_POST['reg'])){

        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $b_group = $_POST['b_group'];
        $area = $_POST['area'];
        $password = $_POST['password'];


        $checkSQL = "SELECT * FROM `users` WHERE email = '$email';";
        $checkresult = $con->query($checkSQL);
        if ($checkresult->num_rows > 0) {
        	echo '<script>alert("Restaurant With This Email Is Already Exit.")</script>';
        	echo '<script>window.location="registration.php"</script>';
        }else{

	        	if (isset($_FILES['image'])) {
				 // files handle
				    $targetDirectory = "user-image/";
				    // get the file name
				    $file_name = $_FILES['image']['name'];
				    // get the mime type
				    $file_mime_type = $_FILES['image']['type'];
				    // get the file size
				    $file_size = $_FILES['image']['size'];
				    // get the file in temporary
				    $file_tmp = $_FILES['image']['tmp_name'];
				    // get the file extension, pathinfo($variable_name,FLAG)
				    $extension = pathinfo($file_name,PATHINFO_EXTENSION);

				    if ($extension =="jpg" || $extension =="png" || $extension =="jpeg"){
				    	move_uploaded_file($file_tmp,$targetDirectory.$file_name);
				    	$iquery="INSERT INTO `users`(`name`, `gender`, `age`, `mobile`, `b_id`, `area_id`, `email`, `pwd`, `pic`) 
			        		VALUES ('$name','$gender','$age','$phone','$b_group','$area','$email','$password','$file_name');";
			        	if ($con->query($iquery) === TRUE) {
			        		echo '<script>alert("You Register successfully")</script>';
			        		echo '<script>window.location="signin.php"</script>';
			        	}else {
			                echo "Error: " . $iquery . "<br>" . $con->error;
			            }
				    	
				    }else{
				    	echo '<script>alert("Required JPG,PNG,GIF in Logo Field.")</script>';
		        		echo '<script>window.location="registration.php"</script>';
				    }
				}else{
					$file_name = "";

					$iquery="INSERT INTO `users`(`name`, `gender`, `age`, `mobile`, `b_id`, `area_id`, `email`, `pwd`, `pic`) 
			        		VALUES ('$name','$gender','$age','$phone','$b_group','$area','$email','$password','$file_name');";
		        	if ($con->query($iquery) === TRUE) {
		        		echo '<script>alert("You Register successfully")</script>';
		        		echo '<script>window.location="signin.php"</script>';
		        	}else {
		                echo "Error: " . $iquery . "<br>" . $con->error;
		            }
				}
        }
    }
//request send
    if (isset($_POST['sendrequest'])){

        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $b_group = $_POST['b_group'];
        $area = $_POST['area'];
        $rdate = $_POST['rdate'];
        $details = $_POST['details'];

        
    	$iquery="INSERT INTO `blood_request`(`name`, `gender`, `age`, `mobile`, `b_id`, `area_id`, `required_date`, `details`) 
    		VALUES ('$name','$gender','$age','$phone','$b_group','$area','$rdate','$details');";
    	if ($con->query($iquery) === TRUE) {
    		echo '<script>alert("You Request successfully added.")</script>';
    		echo '<script>window.location="send-request.php"</script>';
    	}else {
            echo "Error: " . $iquery . "<br>" . $con->error;
        }		   
    }
/// add donation info
    if (isset($_POST['donate'])){
    	$d_id = $_SESSION['id'];
        $hname = $_POST['hname'];
        $nounit = $_POST['nounit'];
        $ddate = $_POST['ddate'];
        
    	$iquery="INSERT INTO `donate_info`(`d_id`, `h_name`, `nounit`, `donate_date`) 
    		VALUES ('$d_id','$hname','$nounit','$ddate');";
    	if ($con->query($iquery) === TRUE) {
    		echo '<script>alert("Recorded successfully.")</script>';
    		echo '<script>window.location="blood-donate.php"</script>';
    	}else {
            echo "Error: " . $iquery . "<br>" . $con->error;
        }		   
    }
    //add favorite
    if (isset($_POST['addfavourite'])){
    	$u_id = $_SESSION['id'];
        $d_name = $_POST['donar'];
        $d_id = '';

        $sql2 = "SELECT `donar_id`, `name`, `gender`, `age`, `email`,`mobile`, `b_id`, `area_id`,`pic`,(SELECT bg_name from bloodgroup WHERE users.b_id = bloodgroup.bg_id) as b_group FROM `users` WHERE name = '$d_name';";
		$result = $con->query($sql2);
		foreach ($result as $r) {
			$d_id = $r['donar_id'];
			$d_name = $r['name'];
			$age = $r['age'];
			$email = $r['email'];
			$pic = $r['pic'];
			$b_group = $r['b_group'];
		}

    	$iquery="INSERT INTO `favorites`(`u_id`, `d_id`, `name`, `email`, `age`, `pic`, `b_group`) 
    		VALUES ('$u_id','$d_id','$d_name','$email','$age','$pic','$b_group');";
    	if ($con->query($iquery) === TRUE) {
    		echo '<script>alert("Recorded successfully.")</script>';
    		echo '<script>window.location="favourites.php"</script>';
    	}else {
            echo "Error: " . $iquery . "<br>" . $con->error;
        }		   
    }
    //update user info
    if (isset($_POST['updateinfo'])){

        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $area = $_POST['area'];
        $id = $_POST['id'];
        
    	$iquery="UPDATE `users` SET `name`='$name',`gender`='$gender',`age`='$age',`mobile`='$phone',`area_id`='$area',`email`='$email';";
    	if ($con->query($iquery) === TRUE) {
    		echo '<script>alert("Updated successfully")</script>';
    		echo '<script>window.location="update-profile.php"</script>';
    	}else {
            echo "Error: " . $iquery . "<br>" . $con->error;
        }
			
    }
    // update donation info 
    if (isset($_POST['donateupdate'])){
        $did = $_POST['did'];
        $hname = $_POST['hname'];
        $nounit = $_POST['nounit'];
        $ddate = $_POST['ddate'];
        
        $iquery="UPDATE `donate_info` SET `h_name`='$hname',`nounit`='$nounit',`donate_date`='$ddate' WHERE id = '$did';";
        if ($con->query($iquery) === TRUE) {
            echo '<script>alert("Record updated successfully.")</script>';
            echo '<script>window.location="donation-list.php"</script>';
        }else {
            echo "Error: " . $iquery . "<br>" . $con->error;
        }          
    }
?>
