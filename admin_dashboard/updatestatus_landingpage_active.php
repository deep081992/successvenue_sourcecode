<?php
session_start();
if(isset($_REQUEST['key']))
{
	$key=$_REQUEST['key'];
	include("../connect.php");
	$res=mysqli_query($conn,"update landing_page set status='active' where landing_pageid ='$key'");
	if(mysqli_affected_rows($conn)==1)
	{
		header("location:viewevent.php");
	}
	else
	{
		echo"<p class='alert alert-warning'>Unable to update status</p>";
	}
}
else
{
	echo"<p class='alert alert-warning'>Error</p>";
}
?>