<div class="main-content-inner">
                <!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                
<?php

if($_GET['post_type'] == 'list-leave-applied')
{

if($_GET['submitted'] == 'none' && $_GET['post_type'] == 'list-leave-applied') { ?>
    

<?php } 


if($_GET['submitted'] == 'success' && $_GET['post_type'] == 'list-leave-applied') { ?>
<div class="alert-dismiss">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully!</strong> Your leave dewtails has been updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>

<?php } 

else if($_GET['submitted'] == 'unsuccess' && $_GET['post_type'] == 'list-leave-applied') { ?>
<div class="alert-dismiss">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oh snap!</strong> Your leave updates is unsuccessful. Please check again.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>
    
<?php }       

else if($_GET['submitted'] == 'success-deleted' && $_GET['post_type'] == 'list-leave-applied') { ?>
<div class="alert-dismiss">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully deleted!</strong> The data has been permanently delete.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
</div>
    
<?php }   

    } 
?>
                                
                                <h4 class="header-title">Leave Applied</h4>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No.</th>
                                                <th>Person Name</th>
                                                <th>Leave Reason</th>
                                                <th>Leave Details</th>
                                                <th>Date Request On</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 


$listLeave = "SELECT user.*, applyleave.*, leavereason.* FROM applyleave JOIN user ON applyleave.apply_userId=user.userId JOIN leavereason ON applyleave.apply_leaveRequestId=leavereason.leaveId";
//$listLeave = "SELECT user.*, applyleave.*, leavereason.* FROM user JOIN applyleave ON user.userId=applyleave.apply_userId JOIN leavereason ON user.userId=leavereason.leaveId WHERE user.userId = '$userId'";
//$listLeave = "SELECT * FROM applyleave ORDER BY createdOn DESC";
$resultPage = mysqli_query($conn,$listLeave);

$i = 1;

if (mysqli_num_rows($resultPage) > 0) { 
while($rowPage = mysqli_fetch_assoc($resultPage)) {

    $date1 = date('j/m/Y', strtotime($rowPage['date_from']));
    $date2 = date('j/m/Y', strtotime($rowPage['date_to']));
    $date3 = date('j/m/Y', strtotime($rowPage['createdOn']));

?>
                                            <tr>
                                                <td> <?php echo $i++ ?></td>
                                                <td><span style="text-transform: capitalize; font-weight: bold"><?php echo $rowPage['role'] ?></span> - <?php echo $rowPage['fullname']; ?> </td>
                                            	<td><?php echo $rowPage['leaveName']; ?> </td>
                                            	<td class="text-left">From: <b><?php echo $date1; ?></b><br/>To: <b><?php echo $date2; ?></b><br>Total Days: <b><?php echo $rowPage['total_days']; ?></b></td>
                                                <td><?php echo $date3; ?></td>
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
                    <!-- Dark table end -->
                </div>
                
<script>
function delete_data(id)
	{
	 if(confirm('Sure To Delete This Record?'))
	 {
	  window.location.href='admin-fileDelete.php?id='+id;
	 }
	}
</script>