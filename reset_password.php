<?php
session_start();
if(isset($_REQUEST['key']))
{
	$token=$_REQUEST['key'];
	include("connect.php");
	$res=mysqli_query($conn,"select * from student_personal_data where 
		token='$token'");
	include("header.php");
	$row=mysqli_fetch_assoc($res);
?>

	<div class="container mt-5">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header bg-primary text-white text-font">
						<h2>Reset Password here!</h2>
					</div>
					<div class="card-body">
						<?php 
							if(isset($_COOKIE['success']))
							{
								echo "<p class='alert alert-success'>".$_COOKIE['success']."</p>";
							}
							if(isset($_COOKIE['error']))
							{
								echo "<p class='alert alert-danger'>".$_COOKIE['error']."</p>";
							}
							
							
							if(isset($_POST['reset']))
							{
								$newp=(isset($_POST['newp']))?$_POST['newp']:"";
								$cpass=(isset($_POST['confirmp']))?$_POST['confirmp']:"";
								if(!empty($newp))
								{
									if($newp==$cpass)
									{
										$pass=password_hash($newp, PASSWORD_DEFAULT);
										mysqli_query($conn,"update student_personal_data set spassword='$pass' where token='$token'");
										
										if(mysqli_affected_rows($conn)==1)
										{
											setcookie('success','Password updated successfully!',time()+2);
											
											header("location:reset_password.php?key=$token");
										}
										else
										{
											setcookie('error','Password does not updates! Please try again!',time()+2);

											
											header("location:reset_password.php?key=$token");
										}
									}
									else
									{
										echo "<p class='alert alert-danger'>Confirm password does not match with New password</p>";
									}
								}
								else
								{
									echo "<p class='alert alert-danger'>Enter new password</p>";
								}
							}
							
						?>
						<form method="post" action="">
							<div class="form-group">
								<input type="password" name="newp" id="newp" placeholder="Enter New Password" class="form-control">
							</div>

							<div class="form-group">
								<input type="password" name="confirmp" id="confirmp" placeholder="Confirm Password" class="form-control">
							</div>

							<div class="form-group">
								<input type="submit" name="reset" id="reset" value="Reset Password"class="form-control btn-block btn-primary">
							</div>
						</form>
					</div>
					<div class="card-footer bg-primary">
						
					</div>
				</div>
			</div>
			<div class="col-md-4">
				
			</div>
		</div>
	</div>
<?php
}


else
{
	exit("You don't have permission to access this page");
}
?>
