<?php
if(isset($_REQUEST['key']))
{
	include("connect.php");
	$key=$_REQUEST['key'];
	$res=mysqli_query($conn,"select * from college where location='$key'");
	//print_r($res);
	if(mysqli_num_rows($res)>0)
	{
?>		
	
<?php
		while($row=mysqli_fetch_assoc($res))
		{
?>
		

		<input type="checkbox" name="collegeList[]" value="<?= $row['college_name']?>" placeholder="">&nbsp;&nbsp;&nbsp;<label for="checkbox"  style="font-size:10px"></label><?= $row['college_name']?></label><br>
<?php			
		}
	}
}
?>


