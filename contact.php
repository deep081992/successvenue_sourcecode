<?php
session_start();
include("header.php");
?>
<section>
	<div class="container-fluid mt-3">
		<div class="row bg-dark ">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<h4 class="text-white p-3">Get in Touch</h4>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				
			</div>
		</div>
		<div class="row mt-3 p-4">
			<div class="col-xs-6 col-sm-6 col-md-6">
			<table>
					<tr>
						<td class="p-4">
							<a class="text-light"><img src="img/social media icons/email.jpg" width="50" height="50">&nbsp;&nbsp;</a>
						</td>
						<td>
							<h4>Contact Information</h4>
							
							<p>For general and support queries please use the contact form, or send an email to <span class="text-success">info@successvenue.co.in
admin@successvenue.co.in</span>, and one of our team will be happy to help.</p>
						</td>
					</tr>
					<tr>
						<td class="p-4">
							<a class="text-light"><img src="img/social media icons/worldwide-location.png" width="50" height="50">&nbsp;&nbsp;</a>
						</td>
						<td>
							<h4>Location</h4>
							Panchwati Plaza, Shop No.114 / C, First Floor, Kutchery Rd, Ranchi, Jharkhand 834001
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3662.36571628682!2d85.3225381149743!3d23.374983484775715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f4e1acd8d4a0a3%3A0xac66fb2121c1e255!2sSuccess%20Venue%20-%20Best%20Engineering%2C%20MBA%2FPGDM%2C%20Medical%20Graduation%20%26%20Other%20Consultancy%20in%20Ranchi!5e0!3m2!1sen!2sin!4v1567744570630!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
						</td>
					</tr>
				</table>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">
			<table>
				<tr>
					<td>
						<a class="text-light"><img src="img/social media icons/chat1.png" width="50" height="50">&nbsp;&nbsp;</a>
					</td>
					<td>
						<h4>Contact Form</h4>
						Please Fill out the quick form and we will be in touch you..
						Thanks!
					</td>
				</tr>
			</table>
			<div class="row p-5 bg-gainsboro mt-3">
				<div class="col-xs-12 col-sm-12 col-md-12 p-3 ">
					<?php
					if(isset($_POST['submit']))
					{
						$name=(isset($_POST['name']))?($_POST['name']):"";
						$email=(isset($_POST['email']))?($_POST['email']):"";
						$mobile=(isset($_POST['mobile']))?($_POST['mobile']):"";
						$message=(isset($_POST['message']))?($_POST['message']):"";
						date_default_timezone_set("Asia/Calcutta");
						$date=date("Y-m-d h:i:s");
						$token=md5(str_shuffle($name.$email.$mobile.$message.$date));


					$res=mysqli_query($conn,"insert into contact(name,email,mobile,message,date,token) values('$name','$email','$mobile','$message','$date','$token')");
					if(mysqli_affected_rows($conn)==1)
					{
						echo "<p class='alert alert-success'>Your Query Submitted Successfully Will get back to you soon Thankyou!.</p>";
					}
					else
					{
						echo "<p class='alert alert-danger'>Unable to submit your Query Please try again!Thankyou</p>";
					}
					}
					
					?>
						
						<form method="post" action="">
						<div class="form-group">
							<input type="text" name="name" id="name"
							placeholder="Name:" class="form-control">
						</div>
						<div class="form-group">
							<input type="text" name="email" id="email"
							placeholder="Email:" class="form-control">
						</div>
						<div class="form-group">
							<input type="text" name="mobile" id="mobile"
							placeholder="Contact Number:" class="form-control">
						</div>
						<div class="form-group">
							<textarea name="message" class="form-control" placeholder="Message" rows="8"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" id="submit" value="Submit Query" class="btn block blue-gradiant">
						</div>
					</form>
					
				</div>
			</div>
		</div>
		</div>
		
	</div>
</section>
<?php
include("footer.php");
?>
