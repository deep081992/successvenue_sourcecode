<?php 
include("other-header.php");
include("../connect.php");
$res=mysqli_query($conn,"select * from landing_page where status='active'");
$row=mysqli_fetch_assoc($res);
//print_r($row);
?>
	<section id="main" class="main">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<br>
				<img src="../img/logo/logo.jpg" height="60" width="130" class="img-fluid img-thumbnail" >
				<br>
				
				<p class="text-white font-weight-bold">SUCCESS VENUE takes pleasure in providing admission guidance in most of the reputed institutions offering education in MBA/PGDM.</p>
				<h3 class="text-white"><?php echo $row['event_name']?></h3>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-xs-8 col-sm-8 col-md-8 mb-3">
				<a href="assets/img/landing_page_banner/<?php echo $row['image']?>" class="mobileLightBox">
  					<img src="assets/img/landing_page_banner/<?php echo $row['image']?>" alt="Image1" class="img-fluid img-thumbnail" height="280" width="800">
 			 	</a>
			</div>
			<div id="visitorform" class="col-xs-4 col-sm-4 col-md-4 text-center">
				<br>
				
				<h5 class="fontstyle brown-text">Please Fill below form, its free and only takes a minute</h5>
						
				
				<?php
				if(isset($_POST['submit']))
				{
					$name=(isset($_POST['name']))?($_POST['name']):"";
					$mobile=(isset($_POST['mobile']))?($_POST['mobile']):"";
					$city=(isset($_POST['city']))?($_POST['city']):"";
					date_default_timezone_set("Asia/Calcutta");
					$date=date("Y-m-d h:i:s");

					$res=mysqli_query($conn,"insert into landing_page_data(name,mobile_no,city,date) values('$name','$mobile','$city','$date')");
					if(mysqli_affected_rows($conn)==1)
					{
						echo "<p class='alert alert-success'>Form Submitted Successfully</p>";
					}
					else
					{
						echo "<p class='alert alert-danger'>Unable to submit your Form Please try again!Thankyou</p>";
					}

					
				}
				
				?>
				<form method="post" action="" id="submitform">
					<div class="form-group">
						<input type="text" class="form-control" name="name" placeholder="Full Name">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="mobile" placeholder="Contact Number">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="city" placeholder="City">
					</div>

					<div class="form-group">
						<input type="submit" class="form-control submit-button text-white font-weight-bold" name="submit" value="Click Here To Submit">
					</div>
				</form>
				
				<h4><span class="bg-deepskyblue">Apply now</span> in Top Colleges accross India</h4>
			</div>
		</div>
	</div>
</section>
<section id="mid">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div id="eventdetail">
					<?php echo $row['description']?>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				
			</div>
		</div>
	</div>
</section>
<section class="above-footer" id="abovefooter">
	<div class="container-fluid">
		<div class="row ">
			<div class="col-xs-7 col-sm-7 col-md-7">
			
					<p class="text-center text-dark fontstyle">SUCCESS VENUE takes pleasure in providing admission guidance in most of the reputed institutions offering education in every sphere i.e. MBA/PGDM, Medical, Engineering, and Law and many more.</p>
				
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 " >
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="visitorform" class="btn btn-dark amber-text">
					REQUEST A CALL BACK
				</a>
			</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function()
		{
			$(function(){
  $('.mobileLightBox').mobileLightBox();
});
		});
</script>
	

<?php 
include("other-footer.php");
?>
