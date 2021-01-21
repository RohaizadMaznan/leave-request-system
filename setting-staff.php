<?php 


    $result = "SELECT * from user WHERE  username = '".$_SESSION['username']."'";
    $output = mysqli_query($conn,$result);

    if(isset($_REQUEST['update']))
    {
    $sql =  "update user set  fullname = '".$_REQUEST['fname']."', 
                gender = '".$_REQUEST['gender']."',
                email = '".$_REQUEST['email']."',
                phoneNo = '".$_REQUEST['phoneno']."' 
                where username = '".$_SESSION['username']."'";
                
        if(mysqli_query($conn,$sql))
        {
        ?>
        <script>
            location.assign("staff-index.php?post_type=setting&submitted=success");
            
            mysql_close($connection);
        </script>
        <?php
        } else 
        {
        //echo "ERROR: Could not able to execute $output. " . mysqli_error($conn);
        
        echo "<script>location.assign('staff-index.php?post_type=setting&submitted=unsuccess');</script>";
        }
    }
?>


<!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-6 col-ml-12">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
<?php

if($_GET['post_type'] == 'setting')
{

if($_GET['submitted'] == 'none' && $_GET['post_type'] == 'setting') { ?>
    

<?php } 


if($_GET['submitted'] == 'success' && $_GET['post_type'] == 'setting') { ?>
<div class="alert-dismiss">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully updated!</strong> Your new account submission has been updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>

<?php } 

else if($_GET['submitted'] == 'unsuccess' && $_GET['post_type'] == 'setting') { ?>
<div class="alert-dismiss">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oh snap!</strong> Your account submission is unsuccessful. Please check again.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>
    
<?php } 

    } 
?>
                                        <h4 class="header-title">Account Setting</h4>
                                        <?php while($row = mysqli_fetch_assoc($output)) { ?>
                                        <form action="" method="post" >
                                            <div class="form-group">
                                                <label for="fname">Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname" required value="<?php echo $row['fullname'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label class="col-form-label">Gender</label>
                                                <select class="form-control" id="gender" name="gender" style="height: 50px">
                                                    <option value="<?php echo $row['user_gender'] ?>" selected><?php echo $row['gender'] ?></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" required value="<?php echo $row['email'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="phonenumber">Phone No.</label>
                                                <input type="number" class="form-control" id="phonenumber" name="phoneno" required value="<?php echo $row['phoneNo'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <input type="text" class="form-control" id="role" name="role" disabled value="<?php echo $row['role'] ?>">
                                            </div>

                                            <button type="submit" class="btn btn-primary mt-4 pr-5 pl-5" name="update">Update Account</button>
                                        </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-ml-12">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
<?php

if($_GET['post_type'] == 'setting')
{

if($_GET['submitted'] == 'none' && $_GET['post_type'] == 'setting') { ?>
    

<?php } 


if($_GET['submitted'] == 'success-pass' && $_GET['post_type'] == 'setting') { ?>
<div class="alert-dismiss">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully updated!</strong> Your password successfully changed.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>

<?php } 

else if($_GET['submitted'] == 'unsuccess-pass' && $_GET['post_type'] == 'setting') { ?>
<div class="alert-dismiss">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oh snap!</strong> Your password did not match. Please check again your password.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>
    
<?php } 

else if($_GET['submitted'] == 'oldpasswrong' && $_GET['post_type'] == 'setting') { ?>

<div class="alert-dismiss">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Old Password Wrong!</strong> Your old password is wrong. Please check again your password.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>
                        
<?php 
        } 
    } 
?>
                                        <h4 class="header-title">Change Password</h4>
                                        
                                        <form action="" method="post" >
                                            
<?php 

if (isset($_REQUEST['submit-pass']))
	{
	$old_pass = mysqli_real_escape_string($conn,$_POST['pwd']);
	$new_pass = mysqli_real_escape_string($conn,$_POST['npwd']);
	$re_pass = mysqli_real_escape_string($conn,$_POST['rpwd']);
	$e_password = sha1($old_pass); //encrypt the password before saving in the database
	//$e_new_password = sha1($new_pass); //encrypt the password before saving in the database
	
	$password_query = mysqli_query($conn,"SELECT * from user where username = '".$_SESSION['username']."'");
    $password_row = mysqli_fetch_array($password_query);
	$database_password = $password_row['password'];
	if ($database_password == $e_password)
		{
		if ($new_pass == $re_pass)
			{
			$hashed= sha1($new_pass); 
			$result = mysqli_query($conn,"update user set password='$hashed' where username='" . $_SESSION["username"] . "'");
			
			echo "<script>window.location='staff-index.php?post_type=setting&submitted=success-pass'</script>";
			
			}
		  else
			{
			    
			echo "<script>window.location='staff-index.php?post_type=setting&submitted=unsuccess-pass'</script>";
			}
		}
	  else
		{
	        //echo "ERROR: Could not able to execute $output. " . mysqli_error($conn);
		    //echo "<script>alert('Your old password is wrong'); window.location='changepasswordadmin.php'</script>";
			    
			echo "<script>window.location='staff-index.php?post_type=setting&submitted=oldpasswrong'</script>";
		    
		}
	}
?>
                                            
                                            <div class="form-group">
                                                <label for="current_password">Current Password</label>
                                                <input type="password" class="form-control" id="current_password" type="password" name="pwd" placeholder="Current Password">
                                            </div>

                                            <div class="form-group">
                                                <label for="new_password">New Password</label>
                                                <input type="password" class="form-control" id="new_password" name="npwd" placeholder="New Password">
                                            </div>

                                            <div class="form-group">
                                                <label for="retype_pass">Retype New Password</label>
                                                <input type="password" class="form-control" id="retype_pass" name="rpwd" placeholder="Retype Password">
                                            </div>

                                            <button type="submit" class="btn btn-primary mt-4 pr-5 pl-5" name="submit-pass">Save Password</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
                        </div>
                    </div>
                </div>
            </div>
        <!-- main content area end -->