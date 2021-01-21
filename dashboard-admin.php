<div class="main-content-inner">
    
    <div class="row">    
                <div class="col-8 col-lg-8 mt-5 col-md-12 col-sm-12 col-xs-12">
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
                                                    <a href="admin-index.php?post_type=apply-leave&submitted=none" class="btn btn-primary btn-lg mb-3 mt-3 pl-5 pr-5 pt-3 pb-3" >View List Leave</a><br/>
                                                    <h6 class="mb-3">
                                                        <small class="text-muted">or,&nbsp; <a href="admin-index.php?post_type=setting&submitted=none">change your account details</a></small>
                                                    </h6>
                                                    </p>
                                                </div>
                                                <div class="col-6 col-lg-6 col-md-12 col-sm-12 col-xs-12"
                                                    <p class="mb-0" style="font-size: 15px;"><b>More Actions</b></p>
                                                    <p>
                                                    <h6 class="mb-3 mt-1 pl-2">
                                                        <small class="text-muted"><i class="ti-plus" style="font-weight: 500; font-size: 10px"></i> <a href="signUp.php" target="_blank">&nbsp; Make new account</a></small><br/>
                                                        <small class="text-muted"><i class="ti-plus" style="font-weight: 500; font-size: 10px"></i> <a href="admin-index.php?post_type=reminder&submitted=none" target="_blank">&nbsp; Set new reminder</a></small>
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
                                <h4 class="header-title">All Leave Request Records</h4>
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

$listLeave = "SELECT user.*, applyleave.*, leavereason.* FROM applyleave JOIN user ON applyleave.apply_userId=user.userId JOIN leavereason ON applyleave.apply_leaveRequestId=leavereason.leaveId";
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
                                                        <li class="mr-3"><a href="admin-index.php?post_type=apply-details&submitted=none&id=<?php echo $rowPage['applyId']; ?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
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