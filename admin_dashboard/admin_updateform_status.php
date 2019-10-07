<?php
session_start();
if(isset($_REQUEST['key']))
{
	include("../connect.php");
	//include("admin_header.php");
	$id=$_REQUEST['key'];
	//echo $id;
	$res=mysqli_query($conn,"update student_personal_data set form_status='1' where studentid='$id' ");
	
	header("Location:register_students.php");
}
?>