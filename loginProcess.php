<?php  
 session_start();
 include 'config.php';

 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["pwd"]))  
      {  
           echo '<script>alert("Both Fields are required")
		   window.history.back();
		   </script>';
		    
      }  
      else  
      {  
           $username = mysqli_real_escape_string($conn, $_POST["username"]);  
           $password = mysqli_real_escape_string($conn, $_POST["pwd"]);  
           $query = "SELECT * FROM user WHERE username = '$username'";  
           $result = mysqli_query($conn, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(sha1($password) == $row["password"])  
                     {  
                         $role = $row['role'];
                         $_SESSION['username'] = $row['username'];
                          //return true;  
                          	if($role == "admin")
							{
								?>		
							<script>
							  // or
							location.assign("admin-index.php?post_type=dashboard"); 
							  // or any type of script you want to run
					
							</script>
				
				<?php	
						    } else
							{
							?>		
						<script>
						  // or
						location.assign("staff-index.php?post_type=dashboard"); 
						  // or any type of script you want to run
				
						</script>
			
				<?php	
					        }
                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("Wrong User Details")
						  window.history.back();
						  </script>'; 
						  
                     }  
                }  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")
				window.history.back();
				</script>';  
				
           }  
      }  
 }  
 ?>  
