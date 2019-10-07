<?php
if(isset($_REQUEST['key']))
{
	include("connect.php");
	$key=$_REQUEST['key'];
	$res=mysqli_query($conn,"select * from list_state_and_city where state='$key' ORDER BY `list_state_and_city`.`city` ASC");
	print_r($res);
	if(mysqli_num_rows($res)>0)
	{
		?>

			<option value="">Select City</option>
	<?php
		while($row=mysqli_fetch_assoc($res))
		{
	?>
		<option value="<?php echo $row['city'];?>">
			<?php echo $row['city'];?>
		</option>

		
	<?php
		}
	}
}
		?>