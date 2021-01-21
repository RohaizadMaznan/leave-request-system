<div class="main-content-inner">
    
    <div class="row">    
                <div class="col-8 col-lg-8 mt-5 col-md-12 col-sm-12 col-xs-12">


<?php 


$listLeave = "SELECT user.*, reminder.* FROM reminder JOIN user ON reminder.staffId=user.userId WHERE user.userId='$userId' AND reminder.status='active' ORDER BY reminder_createdOn ASC LIMIT 1";
//$listLeave = "SELECT user.*, applyleave.*, leavereason.* FROM user JOIN applyleave ON user.userId=applyleave.apply_userId JOIN leavereason ON user.userId=leavereason.leaveId WHERE user.userId = '$userId'";
//$listLeave = "SELECT * FROM applyleave ORDER BY createdOn DESC";
$resultPage = mysqli_query($conn,$listLeave);

while($row4 = mysqli_fetch_assoc($resultPage)) {



?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <h4><strong>Your Reminder</strong></h4>
                      <hr/>
                      <p><b>Task Title</b>: <?php echo $row4['title']; ?></p>
                      <p><b>Task Description</b>: <?php echo $row4['description']; ?></p>
                      <p><b>Time</b>: <?php echo $row4['time_from']; ?> - <?php echo $row4['time_to']; ?></p>
                      <p><b>Total Hour(s)</b>: <?php echo $row4['total_hours']; ?></p>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

<?php
 } ?>


                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Introducing Attendant System</h4>
                                    <div class="additional-content">
                                        <div class="alert alert-primary" role="alert">
                                            <h4 class="alert-heading">Welcome to Attendant System!</h4>
                                            <p>We’ve assembled some links to get you started:</p>
                                            <hr>
                                            <div class="row">
                                                <div class="col-5 col-lg-5 col-md-12 col-sm-12 col-xs-12"
                                                    <p class="mb-0"><b>Get Started</b></p>
                                                    <p>
                                                    <a href="staff-index.php?post_type=apply-leave&submitted=none" class="btn btn-primary btn-lg mb-3 mt-3 pl-5 pr-5 pt-3 pb-3" >Apply Leave?</a><br/>
                                                    <h6 class="mb-3">
                                                        <small class="text-muted">or,&nbsp; <a href="staff-index.php?post_type=setting&submitted=none">change your account details</a></small>
                                                    </h6>
                                                    </p>
                                                </div>
                                                <div class="col-6 col-lg-6 col-md-12 col-sm-12 col-xs-12"
                                                    <p class="mb-0" style="font-size: 15px;"><b>More Actions</b></p>
                                                    <p>
                                                    <h6 class="mb-3 mt-1 pl-2">
                                                        <small class="text-muted"><i class="ti-plus" style="font-weight: 500"></i> <a href="staff-index.php?post_type=list-leave-applied&submitted=none" target="_blank">&nbsp; View Requested Leave</a></small>
                                                    </h6>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                <div class="col-4 mt-5 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Profile</h4>
                                <div class="row text-center">
                                    <div class="col-4 col-md-12">
                                        <img src="image/dashboard.png" alt="avatar" style="height:150px !important">
                                    </div>
                                    <div class="col-6 col-md-12">
                                                <!--<h4 class="header-title">Flush</h4>-->
                                                <ul class="list-group list-group-flush">
<?php 

$result = "SELECT * from user WHERE  username = '".$_SESSION['username']."'";
$output = mysqli_query($conn,$result);


while($row = mysqli_fetch_assoc($output)) { ?>
                                                    <li class="list-group-item">Name : <b class="text-uppercase"><?php echo $row['fullname'] ?></b></li>
                                                    <li class="list-group-item">Gender : <b class="text-uppercase"><?php echo $row['gender'] ?></b></li>
                                                    <li class="list-group-item">Email : <b class="text-uppercase"><?php echo $row['email'] ?></b></li>
                                                    <li class="list-group-item">Phone No. : <b class="text-uppercase"><?php echo $row['phoneNo'] ?></b></li>
                                                    <li class="list-group-item">Role : <b class="text-uppercase"><?php echo $row['role'] ?></b></li>
<?php } ?>
                                                </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
    </div>
    <div class="row">
                <!-- Dark table start -->
                    <div class="col-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Leave Record</h4>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center" style="text-transform: capitalize !important;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Leave Reason</th>
                                                <th>Date From</th>
                                                <th>Date To</th>
                                                <th>Total Days Requested</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 

$listLeave = "SELECT user.*, applyleave.*, leavereason.* FROM applyleave JOIN user ON applyleave.apply_userId=user.userId JOIN leavereason ON applyleave.apply_leaveRequestId=leavereason.leaveId WHERE user.userId = '$userId'";
$resultPage = mysqli_query($conn,$listLeave);

$i = 1;

if (mysqli_num_rows($resultPage) > 0) { 
while($rowPage = mysqli_fetch_assoc($resultPage)) {

    $date1 = date('j/m/Y', strtotime($rowPage['date_from']));
    $date2 = date('j/m/Y', strtotime($rowPage['date_to']));


?>
                                            <tr>
                                                <td> <?php echo $i++ ?></td>
                                            	<td><?php echo $rowPage['leaveName']; ?> </td>
                                                <td><?php echo $date1; ?></td>
                                                <td><?php echo $date2; ?> </td>
                                                <td><?php echo $rowPage['total_days']; ?> </td>
                                                <td><?php echo $rowPage['apply_status']; ?> </td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3"><a href="staff-index.php?post_type=apply-details&submitted=none&id=<?php echo $rowPage['applyId']; ?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                        <li><a href="javascript:delete_data(<?php echo $rowPage['applyId']; ?>)" class="text-danger"><i class="ti-trash"></i></a></li>
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
                    
                    
    </div>
                    <!-- Dark table end -->
</div>

<script>
function delete_data(id)
    {
     if(confirm('Sure To Delete This Record?'))
     {
      window.location.href='file_delete.php?id='+id;
     }
    }
</script>