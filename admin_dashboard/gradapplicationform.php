<?php 
if(isset($_REQUEST['selectedstudentvalue']))
{
	include("../connect.php");
	include("../externalheaderfiles.php");
	$key=$_REQUEST['selectedstudentvalue'];
	
	$result=mysqli_query($conn,"SELECT student_personal_data.studentid, student_personal_data.intrested_program,student_personal_data.firstname,student_personal_data.middlename,student_personal_data.lastname,student_personal_data.fathersname,student_personal_data.mothersname,
student_personal_data.semail,student_personal_data.mobile,student_personal_data.gender,student_personal_data.age,student_personal_data.dob,student_personal_data.nationality,
student_personal_data.category,student_personal_data.houseno,student_personal_data.streetno,student_personal_data.area,student_personal_data.city,student_personal_data.state,
student_personal_data.country,student_personal_data.pincode,student_personal_data.sdate_of_reg,student_academics.senior_secondary_board,student_academics.senior_secondary_specialization,
student_academics.senior_secondary_year,student_academics.senior_secondary_percentage,student_academics.higher_secondary_board,student_academics.higher_secondary_specialization,
student_academics.higher_secondary_year,student_academics.higher_secondary_percentage,student_academics.graduation_university,student_academics.graduation_specialization,student_academics.graduation_year,
student_academics.graduation_percentage,student_academics.other_board,student_academics.other_specialization,student_academics.other_year,student_academics.other_percentage,
student_academics.cmat_score,student_academics.cmat_percentage,student_academics.cmat_month_year,student_academics.mat_score,student_academics.mat_percentage,student_academics.mat_month_year,
student_academics.cat_score,student_academics.cat_percentage,student_academics.cat_month_year,student_academics.atma_score,student_academics.atma_percentage,student_academics.atma_month_year,
student_academics.xat_score,student_academics.xat_percentage,student_academics.xat_month_year,student_academics.mh_cet_score,student_academics.mh_cet_percentage,student_academics.mh_cet_month_year,
student_academics.other_score,student_academics.other_percent,student_academics.other_month_year,student_academics.mgt_program,student_academics.eng_exam_name,student_academics.eng_exam_score,
student_additional_information.location1,student_additional_information.location2,student_additional_information.location3,student_additional_information.preferred_colleges,
student_additional_information.terms,student_additional_information.applicant_name,student_additional_information.current_place,student_additional_information.form_submission_date,
student_additional_information.applicant_profile,student_additional_information.certificate from student_additional_information INNER JOIN student_personal_data ON 
student_personal_data.studentid = student_additional_information.studentid
INNER JOIN student_academics ON student_academics.student_id=student_additional_information.studentid  
WHERE student_personal_data.studentid='$key'");
	$row=mysqli_fetch_assoc($result);
?>
<div class="container border p-2">
	<div class="row">
		<div class="col-md-9">
			<h2>Common Application Form</h2>
			
		</div>
		<div class="col-md-3">
			<a href="applicationSubmitted.php" class="btn btn-info font-weight-bold">Back</a>
			<button class="btn btn-primary font-weight-bold" onclick="window.print()">Print</button>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-12">
			<h3>Personal Information</h3>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-9">
			<div class="row mt-2">
		<div class="col-md-3  ">
			Program Intrested:
			<input type="text" name="program_intrested" 
		value="<?php echo $row['intrested_program']?>"	class="form-control">
		</div>
		<div class="col-md-3  mt-3">
			
		</div>
		<div class="col-md-3  mt-3">
			
		</div>
		<div class="col-md-3  mt-3">
			
		</div>
	</div>

	<div class="row mt-2">
		<div class="col-md-3">
			Firstname:
			<input type="text" class="form-control" value="<?php echo $row['firstname']?>" name="fname" id="fname">
		</div>
		<div class="col-md-3">
			Middlename:
			<input type="text"  class="form-control" value="<?php echo $row['middlename']?>" name="mname" id="mname">
		</div>
		<div class="col-md-3">
			Lastname:
			<input type="text" value="<?php echo $row['lastname']?>" class="form-control" name="lname"
 			id="lname">
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-3">
			Father's Name:
			<input type="text" class="form-control" name="fathersname" id="fathersname"
			 value="<?php echo $row['fathersname']?>">
		</div>
		<div class="col-md-3">
			Mother's Name:
			<input type="text"  class="form-control" name="mothersname" id="mothersname"  value="<?php echo $row['mothersname']?>">
		</div>
		<div class="col-md-3">
			
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
		</div>
		<div class="col-md-3">
			<img src="../profile_uploads/<?php echo $row['applicant_profile']?>" height="200" width="175">

		</div>
	</div>
	
	
	<div class="row mt-2">
		<div class="col-md-3">
			Email:
			<input type="text"  value="<?php echo $row['semail'];?>" class="form-control" name="email" id="email">
		</div>
		<div class="col-md-3">
			Contact Number:
			<input type="text"  value="<?php echo $row['mobile']?>" class="form-control" name="mobile" id="mobile">
		</div>
		<div class="col-md-3">
			Gender:
			<input type="text"  value="<?php echo $row['gender']?>" class="form-control" name="gender" id="gender">
		</div>
		<div class="col-md-3">
			Age:
			<input type="text" value="<?php echo $row['age']?>" class="form-control" name="age" id="age">
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-3">
			Date of Birth:
			<input type="text" class="form-control" value="<?php echo $row['dob']?>" name="dob" id="dob">
		</div>
		<div class="col-md-3">
			Nationality:
			<input type="text" class="form-control" name="nationality" id="nationality" value="<?php echo $row['nationality']?>">
		</div>
		<div class="col-md-3">
			Category:
			<input type="text" class="form-control" name="category" value="<?php echo $row['category']?>" id="category" >
		</div>
		<div class="col-md-3">
			
		</div>
		
	</div>
	<div class="row mt-2">
		<div class="col-md-3">
			House No:
			<input type="text" name="house_no" id="house_no"  class="form-control" value="<?php echo $row['houseno']?>">
		</div>
		<div class="col-md-3">
			Street Name:
			<input type="text" name="street_name" id="street_name" class="form-control" value="<?php echo $row['streetno']?>">
		</div>
		<div class="col-md-3">
			Area/Locality:
			<input type="text" name="area" id="area" placeholder="Area/Locality" class="form-control" value="<?php echo $row['area']?>">
		</div>
		<div class="col-md-3">
			City:
			<input type="text" name="city" id="city" placeholder="City" class="form-control" value="<?php echo $row['city']?>">

		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-3">
			State:
			<input type="text" name="state" id="state" value="<?php echo $row['state']?>" class="form-control">
		</div>
		<div class="col-md-3">
			Country:
			<input type="text" name="country" id="country" value="<?php echo $row['country']?>" class="form-control">

		</div>
		<div class="col-md-3">
			Pincode:
			<input type="text" value="<?php echo $row['pincode']?>" class="form-control" name="pincode" id="pincode">
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
	<div class="row mb-0 p-2">
		<div col-md-12>
			<h3>Academic Details</h3>
		</div>
	</div>
	<div class="row p-2">
		<div col-md-12>
			<p>Examination taken (Please list in chronological order including 10th, 12th and graduation examination with result pending)</p>
				<table class="table">
				<tr>
					<th>Academic Level</th>
					
					<th>Degree, Institute & Board/University</th>
					<th>Specialization</th>
					<th>Year</th>
					<th>Percentage</th>
				</tr>
			<tbody>
					<tr>
						<td>X Standard</td>
											
						<td>
							
							<textarea class="form-control">
							<?php echo $row['senior_secondary_board']?>
							</textarea>
						</td>
						<td>
							
							<textarea class="form-control">
							<?php echo $row['senior_secondary_specialization']?>
							</textarea>
						</td>
						<td>
							
							<textarea class="form-control">
							<?php echo $row['senior_secondary_year']?>
							</textarea>
						</td>
						<td>
						
						<textarea class="form-control">
							<?php echo $row['senior_secondary_percentage']?>
							</textarea>
						</td>
						
					</tr>

						<tr>
									<td>XII Standard</td>
												
												<td>
													
													<textarea class="form-control">
							<?php echo $row['higher_secondary_board']?>
							</textarea>
												</td>
												<td>
													
													<textarea class="form-control">
							<?php echo $row['higher_secondary_specialization']?>
							</textarea>
												</td>
												<td>
													
													<textarea class="form-control">
							<?php echo $row['higher_secondary_year']?>
							</textarea>
												</td>
												<td>
													
													<textarea class="form-control">
							<?php echo $row['higher_secondary_percentage']?>
							</textarea>
												</td>
												
											</tr>

											

											<tr>
												<td>Graduation</td>
												
												<td>
													
													<textarea class="form-control">
							<?php echo $row['graduation_university']?>
							</textarea>
												</td>
												<td>
													
													<textarea class="form-control">
							<?php echo $row['graduation_specialization']?>
							</textarea>
												</td>
												<td>
													
													<textarea class="form-control">
							<?php echo $row['graduation_year']?>
							</textarea>
												</td>
												<td>
													
													<textarea class="form-control">
							<?php echo $row['graduation_percentage']?>
							</textarea>
												</td>
												
											</tr>

											<tr>
												<td>Any Other (specify)</td>
												
												<td>
													
													<textarea class="form-control">
							<?php echo $row['other_board']?>
							</textarea>
												</td>
												<td>
													
													<textarea class="form-control">
							<?php echo $row['other_percentage']?>
							</textarea>
												</td>
												<td>
													
													<textarea class="form-control">
							<?php echo $row['other_year']?>
							</textarea>
												</td>
												
												<td>
													
													<textarea class="form-control">
							<?php echo $row['other_percentage']?>
							</textarea>
												</td>
											</tr>
										</tbody>		
			</table>
		</div>
	</div>
	
	<div class="row mt-2">
		<div class="col-md-12">
			<h4>Additional Information</h4>
		</div>
	</div>
	<div class="row mt-1">
		<div class="col-md-4">
			Preffered Location 1:
			<input type="text" class="form-control"value="<?php echo $row['location1']?>">
		</div>
		<div class="col-md-4">
			Preffered Location 2:
			<input type="text" class="form-control"value="<?php echo $row['location2']?>">
		</div>
		<div class="col-md-4">
			Preffered Location 3:
			<input type="text" class="form-control"value="<?php echo $row['location3']?>">
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-4">
			Preffered Colleges as per selected preffered location:
		</div>
		<div class="col-md-8">
			
			<textarea class="form-control">
				<?php echo $row['preferred_colleges']?>
			</textarea>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-12">
			<h4>Declaration by Applicant</h4>
			<p>I declare that all information in my application is complete, factually correct, and honestly presented. I have read the rules and regulations mentioned in the prospectus and will adhere to the same.</p>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-4">
			Name of Applicant
			<input type="text" class="form-control" value="<?php echo $row['applicant_name']?>">
		</div>
		<div class="col-md-4">
			Place:
			<input type="text" class="form-control"value="<?php echo $row['current_place']?>">
		</div>
		<div class="col-md-4">
			Date of form submission:
			<input type="text" class="form-control" value="<?php echo $row['form_submission_date']?>">
		</div>
	</div>
</div>
<?php	

include("../externalfooterfile.php");
}
else
{
	echo "No permission to access this page";
}
?>