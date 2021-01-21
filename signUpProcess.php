<?php

include 'config.php';

if (isset($_POST['submit']))
	{
	$user_email = $_POST['email'];
	$fullName = $_POST['fulname'];	
	$user_gender = $_POST['gender'];
	$user_phoneno = $_POST['phonenum'];	
	$password = $_POST['pwd'];
	$repassword = $_POST['repwd'];
	$role = $_POST['role'];
	$user_name=mysqli_real_escape_string($conn,$_POST['username']);
	    
	    if ($password != $repassword) {
            ?>
			 <script>alert('Your Password and Retype Password is not match'); window.location='signUp.php'</script>;
			<?php
        }
        
	    $user_check_query = "SELECT * FROM user WHERE user_name='$user_name' LIMIT 1";
		$result = mysqli_query($conn, $user_check_query);
		$user = mysqli_fetch_assoc($result);
		
		$email_check_query = "SELECT * FROM user WHERE user_email='$user_email' LIMIT 1";
		$result2 = mysqli_query($conn, $email_check_query);
		$email = mysqli_fetch_assoc($result2);
		
			if ($user) { // if user exists
			?><script>alert('Sorry, Username has been taken. Please insert a new one'); window.location='signUp.php'</script>;
			<?php
		} else if ($email) { // if user exists
			?><script>alert('Sorry, You have account already. Please proceed to Log In'); window.location='signUp.php'</script>;
			<?php 
			
		}else
			{
			$hashed= sha1($password);  
 
			$sql = "INSERT INTO user (username,gender,fullname,phoneNo,password,email, role) 
			VALUES ('$_POST[username]','$_POST[gender]','$_POST[fulname]','$_POST[phonenum]','$hashed','$_POST[email]', '$_POST[role]')";
			mysqli_query($conn,$sql)or die ('Could not connect : ' .mysqli_error($conn));
			?>
			<script>alert('Register Successful'); window.location='index.php'</script>;
			<?php
			}
	
	}
?> 