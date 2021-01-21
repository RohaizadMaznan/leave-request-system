<?php session_start(); ?>
<?php

include 'config.php';

$result = "UPDATE reminder SET status='deactive' WHERE reminderId='".$_REQUEST['id']."'";
	if (!mysqli_query($conn,$result))
	{
	die ('Error: ' .mysql_error());
	}
	else
	{?>
	<script>
								location.assign("admin-index.php?post_type=reminder&submitted=success-deactive");
								</script>
	<?php }
	?>