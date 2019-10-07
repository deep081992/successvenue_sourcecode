<?php
session_start();
if(isset($_SESSION['logintrue']))
{
	$token=$_SESSION['logintrue'];
	include("connect.php");
	$res=mysqli_query($conn,"select * from student_personal_data 
	where token='$token'");
	$row1=mysqli_fetch_assoc($res);
	include("header.php");
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo ucfirst( $row1['firstname'])?> Edit Your Profile</h1>
				<?php
				if(isset($_POST['update']))
				{
					$name=(isset($_POST['ename']))?$_POST['ename']:"";
					$mobile=(isset($_POST['emobile']))?$_POST['emobile']:"";
					$state=(isset($_POST['state']))?$_POST['state']:"";

					$update=mysqli_query($conn,"update  student_personal_data set firstname='$name', mobile='$mobile',	state='$state' where token='$token'");
					$row=mysqli_fetch_assoc($conn);
					print_r($row);
				}
				else
				{
					echo "no";
				}
				?>
				<form method="post" action="">
					<table class="table">
						<tr>
							<td>
								<label class="form-control">Username</label>
							</td>
							<td>
								<input type="text" name="ename" id="ename" class="form-control" value="<?php echo ucfirst($row1['firstname'])?>">
							</td>
						</tr>

						<tr>
							<td>
								<label class="form-control">Mobile</label>
							</td>
							<td>
								<input type="text" name="emobile" id="emobile" class="form-control" value="<?php echo ucfirst($row1['mobile'])?>">
							</td>
						</tr>

						<tr>
							<td>
								<label class="form-control">State</label>
							</td>
							<td>
								<select name="state" class="form-control" id="state" name="state">
						<option value="<?php echo $row1['state']?>"><?php echo $row1['state']?></option>
						<?php 
							$state=mysqli_query($conn,"select distinct state from list_state_and_city");
							while($display_state=mysqli_fetch_assoc($state))
							{
								?>

								<option value="<?php echo $display_state['state']?>">
									<?php echo $display_state['state']?>
								</option>

								<?php
							}
						?>
					</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="update" value="Save Changes" class="btn btn-primary font-weight-bold">
							</td>
						</tr>

						
					</table>
				</form>
			</div>
		</div>
	</div>
<?php	
}
else
{
	echo "inalid user";
}
?>