<?php 
include("header.php");
	include("connect.php");
?>
<div class="container mt-5">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header bg-primary">
					<h1 class="text-light text-font">Forgot Password</h1>
				</div>
				<div class="card-body">
					<?php
					if(isset($_COOKIE['success']))
					{
						echo "<p class='alert alert-success'>".$_COOKIE['success']."</p>";
					}
						if(isset($_POST['submit']))
						{
							$email=(isset($_POST['email']))?$_POST['email']:"";

							$res=mysqli_query($conn,"select * from student_personal_data where semail='$email'");
							if(mysqli_num_rows($res)==1)
							{
								$row=mysqli_fetch_assoc($res);
								$to=$email;
								$subject="Reset Password Request-successVenue";
								$message="Hi ".$row['sname'].",<br><br> Your reset password request has been received.Please click the below link to reset your password.<br><br><a target='_blank' href='http://localhost/sv/reset_password.php?key=".$row['token']."'>Reset Password</a><br><br>Thanks<br>Team";
								$headers="";
								$headers.="content-type:text/html"."\r\n";
								$headers.="From:info@company.com"."\r\n";

								echo $message;
								if(mail($to,$subject,$message,$headers))
								{
									setcookie('success','Reset password link has been sent to your email. please check',time()+2);
								//header("location:forgotpassword.php");
								}
								else
								{
									echo "<P>Sorry! Unable to sent email. please contact Admin</p>";
								}
							}
							else
							{

							}
						}
						
					?>
					<form method="post" action="" onsubmit="return validateEmail()">
						<table class="table">
							<tr>
								<td>
									<input type="text" name="email" id="email" placeholder="Enter email" class="form-control" 
									>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-block btn-primary">
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			
		</div>
	</div>
	
</div>
<script>
	function validateEmail()
	{
		if(document.getElementById('email').value=="")
		{
			alert('Enter email');
			return false;
		}
	}
</script>
<?php 
include("footer.php");
?>