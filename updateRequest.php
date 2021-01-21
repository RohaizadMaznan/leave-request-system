<!-- page title area end -->
<?php

$sqlR = "SELECT user.*, applyleave.*, leavereason.* FROM applyleave JOIN user ON applyleave.apply_userId=user.userId JOIN leavereason ON applyleave.apply_leaveRequestId=leavereason.leaveId WHERE applyleave.applyId = '".$_REQUEST['id']."'";
  //$result = "SELECT * from book WHERE bookId = '".$_REQUEST['id']."'";
  $outReq = mysqli_query($conn,$sqlR);




  if(isset($_REQUEST['submit']))
  {
  $sql =  "UPDATE applyleave SET  apply_leaveRequestId = '".$_REQUEST['reasonLeave']."', 
        date_from = '".$_REQUEST['dateFrom']."',
        date_to = '".$_REQUEST['dateTo']."',
        total_days = '".$_REQUEST['totalDays']."'
        WHERE applyId = '".$_REQUEST['id']."'";
        
    if(mysqli_query($conn,$sql))
    {
    ?>
    <script>
      
      location.assign("staff-index.php?post_type=list-leave-applied&submitted=success");
      
      
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
                                        
                                        <h4 class="header-title">Update Leave Request</h4>
                                        <?php while($row4 = mysqli_fetch_assoc($outReq)) { ?>
                                        <form action="" method="post">
                                            <div class="form-group">
                                            <label for="reasonLeave">Reason for leave</label>
                                                <select class="form-control" id="reasonLeave" name="reasonLeave" value="<?php echo $row4['leaveId']?>" style="height: 50px">
                                                  <option><?php echo $row4['leaveId']?> - <?php echo $row4['leaveName']?> [Chosen]</option>
                                                  <?php 
                                                    $sql2 = "SELECT * FROM leavereason";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if (mysqli_num_rows($result2) > 0) { 
                                                    while($row2 = mysqli_fetch_assoc($result2)) {
                                                    ?>
                                                                <option value="<?php echo $row2['leaveId']; ?>"><?php echo $row2['leaveId']; ?> - <?php echo $row2['leaveName']; ?></option>
                                                <?php }} ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="dateFrom">Date Requested (from)</label>
                                                <input type="date" class="form-control" id="dateFrom" value="<?php echo $row4['date_from']; ?>" name="dateFrom" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="dateTo">Date Requested (to)</label>
                                                <input type="date" class="form-control" id="dateTo" value="<?php echo $row4['date_to']; ?>" name="dateTo" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="totalDays">Total Days</label>
                                                <input type="text" class="form-control" id="totalDays" value="<?php echo $row4['total_days']; ?>" name="totalDays" required>
                                            </div>

                                            <button name="submit" class="btn btn-primary mt-4 pr-5 pl-5">Update</button>
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