<?php
if(isset($_REQUEST['key']));
{
	include("connect.php");
	$id=$_REQUEST['key'];
	$delete=mysqli_query($conn,"delete from college where collegeid=$id");
	if(mysqli_affected_rows($conn)==1)
	{
		setcookie("success","Records Deleted Successfully",time()+2);
		header("Location:college_data.php");
	}
}

?>