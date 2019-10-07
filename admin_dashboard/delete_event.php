<?php
if(isset($_REQUEST['key']));
{
	include("../connect.php");
	$id=$_REQUEST['key'];
	$delete=mysqli_query($conn,"delete from  landing_page where landing_pageid=$id");
	if(mysqli_affected_rows($conn)==1)
	{
		setcookie("success","Event Record Deleted Successfully",time()+2);
		header("Location:viewevent.php");
	}
}

?>