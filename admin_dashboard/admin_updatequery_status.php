<?php
session_start();
if(isset($_REQUEST['key']))
{
	include("../connect.php");
	//include("admin_header.php");
	$id=$_REQUEST['key'];
	
	$res=mysqli_query($conn,"update visitor_query set followup_status='1' where visitor_id='$id' ");
	
	header("Location:student_queries.php");
}
?>