<?php session_start(); ?>
<?php

include 'config.php';

$result = "DELETE FROM applyleave where applyId = '".$_REQUEST['id']."'";
	if (!mysqli_query($conn,$result))
	{
	die ('Error: ' .mysql_error());
	}
	else
	{?>
	<script>
								location.assign("staff-index.php?post_type=list-leave-applied&submitted=success-deleted");
								</script>
	<?php }
	?>