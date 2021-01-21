<!-- page title area end -->
<?php

$sqlR = "SELECT user.*, reminder.* FROM reminder JOIN user ON reminder.staffId=user.userId WHERE reminder.reminderId = '".$_REQUEST['id']."'";
  //$result = "SELECT * from book WHERE bookId = '".$_REQUEST['id']."'";
  $outReq = mysqli_query($conn,$sqlR);




  if(isset($_REQUEST['submit']))
  {
  $sql =  "UPDATE reminder SET title = '".$_REQUEST['reminderTitle']."', 
        description = '".$_REQUEST['description']."',
        staffId = '".$_REQUEST['namestaff']."',
        time_from = '".$_REQUEST['timeFrom']."',
        time_to = '".$_REQUEST['timeTo']."',
        total_hours = '".$_REQUEST['totalHours']."'
        WHERE reminderId = '".$_REQUEST['id']."'";
        
    if(mysqli_query($conn,$sql))
    {
    ?>
    <script>
      
      location.assign("admin-index.php?post_type=reminder&submitted=success");
      
      
    </script>
    <?php
    
        mysql_close($conn);
    } else 
    {

        //echo "ERROR: Could not able to execute $output. " . mysqli_error($conn);

     ?>
        
    
    
    <div class="alert-dismiss">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oh snap!</strong> Your data submission is unsuccessful. Please check at <?php $output ?> or <?php mysqli_error($conn) ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-times"></span>
                </button>
            </div>
        </div>
    
    
    <?php
    }
  } 
  ?>
  
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-6 col-ml-12">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        
<?php

if($_GET['post_type'] == 'book-details')
{

if($_GET['submitted'] == 'none' && $_GET['post_type'] == 'book-details') { ?>
    

<?php } 


if($_GET['submitted'] == 'success' && $_GET['post_type'] == 'book-details') { ?>
<div class="alert-dismiss">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully updated!</strong> Your new data has been updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>

<?php } 

else if($_GET['submitted'] == 'unsuccess' && $_GET['post_type'] == 'book-details') { ?>
<div class="alert-dismiss">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oh snap!</strong> Your data submission is unsuccessful. Please check again.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>
    
<?php }         
    } 
?>
                                        
                                        <h4 class="header-title">Edit Reminder</h4>
                                        <p>You may change the details for this reminder.</p>
                                        <hr/>
                                        <?php while($row4 = mysqli_fetch_assoc($outReq)) { ?>
                                        <form action="" method="post">

                                            <div class="form-group">
                                                <label for="reminderTitle">Set Name</label>
                                                <input type="text" class="form-control" id="reminderTitle" name="reminderTitle" value="<?php echo $row4['title']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Job Description</label>
                                                <input type="text" class="form-control" id="totalHours" value="<?php echo $row4['description']; ?>" name="description" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="namestaff">Select Staff/Employee</label>
                                                <select class="form-control" id="namestaff" name="namestaff" style="height: 50px; text-transform: capitalize;">
                                                  <option value="<?php echo $row4['userId']; ?>"><?php echo $row4['fullname']; ?> [Assigned]</option>
                                                  <?php 
                                                    $sql2 = "SELECT * FROM user";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if (mysqli_num_rows($result2) > 0) { 
                                                    while($row2 = mysqli_fetch_assoc($result2)) {

                                                        if($row2['role'] == 'staff'){
                                                    ?>
                                                                <option value="<?php echo $row2['userId']; ?>"><?php echo $row2['userId']; ?> - <?php echo $row2['fullname']; ?></option>
                                                <?php }}} ?>
                                                </select>
                                              </div>

                                            <div class="form-group">
                                                <label for="timeFrom">Time (from)</label>
                                                <input type="time" class="form-control" id="timeFrom" value="<?php echo $row4['time_from']; ?>" name="timeFrom" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="timeTo">Time (to)</label>
                                                <input type="time" class="form-control" id="timeTo" value="<?php echo $row4['time_to']; ?>" name="timeTo" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="totalHours">Total Hours</label>
                                                <input type="number" class="form-control" id="totalHours" value="<?php echo $row4['total_hours']; ?>" name="totalHours" required>
                                            </div>

                                            <button name="submit" class="btn btn-primary mt-4 pr-5 pl-5">Confirm</button>
                                        </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
                        </div>
                    </div>
                </div>
            </div>

        <!-- main content area end -->