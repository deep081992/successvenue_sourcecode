<?php
if(isset($_REQUEST['key']))
{
	include("connect.php");
	$email=$_REQUEST['key'];
	$res=mysqli_query($conn,"select * from student_personal_data where
	 semail='$email'");
	if(mysqli_num_rows($res)==1)
	{
		echo "This email is already exist,try another!";
	}

}

?>