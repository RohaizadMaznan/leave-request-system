
<div class="main-content-inner">
                <!-- Dark table start -->
                    <div class="col-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                
<?php

if($_GET['post_type'] == 'list-book')
{

if($_GET['submitted'] == 'none' && $_GET['post_type'] == 'list-book') { ?>
    

<?php } 


if($_GET['submitted'] == 'success' && $_GET['post_type'] == 'list-book') { ?>
<div class="alert-dismiss">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully updated!</strong> Your book has been updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>

<?php } 

else if($_GET['submitted'] == 'unsuccess' && $_GET['post_type'] == 'list-book') { ?>
<div class="alert-dismiss">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oh snap!</strong> Your book update submission is unsuccessful. Please check again.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>
    
<?php }         
    } 
?>
                                
                                <h4 class="header-title">Leave Request Application Form</h4>
                                <form action="inc/submitData.php" method="post">

<?php 

//$formSQL = "SELECT user.*, applyleave.*, leavereason.* FROM applyleave JOIN user ON applyleave.apply_userId=user.apply_userId JOIN leavereason ON applyleave.apply_leaveRequestId=leavereason.leaveId WHERE user.username = '".$_SESSION['username']."'";
$sqlApply = "SELECT * from user WHERE  username = '".$_SESSION['username']."'";
$formApply = mysqli_query($conn,$sqlApply);

while($rowApply = mysqli_fetch_assoc($formApply)) {

?>
                                            <div class="form-group">
                                                <div class="form-group ">
                                                    <label for="fullname">Employee Full Name</label>
                                                    <input type="text" class="form-control" id="fullname" value="<?php echo $rowApply['fullname']; ?>" name="fullname" style="text-transform: capitalize;" readonly>
                                                </div>

                                                <label for="reasonLeave">Reason for leave</label>
                                                <select class="form-control" id="reasonLeave" name="reasonLeave" style="height: 50px">
                                                  <option>--- Select Reason ---</option>
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
                                                <input type="date" class="form-control" id="dateFrom" name="dateFrom" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="dateTo">Date Requested (to)</label>
                                                <input type="date" class="form-control" id="dateTo" name="dateTo" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="totalDays">Total Days</label>
                                                <input type="text" class="form-control" id="totalDays" name="totalDays" required>
                                            </div>

                                            <input type="hidden" name="userId" value="<?php echo $rowApply['userId']; ?>">
                                            <input type="hidden" name="status" value="In Progress">

                                            <button name="btnAdminSaveApply" class="btn btn-primary mt-4 pr-5 pl-5">Submit</button>
<?php
 }
?>
                                        </form>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->
                </div>
                
<script>
function delete_data(id)
	{
	 if(confirm('Sure To Delete This Record ?'))
	 {
	  window.location.href='patient_delete.php?id='+id;
	 }
	}
</script>
