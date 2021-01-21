<?php

if($_GET['post_type'] == 'reminder')
{

if($_GET['submitted'] == 'none' && $_GET['post_type'] == 'reminder') { ?>
    

<?php } 


if($_GET['submitted'] == 'success' && $_GET['post_type'] == 'reminder') { ?>
<div class="alert-dismiss">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully updated!</strong> Your reminder has been updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>

<?php } 

else if($_GET['submitted'] == 'unsuccess' && $_GET['post_type'] == 'reminder') { ?>
<div class="alert-dismiss">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oh snap!</strong> Your reminder update submission is unsuccessful. Please check again.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>
    
<?php }   

else if($_GET['submitted'] == 'success-add' && $_GET['post_type'] == 'reminder') { ?>
<div class="alert-dismiss">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully add a new reminder!</strong> Your reminder has been saved in the database.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>
    
<?php }       
    } 
?>
<div class="main-content-inner">
                <!-- Dark table start -->
                <div class="row">
                    <div class="col-5 mt-5">
                        <div class="card">
                            <div class="card-body">
                                                               
                                <h4 class="header-title">Set a New Reminder</h4>
                                <form action="inc/submitData.php" method="post">

<?php 

//$formSQL = "SELECT user.*, applyleave.*, leavereason.* FROM applyleave JOIN user ON applyleave.apply_userId=user.apply_userId JOIN leavereason ON applyleave.apply_leaveRequestId=leavereason.leaveId WHERE user.username = '".$_SESSION['username']."'";
$sqlApply = "SELECT * from user WHERE  username = '".$_SESSION['username']."'";
$formApply = mysqli_query($conn,$sqlApply);

while($rowApply = mysqli_fetch_assoc($formApply)) {

?>
                                            <div class="form-group">

                                            <div class="form-group">
                                                <label for="reminderTitle">Set Name</label>
                                                <input type="text" class="form-control" id="reminderTitle" name="reminderTitle" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Job Description</label>
                                                <input type="text" class="form-control" id="totalHours" name="description" required>
                                            </div>

                                                <label for="namestaff">Select Staff/Employee</label>
                                                <select class="form-control" id="namestaff" name="namestaff" style="height: 50px; text-transform: capitalize;">
                                                  <option>--- Select Employee/Staff ---</option>
                                                  <?php 
                                                    $sql2 = "SELECT * FROM user";
                                                    $result2 = mysqli_query($conn, $sql2);

                                                    if (mysqli_num_rows($result2) > 0) { 
                                                    while($row2 = mysqli_fetch_assoc($result2)) {

                                                        if($row2['role'] == 'staff'){
                                                    ?>
                                                                <option value="<?php echo $row2['userId']; ?>"><?php echo $row2['role']; ?> - <?php echo $row2['fullname']; ?></option>
                                                <?php }}} ?>
                                                </select>
                                              </div>

                                            <div class="form-group">
                                                <label for="timeFrom">Time (from)</label>
                                                <input type="time" class="form-control" id="timeFrom" name="timeFrom" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="timeTo">Time (to)</label>
                                                <input type="time" class="form-control" id="timeTo" name="timeTo" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="totalHours">Total Hours</label>
                                                <input type="text" class="form-control" id="totalHours" name="totalHours" required>
                                            </div>

                                            <input type="hidden" name="userId" value="<?php echo $rowApply['userId']; ?>">
                                            <input type="hidden" name="status" value="active">

                                            <button name="btnSetReminder" class="btn btn-primary mt-4 pr-5 pl-5">Confirm</button>
<?php
 }
?>
                                        </form>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->

                    <div class="col-7 mt-5">
                        <div class="card">
                            <div class="card-body">                              
                                <h4 class="header-title">Current Reminder (Active)</h4>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-left">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No.</th>
                                                <th>Assigned Staff</th>
                                                <th>Set Name</th>
                                                <th>Reminder Details</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 


$listLeave = "SELECT user.*, reminder.* FROM reminder JOIN user ON reminder.staffId=user.userId WHERE reminder.status='active'";
//$listLeave = "SELECT user.*, applyleave.*, leavereason.* FROM user JOIN applyleave ON user.userId=applyleave.apply_userId JOIN leavereason ON user.userId=leavereason.leaveId WHERE user.userId = '$userId'";
//$listLeave = "SELECT * FROM applyleave ORDER BY createdOn DESC";
$resultPage = mysqli_query($conn,$listLeave);

$i = 1;

if (mysqli_num_rows($resultPage) > 0) { 
while($rowPage = mysqli_fetch_assoc($resultPage)) {


?>
                                            <tr>
                                                <td style="text-align: center;"> <?php echo $i++ ?></td>
                                                <td><span style="text-transform: capitalize; font-weight: bold"><?php echo $rowPage['fullname']; ?> </td>
                                                <td><?php echo $rowPage['title']; ?> </td>
                                                <td>From: <b><?php echo $rowPage['time_from']; ?></b><br/>To: <b><?php echo $rowPage['time_to']; ?></b><br>Total Hours: <b><?php echo $rowPage['total_hours']; ?></b></td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3"><a href="admin-index.php?post_type=edit-reminder&submitted=none&id=<?php echo $rowPage['reminderId']; ?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                        <li><a href="javascript:deactive(<?php echo $rowPage['reminderId']; ?>)" class="text-danger"><i class="ti-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
<?php
} } ?>
                                        </tbody>
                                    </table>

<hr/>
                                    <h4 class="header-title">Reminder (Deactive)</h4>
                                <div class="data-tables datatable-light">
                                    <table id="dataTable2">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No.</th>
                                                <th>Assigned Staff</th>
                                                <th>Set Name</th>
                                                <th>Reminder Details</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 


$listLeave = "SELECT user.*, reminder.* FROM reminder JOIN user ON reminder.staffId=user.userId WHERE reminder.status='deactive'";
//$listLeave = "SELECT user.*, applyleave.*, leavereason.* FROM user JOIN applyleave ON user.userId=applyleave.apply_userId JOIN leavereason ON user.userId=leavereason.leaveId WHERE user.userId = '$userId'";
//$listLeave = "SELECT * FROM applyleave ORDER BY createdOn DESC";
$resultPage = mysqli_query($conn,$listLeave);

$i = 1;

if (mysqli_num_rows($resultPage) > 0) { 
while($rowPage = mysqli_fetch_assoc($resultPage)) {


?>
                                            <tr>
                                                <td style="text-align: center;"> <?php echo $i++ ?></td>
                                                <td><span style="text-transform: capitalize; font-weight: bold"><?php echo $rowPage['fullname']; ?> </td>
                                                <td><?php echo $rowPage['title']; ?> </td>
                                                <td>From: <b><?php echo $rowPage['time_from']; ?></b><br/>To: <b><?php echo $rowPage['time_to']; ?></b><br>Total Hours: <b><?php echo $rowPage['total_hours']; ?></b></td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li><a href="javascript:active(<?php echo $rowPage['reminderId']; ?>)" class="text-success"><i class="ti-check"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
<?php
} } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    </div> <!-- end row -->
                       
                    </div>
                </div>
                
<script>
function deactive(id)
	{
	 if(confirm('Deactive this reminder?'))
	 {
	  window.location.href='deactive-reminder.php?id='+id;
	 }
	}
</script>

<script>
function active(id)
    {
     if(confirm('Activate this reminder?'))
     {
      window.location.href='active-reminder.php?id='+id;
     }
    }
</script>
