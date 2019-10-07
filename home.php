<?php
session_start();
if(isset($_SESSION['logintrue']) AND ($_SESSION['loginid']))
{
	$token=$_SESSION['logintrue'];
	$studentid=$_SESSION['loginid'];
	include("connect.php");
	$res1=mysqli_query($conn,"select * from student_personal_data where 
	studentid='$studentid'");
	$row=mysqli_fetch_assoc($res1);
	//print_r($row);
	include("header.php");
?>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-primary text-light text-font">
						
						<h1>Welcome <?php echo strtoupper($row['firstname']);?>!  </h1>
					</div>
					<div class="card-body">
						<table class="table">
							<tr>
							<td class="text-font ">Username</td>
							<td> <?php echo $row['firstname'];?></td>
							</tr>


									<tr>
							<td class="text-font ">Email</td>
							<td> <?php echo $row['semail'];?></td>
							</tr>

							<tr>
							<td class="text-font ">Mobile</td>
							<td> <?php echo $row['mobile'];?></td>
							</tr>

							<tr>
							<td class="text-font ">City</td>
							<td> <?php echo $row['city'];?></td>
							</tr>

							<tr>
							<td class="text-font ">State</td>
							<td> <?php echo $row['state'];?></td>
							</tr>

							<tr>
							<td>Date of Reg</td>
							<td><?php echo $row['sdate_of_reg'];?></td>
							</tr>
						</table>
					</div>
					<div class="card-footer">
						
					</div>
				</div>
			</div>
		</div>
	</div>
<?php	
}
else
{
	echo "invalid user";
	//header("Location:login.php");
}
?>