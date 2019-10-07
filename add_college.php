<?php
include("header.php");
include("connect.php");

?>
<div class="container m-5">
	<div class="row">
		<div class="col-md-12">
			<?php

			if(isset($_COOKIE['success']))
			{
				echo "<p class='alert alert-success'>".$_COOKIE['success']."</p>";
			}
			if(isset($_COOKIE['error']))
			{
				echo "<p class='alert alert-danger'>".$_COOKIE['error']."</p>";
			}

				if(isset($_POST['addcollege']))
				{

					if(is_uploaded_file($_FILES['collegelogo']['tmp_name']))
						{
				
							$fname=$_FILES['collegelogo']['name'];
							$newname=time()."_".$fname;
							$ftype=$_FILES['collegelogo']['type'];
							$ftname=$_FILES['collegelogo']['tmp_name'];
				
							$fsize=$_FILES['collegelogo']['size'];

							$image_types=array("image/jpeg","image/jpg","image/png");
							if(in_array($ftype,$image_types))
								{
									$status_images=move_uploaded_file($ftname,"college_logo/$newname");
								}
								else
								{
									echo "File not found";
								}
						}
						else
						{
							echo "Upload image file";
						}
			

					$collegename=(isset($_POST['collegename']))?$_POST['collegename']:"";
					$location=(isset($_POST['location']))?$_POST['location']:"";
					$coursename=(isset($_POST['coursename']))?$_POST['coursename']:"";
 					$coursedetail=(isset($_POST['coursedetail']))?$_POST['coursedetail']:"";
 					$examaccepted=(isset($_POST['examaccepted']))?$_POST['examaccepted']:"";
 					$coursefee=(isset($_POST['coursefee']))?$_POST['coursefee']:"";

 					$add=mysqli_query($conn,"insert into college (college_name,location,course_name,course_detail,examination_accepted,course_fee,college_logo) values('$collegename','$location','$coursename','$coursedetail','$examaccepted','$coursefee','$newname')");
 					
 					if(mysqli_affected_rows($conn)==1)
 					{
 						setcookie('success','College details added Successfully',time()+2);
		 				
 					}
 					else
 					{
 						setcookie('error','Unable to add college details,Please try again later!Thanks',time()+2);
 					}

				}
				
			?>
			<form method="post" action="" enctype="multipart/form-data">
				<table class="table">
					<tr class="bg-secondary text-light">
							<th>College Name</th>
							<th>Location of College</th>
							<th>Course Name</th>
							<th>Course Details</th>
							<th>Examination Accepted</th>
							<th>Course Fee</th>
							<th>College Logo</th>
							
					</tr>
					<tr>
				<td>
					<input type="text" name="collegename" id="collegename" class="form-control">
				</td>
				<td>
					<input type="text" name="location" id="location" class="form-control">
				</td>
				<td>
					<input type="text" name="coursename" id="coursename" class="form-control">
				</td>
				<td>
					<input type="text" name="coursedetail" id="coursedetail" class="form-control">
				</td>
				<td>
					<input type="text" name="examaccepted" id="examaccepted" class="form-control">
				</td>
				<td>
					<input type="text" name="coursefee" id="coursefee" class="form-control">
				</td>
				<td>
					<input type="file" name="collegelogo" id="collegelogo" class="form-control" value="College Logo">
				</td>
				
					</tr>
					<tr>
						<td>
					<input type="submit" name="addcollege" id="addcollege" class="form-control bg-warning text-light font-weight-bold btn-lg">
						</td>
						<td>
							<input type="button" name="goback" id="goback" value="Go Back" class="form-control btn-secondary text-light font-weight-bold btn-lg" onclick="gobackCollege_data()">
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td><td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td><td></td><td></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<script>
	function gobackCollege_data()
	{
		document.location="college_data.php";
	}
</script>
<?php 
include("footer.php");
?>