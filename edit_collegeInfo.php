<?php 
if(isset($_REQUEST['key']))
{
	include("header.php");
	include("connect.php");
	$id=$_REQUEST['key'];
	$res=mysqli_query($conn,"select * from college where collegeid='$id'");
	$row=mysqli_fetch_assoc($res);
	
}

?>
<?php
		if(isset($_COOKIE['success']))
			{
				echo "<p class='alert alert-success'>".$_COOKIE['success']."</p>";
			}
			if(isset($_COOKIE['error']))
			{
				echo "<p class='alert alert-danger'>".$_COOKIE['error']."</p>";
			}
if(isset($_POST['updatebtn']))
{
	if(is_uploaded_file($_FILES['college_logo']['tmp_name']))
	{
		{
					$fname=$_FILES['college_logo']['name'];
					$newname=time()."_".$fname;
					$ftype=$_FILES['college_logo']['type'];
					$ftname=$_FILES['college_logo']['tmp_name'];
					$fsize=$_FILES['college_logo']['size'];
					$file_types=array("image/png","image/jpeg","image/jpg");
					if (in_array($ftype, $file_types))
					 
					 {

						$status=move_uploaded_file($ftname,"college_logo/$newname" );
					}
					else
					{
						echo "upload valid file type";
					}
				}
	}
	else
	{
		echo "File Not Uploaded";
	}

	$collegename=(isset($_POST['collegename']))?$_POST['collegename']:"";
	$location=(isset($_POST['location']))?$_POST['location']:"";
	$course_name=(isset($_POST['course_name']))?$_POST['course_name']:"";
	$course_details=(isset($_POST['course_details']))?$_POST['course_details']:"";
	$course_fee=(isset($_POST['course_fee']))?$_POST['course_fee']:"";
	$college_logo=(isset($_POST['college_logo']))?$_POST['college_logo']:"";
	$examination_accepted=(isset($_POST['examination_accepted']))?$_POST['examination_accepted']:"";
	mysqli_query($conn,"update college set college_name= '$collegename',location= '$location',course_name= '$course_name',course_details= '$course_details',course_fee= '$course_fee',college_logo= '$newname' where collegeid=$id");
		mysqli_error($conn);
				if(mysqli_affected_rows($conn)==1)
					{
						setcookie('success','Data updated successfully',time()+2);
						header("location:college_data.php");
					}
					else
					{
						setcookie('error','Profile not updated',time()+2);
						header("location:edit_collegeInfo.php?key=$id");
					}
	

}

?>
<div class="container mt-5">
	<div class="row">
	<div class="col-md-12">
		<form method="post" action="" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<td>
					<label class="form-control">College ID</label>
				</td>
				<td>
					<label class="form-control"><?php echo $row['collegeid']?></label>
				</td>
			</tr>
			<tr>
				<td>
					<label class="form-control">College Name</label>
				</td>
				<td>
					<input type="text" name="collegename" id="collegename" class="form-control" value="<?php echo $row['college_name']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label class="form-control">Location of College</label>
				</td>
				<td>
					
					<select class="form-control" id="location" name="location">
						<option value="<?php echo $row['location']?>"><?php echo $row['location']?></option>
						<?php 
							$loc=mysqli_query($conn,"select distinct location from college");
							while($display_location=mysqli_fetch_assoc($loc))
							{
								?>

								<option value="<?php echo $display_location['location']?>">
									<?php echo $display_location['location']?>
								</option>

								<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label class="form-control">Course Name</label>
				</td>
				<td>
					
					<select class="form-control" id="course_name" name="course_name">
						<option value="<?php echo $row['course_name']?>"><?php echo $row['course_name']?></option>
						<?php 
							$course=mysqli_query($conn,"select distinct course_name from college");
							while($courses=mysqli_fetch_assoc($course))
							{
								?>

								<option value="<?php echo $courses['course_name']?>">
									<?php echo $courses['course_name']?>
								</option>

								<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label class="form-control">Course Details</label>
				</td>
				<td>
					<input type="text" name="course_details" id="course_details" class="form-control" value="<?php echo $row['course_detail']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label class="form-control">Examination Accepted</label>
				</td>
				<td>
					<input type="text" name="examination_accepted" id="examination_accepted" class="form-control" value="<?php echo $row['examination_accepted']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label class="form-control">Course Fee</label>
				</td>
				<td>
					<input type="text" name="course_fee" id="course_fee" class="form-control" value="<?php echo $row['course_fee']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label class="form-control">College Logo</label>
				</td>
				<td>
					<input type="file" name="college_logo" id="college_logo" class="form-control" value="<?php echo $row['college_logo']?>">
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					<input type="submit" name="updatebtn" id="updatebtn" class="btn btn-secondary text-light">
				</td>
			</tr>

		</table>
		</form>
	</div>	
	</div>
</div>
<?php
include("footer.php");
?>