<?php 

session_start();
if(isset($_SESSION['logintrue']) AND ($_SESSION['loginid']))
{
	$token=$_SESSION['logintrue'];
	$studentid=$_SESSION['loginid'];
	include("connect.php");
	$res=mysqli_query($conn,"select * from student_personal_data where studentid='$studentid' ");
	//print_r($res);
	$row=mysqli_fetch_assoc($res);
	include("header.php");
	?>

<div class="container mt-5">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header bg-primary">
					<h3 class="text-light text-font">Common Application Form</h3>
					
				</div>
				<div class="card-body bg-light text-font">
					<div class="progress" style="height: 40px;" id="progressbar">
						<div class="progress-bar bg-danger" role="progressbar " id="progressbar_main" style="width:20%">
							<b class="lead" id="progresstext">Step-1</b>
					</div>
					</div>
<?php
if(isset($_POST['submit_btn']))
	{

		//uploading applicant profile

		if(is_uploaded_file($_FILES['upload_applicant_profile']['tmp_name']))
		{
			
			$fname=$_FILES['upload_applicant_profile']['name'];
			$newname=time()."_".$fname;
			$ftype=$_FILES['upload_applicant_profile']['type'];
			$ftname=$_FILES['upload_applicant_profile']['tmp_name'];
			$fsize=$_FILES['upload_applicant_profile']['size'];

			//upload only jpeg,jpg,png image types

			$image_types=array("image/jpeg","image/jpg","image/png");
			if(in_array($ftype,$image_types))
			{
				$status_images=move_uploaded_file($ftname,"profile_uploads/$newname");
			}
			else
			{
				echo "file not found";
			}
		}

		//upload documents
		$total_files=count($_FILES['documents']['name']);
		for($i=0;$i<$total_files;$i++)
		{
			if(is_uploaded_file($_FILES['documents']['tmp_name'][$i]))
				{
					$fname=$_FILES['documents']['name'][$i];
					$ftype=$_FILES['documents']['type'][$i];
					$ftname=$_FILES['documents']['tmp_name'][$i];
					$fsize=$_FILES['documents']['size'][$i];
					$document_types=array("image/png","image/jpeg","image/jpg","application/pdf");
					if (in_array($ftype, $document_types))
					 
					 {

						$status_documents=move_uploaded_file($ftname,"student_documents/$fname" );
					}
					else
					{
						echo "upload valid file type";
					}
				}

		}	

		//basic information of students

		$program_intrested=(isset($_POST['program_intrested']))?$_POST['program_intrested']:"";
		$fname=(isset($_POST['fname']))?$_POST['fname']:"";
		$mname=(isset($_POST['mname']))?$_POST['mname']:"";
		$lname=(isset($_POST['lname']))?$_POST['lname']:"";
		$fathersname=(isset($_POST['fathersname']))?$_POST['fathersname']:"";
		$mothersname=(isset($_POST['mothersname']))?$_POST['mothersname']:"";
		//$email=(isset($_POST['email']))?$_POST['email']:"";
		$mobile=(isset($_POST['mobile']))?$_POST['mobile']:"";
		$gender=(isset($_POST['gender']))?$_POST['gender']:"";
		$age=(isset($_POST['age']))?$_POST['age']:"";
		date_default_timezone_set("Asia/Calcutta");
		$dob=date("Y-m-d");
		$nationality=(isset($_POST['nationality']))?$_POST['nationality']:"";
		$category=(isset($_POST['category']))?$_POST['category']:"";
		$house_no=(isset($_POST['house_no']))?$_POST['house_no']:"";
		$street_name=(isset($_POST['street_name']))?$_POST['street_name']:"";
		$area=(isset($_POST['area']))?$_POST['area']:"";
		$city=(isset($_POST['city']))?$_POST['city']:"";
		$country=(isset($_POST['country']))?$_POST['country']:"";
		$pincode=(isset($_POST['pincode']))?$_POST['pincode']:"";
		$state=(isset($_POST['state']))?$_POST['state']:"";

		//students academics details



		$ss_board=(isset($_POST['ss_board']))?($_POST['ss_board']):"";
		$ss_specialization=(isset($_POST['ss_specialization']))?($_POST['ss_specialization']):"";
		$ss_year=(isset($_POST['ss_year']))?($_POST['ss_year']):"";
		$ss_percent=(isset($_POST['ss_percent']))?($_POST['ss_percent']):"";

		$hs_board=(isset($_POST['hs_board']))?($_POST['hs_board']):"";
		$hs_specialization=(isset($_POST['hs_specialization']))?($_POST['hs_specialization']):"";
		$hs_year=(isset($_POST['hs_year']))?($_POST['hs_year']):"";
		$hs_percent=(isset($_POST['hs_percent']))?($_POST['hs_percent']):"";

		$g_university=(isset($_POST['g_university']))?($_POST['g_university']):"";
		$g_specialization=(isset($_POST['g_specialization']))?($_POST['g_specialization']):"";
		$g_year=(isset($_POST['g_year']))?($_POST['g_year']):"";
		$g_percent=(isset($_POST['g_percent']))?($_POST['g_percent']):"";

		$other_university=(isset($_POST['other_university']))?($_POST['other_university']):"";
		$other_specialization=(isset($_POST['other_specialization']))?($_POST['other_specialization']):"";
		$other_year=(isset($_POST['other_year']))?($_POST['other_year']):"";
		$other_percent=(isset($_POST['other_percent']))?($_POST['other_percent']):"";
		


		$cmat_score=(isset($_POST['cmat_score']))?($_POST['cmat_score']):"";
		$cmat_percent=(isset($_POST['cmat_percent']))?($_POST['cmat_percent']):"";
		$cmat_year=(isset($_POST['cmat_year']))?($_POST['cmat_year']):"";

		$mat_score=(isset($_POST['mat_score']))?($_POST['mat_score']):"";
		$mat_percent=(isset($_POST['mat_percent']))?($_POST['mat_percent']):"";
		$mat_year=(isset($_POST['mat_year']))?($_POST['mat_year']):"";

		$cat_score=(isset($_POST['cat_score']))?($_POST['cat_score']):"";
		$cat_percent=(isset($_POST['cat_percent']))?($_POST['cat_percent']):"";
		$cat_year=(isset($_POST['cat_year']))?($_POST['cat_year']):"";

		$mhcet_score=(isset($_POST['mhcet_score']))?($_POST['mhcet_score']):"";
		$mhcet_percent=(isset($_POST['mhcet_percent']))?($_POST['mhcet_percent']):"";
		$mhcet_year=(isset($_POST['mhcet_year']))?($_POST['mhcet_year']):"";

		$xat_score=(isset($_POST['xat_score']))?($_POST['xat_score']):"";
		$xat_percent=(isset($_POST['xat_percent']))?($_POST['xat_percent']):"";
		$xat_year=(isset($_POST['xat_year']))?($_POST['xat_year']):"";
		 
		$atma_score=(isset($_POST['atma_score']))?($_POST['atma_score']):"";
		$atma_percent=(isset($_POST['atma_percent']))?($_POST['atma_percent']):"";
		$atma_year=(isset($_POST['atma_year']))?($_POST['atma_year']):"";
		
		$other_score=(isset($_POST['other_score']))?($_POST['other_score']):"";
		$other_percent_mgtexam=(isset($_POST['other_percent']))?($_POST['other_percent']):"";
		$other_year_mgtexam=(isset($_POST['other_year']))?($_POST['other_year']):"";

		$mgt_program=(isset($_POST['management_program']))?($_POST['management_program']):"";
		$selected_mgt_program=implode(",",$mgt_program);

		$eng_exam_name=(isset($_POST['eng_exam_name']))?($_POST['eng_exam_name']):"";
		$eng_exam_score=(isset($_POST['eng_exam_score']))?($_POST['eng_exam_score']):"";
		
		//additional information by applicant

		$loc1=(isset($_POST['location1']))?($_POST['location1']):"";
		//$selectedLocation=implode(",",$loc1);
		$loc2=(isset($_POST['location2']))?($_POST['location2']):"";
		$loc3=(isset($_POST['location3']))?($_POST['location3']):"";
		$preferred_colleges=(isset($_POST['collegeList']))?($_POST['collegeList']):"";
		$selectedCollege=implode(",",$preferred_colleges);
		$terms=(isset($_POST['terms']))?($_POST['terms']):"";
		$applicant_name=(isset($_POST['applicant_name']))?($_POST['applicant_name']):"";
		$current_place=(isset($_POST['current_place']))?($_POST['current_place']):"";
		date_default_timezone_set("Asia/Calcutta");
		$form_submission_date=date("Y-m-d");
		//$applicant_profile=(isset($_POST['applicant_profile']))?($_POST['applicant_profile']):"";
		//$certificates=(isset($_POST['documents']))?($_POST['documents']):"";



		

	mysqli_query($conn,"update student_personal_data set intrested_program='$program_intrested',firstname='$fname',middlename='$mname',lastname='$lname',fathersname='$fathersname',mothersname='$mothersname',mobile='$mobile',gender='$gender',age='$age',dob='$dob',nationality='$nationality',category='$category',houseno='$house_no',streetno='$street_name',area='$area',city='$city',country='$country',pincode='$pincode',state='$state' where studentid='$studentid'");		

	//echo mysqli_error($conn);
	if(mysqli_affected_rows($conn)==1)
	{
			mysqli_query($conn,
			"insert into student_academics(
			student_id,
			senior_secondary_board,
			senior_secondary_specialization,
			senior_secondary_year,
			senior_secondary_percentage,
			higher_secondary_board,
			higher_secondary_specialization,
			higher_secondary_year,
			higher_secondary_percentage,
			graduation_university,
			graduation_specialization,
			graduation_year	,
			graduation_percentage,
			other_board,
			other_specialization,
			other_year,
			other_percentage,
			cmat_score,
			cmat_percentage,
			cmat_month_year,
			mat_score,
			mat_percentage,
			mat_month_year,
			cat_score,
			cat_percentage,
			cat_month_year,
			atma_score,
			atma_percentage,
			atma_month_year,
			xat_score,
			xat_percentage,
			xat_month_year,
			mh_cet_score,
			mh_cet_percentage,
			mh_cet_month_year,
			other_score,
			other_percent,
			other_month_year,
			mgt_program,
			eng_exam_name,
			eng_exam_score
			)
			values(
			$studentid,
			'$ss_board',
			'$ss_specialization',
			'$ss_year',
			'$ss_percent',
			'$hs_board',
			'$hs_specialization',
			'$hs_year',
			'$hs_percent',
			'$g_university',
			'$g_specialization',
			'$g_year',
			'$g_percent',
			'$other_university',
			'$other_specialization',
			'$other_year',
			'$other_percent',
			'$cmat_score',
			'$cmat_percent',
			'$cmat_year',
			'$mat_score',
			'$mat_percent',
			'$mat_year',
			'$cat_score',
			'$cat_percent',
			'$cat_year',
			'$atma_score',
			'$atma_percent',
			'$atma_year',
			'$xat_score',
			'$xat_percent',
			'$xat_year',
			'$mhcet_score',
			'$mhcet_percent',
			'$mhcet_year',
			'$other_score',
			'$other_percent_mgtexam',
			'$other_year_mgtexam',
			'$selected_mgt_program',
			'$eng_exam_name',
			'$eng_exam_score'
			)");
			
			
			 $academic_id=mysqli_insert_id($conn);

		echo mysqli_error($conn);
			 if(mysqli_affected_rows($conn)>0)
			 {

			 	mysqli_query($conn,"insert into student_additional_information
			 		(
			 		studentid,
			 		student_academic_id,
			 		location1,
			 		location2,
			 		location3,
			 		preferred_colleges,
			 		terms,
			 		applicant_name,
			 		current_place,
			 		form_submission_date,
			 		applicant_profile,
			 		certificate) values
			 	($studentid,
			 	$academic_id,
			 	'$loc1',
			 	'$loc2',
			 	'$loc3',
			 	'$selectedCollege',
			 	'$terms',
			 	'$applicant_name',
			 	'$current_place',
			 	'$form_submission_date',
			 	'$newname',
			 	'$fname'
			 )");
			 }
			 else
			 {
			 	echo "unable to insert data into accademics table";
			 }
	}
	else
	{
		echo "unable to update student records";
	}

}
					
?>
<form method="post" action="" enctype="multipart/form-data">
<div class="row">
<div class="col-md-12" id="program_intrested">
<label class="lead">Program Intrested</label>
<div class="form-group">
<span class="lead">
	<input type="radio" name="program_intrested" id="management_radio_btn" value="management">&nbspManagement
</span>
<span class="lead">
	<input type="radio" name="program_intrested" id="engineering_radio_btn" value="engineering">&nbspEngineering
</span>
<span class="lead">
	<input type="radio" name="program_intrested" id="graduation_radio_btn" value="graduation">&nbspGraduation
</span>
</div>
</div>
</div>
<!----------------Management-Div-Start-------------------------------------------->					
<div id="management" style="display: none;">
<div class="row">
<div class="col-md-12">
<!--------------------Engineering-page-1-start---------------------------------------->
<div id="mpage1">
<h3>Basic Information</h3>
<div class="row">
<div class="col-md-4">
<input type="text" placeholder="First Name" class="form-control" value="<?php echo $row['firstname']?>" name="fname" id="fname">
</div>																					

<div class="col-md-4">
<input type="text" placeholder="Middle Name" class="form-control" name="mname" id="mname">
</div>

<div class="col-md-4">
<input type="text" placeholder="Last Name" class="form-control" name="lname"
 id="lname">
</div>
</div>
								
								
<table class="table mt-3">
<tr>
<td colspan="2">
	
<input type="text" placeholder="Father's Name" class="form-control" name="fathersname" id="fathersname">
</td>		
<td colspan="2">
<input type="text" placeholder="Mother's Name" class="form-control" name="mothersname" id="mothersname">
</td>
</tr>

<tr>
<td>
<input type="text" placeholder="Email Id" value="<?php echo $row['semail'];?>" class="form-control" name="email" id="email" readonly>
</td>

<td>
<input type="text" placeholder="Contact No" value="<?php echo $row['mobile']?>" class="form-control" name="mobile" id="mobile">
</td>
										
<td>
<div class="input-group mb-3">
<div class="input-group-prepend">
<label class="input-group-text" for="inputGroupSelect01">Gender</label>
</div>
<select class="custom-select" id="gender" name="gender" 
onblur="selectBoxDataRequired(this);">
<option value="1">Select</option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>
</div>
</td>
<td>
<input type="text" placeholder="Age" class="form-control" name="age" id="age">
</td>
</tr>

<tr>
<td>
<input type="text" placeholder="Date of Birth | DD-MM-YYYY" class="form-control" name="dob" id="dob">
</td>
<td>
<input type="text" placeholder="Nationality" class="form-control" name="nationality" id="nationality" value="<?php echo $row['nationality']?>" readonly>
</td>
<td colspan="2">
<label class="lead ">Category</label>
&nbsp&nbsp&nbsp&nbsp
<input type="radio" name="category" value="general" id="general" >&nbspGeneral&nbsp&nbsp&nbsp&nbsp
<input type="radio" name="category" value="general" id="obc">&nbspOBC&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="radio" name="category" value="st" id="st">&nbspST&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="radio" name="category" value="sc" id="sc" class="lead">&nbspSC
</td>
</tr>

<tr>
<td colspan="2">
<input type="text" name="house_no" id="house_no" placeholder="House No" class="form-control">
</td>
<td colspan="2">
<input type="text" name="street_name" id="street_name" placeholder="Street Name" class="form-control">
</td>
</tr>

<tr>
<td colspan="2">
<input type="text" name="area" id="area" placeholder="Area/Locality" class="form-control">
</td>
<td colspan="2">
<input type="text" name="city" id="city" placeholder="City" class="form-control">
</td>
</tr>

<tr>
<td colspan="2">
<input type="text" name="state" id="state" placeholder="State" class="form-control">
</td>
<td colspan="2">
<input type="text" name="country" id="country" value="<?php echo $row['country']?>" class="form-control" readonly>
</td>
</tr>

<tr>
<td>
<input type="text" placeholder="Pincode" class="form-control" name="pincode" id="pincode">
</td>
<td></td>
<td></td>
<td>
<a href="#" class="btn btn-block btn-outline-primary" id="mnext1">Next Page</a>
</td>
</tr>
</table>
</div>
<!-----------------Management-page-1-end------------------------------------------>
<!---------------Management-page-2-start--------------------------------------------->	
	<div id="mpage2">
		<h3>Academic Details</h3>

		<div class="row" id="academic_details">
			<div class="col-md-12">
			<p class="lead">Examination taken (Please list in chronological order including 10th, 12th and graduation examination with result pending)</p>
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
							<input type="text" class="form-control" name="ss_board">
						</td>
						<td>
							<input type="text" class="form-control" name="ss_specialization">
						</td>
						<td>
							<input type="text" class="form-control" name="ss_year">
						</td>
						<td>
						<input type="text" class="form-control" name="ss_percent">
						</td>
						
					</tr>

						<tr>
									<td>XII Standard</td>
												
												<td>
													<input type="text" class="form-control" name="hs_board">
												</td>
												<td>
													<input type="text" class="form-control" name="hs_specialization">
												</td>
												<td>
													<input type="text" class="form-control" name="hs_year">
												</td>
												<td>
													<input type="text" class="form-control" name="hs_percent">
												</td>
												
											</tr>

											

											<tr>
												<td>Graduation</td>
												
												<td>
													<input type="text" class="form-control" name="g_university">
												</td>
												<td>
													<input type="text" class="form-control" name="g_specialization">
												</td>
												<td>
													<input type="text" class="form-control" name="g_year">
												</td>
												<td>
													<input type="text" class="form-control" name="g_percent">
												</td>
												
											</tr>

											<tr>
												<td>Any Other (specify)</td>
												
												<td>
													<input type="text" class="form-control" name="other_university">
												</td>
												<td>
													<input type="text" class="form-control" name="other_specialization">
												</td>
												<td>
													<input type="text" class="form-control" name="other_year">
												</td>
												
												<td>
													<input type="text" class="form-control" name="other_percent">
												</td>
											</tr>
										</tbody>		
			</table>
		</div>
	</div>
			<div class="row" id="management_exam_name">
				<div class="col-md-12">
					<h3>Examination Appeared</h3>
				
					<table class="table">
					<tr>
						<th>Examination Name</th>
						<th>Score</th>
						<th>Percentile</th>
						<th>Month-Year</th>
					</tr>
					<tr>
											<td>CMAT</td>
											<td>
												<input type="text" class="form-control" name="cmat_score">
											</td>
											<td>
												<input type="text" class="form-control" name="cmat_percent">
											</td>
											<td>
												<input type="text" class="form-control" name="cmat_year">
											</td>
										</tr>
				<tr>
											<td>MAT</td>
											<td>
												<input type="text" class="form-control" name="mat_score">
											</td>
											<td>
												<input type="text" class="form-control" name="mat_percent">
											</td>
											<td>
												<input type="text" class="form-control" name="mat_year">
											</td>
										</tr>

										<tr>
											<td>CAT</td>
											<td>
												<input type="text" class="form-control" name="cat_score">
											</td>
											<td>
												<input type="text" class="form-control" name="cat_percent">
											</td>
											<td>
												<input type="text" class="form-control" name="cat_year">
											</td>
										</tr>						
	<tr>
											<td>ATMA</td>
											<td>
												<input type="text" class="form-control" name="atma_score">
											</td>
											<td>
												<input type="text" class="form-control" name="atma_percent">
											</td>
											<td>
												<input type="text" class="form-control" name="atma_year">
											</td>
										</tr>

										<tr>
											<td>XAT</td>
											<td>
												<input type="text" class="form-control" name="xat_score">
											</td>
											<td>
												<input type="text" class="form-control" name="xat_percent">
											</td>
											<td>
												<input type="text" class="form-control" name="xat_year">
											</td>
										</tr>

										<tr>
											<td>MH-CET</td>
											<td>
												<input type="text" class="form-control" name="mhcet_score">
											</td>
											<td>
												<input type="text" class="form-control" name="mhcet_percent">
											</td>
											<td>
												<input type="text" class="form-control" name="mhcet_year">
											</td>
										</tr>
										<tr>
											<td>OTHER</td>
											<td>
												<input type="text" class="form-control" name="other_score">
											</td>
											<td>
												<input type="text" class="form-control" name="other_percent">
											</td>
											<td>
												<input type="text" class="form-control" name="other_year">
											</td>
										</tr>
					</table>
					<P>If you do not have any entrance examination score, then you can participate in the College Entrance Exam.</P>
				</div>
		
			</div>
			<div class="row" id="management_program_name">
				<div class="col-md-12">
					<h3>Management Program</h3>
					<table class="table">
						<tr>
							<td>
								<input type="checkbox" name="management_program[]" id="management_program" value="pgdm" >&nbspPGDM
							</td>
							<td>
								<input type="checkbox" name="management_program[]" id="management_program" value="mba" >&nbspMBA
							</td>
							<td>
								<input type="checkbox" name="management_program[]" id="management_program" value="pgdm+mba" >&nbspPGDM+MBA
							</td>
							<td>
								<input type="checkbox" name="management_program[]" id="management_program" value="other" >&nbspOthers
							</td>
						</tr>

					</table>
				</div>
			</div>
<div class="row" id="engineering_exam_appeared" style="display: none;">
	<div class="col-md-12">
		<table class="table">
		<tr>
			<th>Examination Name</th>
			<th>Score</th>
		</tr>
		<tr>
			<td>
				<input type="text" name="eng_exam_name" id="eng_exam_name" class="form-control">			
			</td>
			<td>
				<input type="text" name="eng_exam_score" id="eng_exam_score" class="form-control">			
			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		</table>
	</div>
	
</div>
			<div class="row">
				<div class="col-md-3">
					
				</div>
				<div class="col-md-3">
					
				</div>
				<div class="col-md-3">
					
				</div>
				<div class="col-md-3">
				<a href="#" class="btn btn-outline-primary" id="mback2">Go Back</a>&nbsp&nbsp
				<a href="#" class="btn btn-outline-primary" id="mnext2">Next Page</a>
				</div>
			</div>
			</div>
		</div>
	</div>	
<!----------------Management-page-2-end---------------------------------------------->	


<!-----------------Management-page-3-start------------------------------------------>
<div id="mpage3">
<div class="row">
	<h3>Additional Information</h3>
</div>	

<div class="row">
	<div class="col-md-12">
		<p class="lead">Select any 3 preffered location.</p>
	</div>	
	<?php
		$res=mysqli_query($conn,"select distinct location from college");    
	?> 
	<div class="col-md-4">
		<select class="form-control" name="location1" id="location1" onchange="getLocation1(this.value)">	
			<option value="1" >Location 1</option>
			<?php while($row=mysqli_fetch_assoc($res)){	?>
			<option value="<?php echo $row['location'];?>"><?php echo $row['location'] ?></option>
			<?php }	?>
		</select>	
	</div>
	<?php
		$res=mysqli_query($conn,"select distinct location from college");    
	?> 
	<div class="col-md-4">
		<select class="form-control" name="location2" id="location2" onchange="getLocation2(this.value)">	
			<option value="1" >Location 2</option>
			<?php while($row=mysqli_fetch_assoc($res)){	?>
			<option value="<?php echo $row['location'];?>"><?php echo $row['location'] ?></option>
			<?php }	?>
		</select>	
	</div>
	<?php
		$res=mysqli_query($conn,"select distinct location from college");    
	?> 
	<div class="col-md-4">
		<select class="form-control" name="location3" id="location3" onchange="getLocation3(this.value)">	
			<option value="1" >Location 3</option>
			<?php while($row=mysqli_fetch_assoc($res)){	?>
			<option value="<?php echo $row['location'];?>"><?php echo $row['location'] ?></option>
			<?php }	?>
		</select>	
	</div>
	
</div>
<div class="row mt-3">
	<div class="col-md-12">
		<p>
			Select any 5 Colleges on the basis of your selected preffered location.
		</p>
	</div>
	<div class="col-md-4" id="collegeList1">
	</div>
	<div class="col-md-4" id="collegeList2">
	</div>
	<div class="col-md-4" id="collegeList3">
	</div>	
	
</div>
<div class="row mt-3">
	<h3>Declaration by Applicant</h3>
</div>
<div class="row">
<div class="col-md-12">
	<input type="checkbox" name="terms" id="terms">All the money transactions (A duration/cancellation) would be solely between college administration & the students. Success Venue is not responsible for any kind of disputes from citizen side.
</div>	
</div>
<div class="row mt-3">
<div class="col-md-12">
<p class="text-font font-weight-bold">I declare that all information in my application is complete, factually correct, and honestly presented. I have read the rules and regulations mentioned in the prospectus and will adhere to the same.</p>
</div>	
</div>
<div class="row">
<div class="col-md-4">
	<input type="text" placeholder="Full Name" class="form-control" name="applicant_name" id="fullname">
</div>
<div class="col-md-4">
	<input type="text" placeholder="Place" class="form-control" name="current_place" id="current_place">
</div>	
<div class="col-md-4">
	<input type="text" placeholder="Date|DD-MM-YYYY" class="form-control" name="declaration_date" id="declaration_date">
</div>	
	
</div>
<div class="row mt-3">
<div class="col-md-6">
<div class=" ">
	<p class="lead">Applicant Photo</p>
	<input type="file" name="upload_applicant_profile" id="applicant_profile" class="form-control" >	
</div>
</div>
<div class="col-md-6">
	<p class="lead">Attach soft copy of mark sheet & Score Card</p>
	<input type="file" name="documents[]" id="documents" class="form-control" multiple="multiple">
</div>	
</div>
<div class="row mt-3">
<div class="col-md-3">
	
</div>	
<div class="col-md-3">
	
</div>	
<div class="col-md-3">
	
</div>	
<div class="col-md-3">
	<a href="#" class="btn btn-outline-primary font-weight-bold" id="mback3">Go Back</a>
	<input type="submit" name="submit_btn" id="submit_btn" value="Sumbit Form" class="btn btn-outline-primary">
</div>	
</div>
</div>
<!-------------------Management-page-3-end------------------------------------------>				
	</div>
	</div>
</div>
<!----------------Management-Div-end------------------------------------------------>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	
	<?php
}
else
{
	
	setcookie('error','Please login!..',time()+2);
	header("location:index.php");
}
?>

<!-------jquery scripts----->

<!----progress-bar-jquery--->

 <script type="text/javascript">
 $(this).ready(function(){
 
 $("#progressbar").hide();

 $("#engineering_radio_btn").change(function(){
 	$("#program_intrested").hide();
 	$("#management").show();
 	$("#progressbar").show();
 	$("#mpage1").show();
 	$("#engineering_exam_appeared").show();
 	$("#management_exam_name").hide();
 	$("#management_program_name").hide();
 	$("#mpage2").hide();
 	$("#mpage3").hide();
 });

 $("#graduation_radio_btn").change(function(){
 	$("#program_intrested").hide();
 	$("#management").show();
 	$("#progressbar").show();
 	$("#mpage1").show();
 	$("#engineering_exam_appeared").hide();
 	$("#management_exam_name").hide();
 	$("#management_program_name").hide();
 	$("#mpage2").hide();
 	$("#mpage3").hide();
 });

 $("#management_radio_btn").change(function(){
 	$("#program_intrested").hide();
 	$("#management").show();
 	$("#progressbar").show();
 	$("#mpage1").show();
 	$("#management_exam_name").show();
 	$("#management_program_name").show();
 	$("#engineering_exam_appeared").hide();
 	$("#mpage2").hide();
 	$("#mpage3").hide();
 });

  $("#mnext1").click(function()
 {
 	$("#mpage1").hide();
 	$("#mpage2").show();
 	$("#mpage3").hide();
 	$("#progressbar_main").css("width","60%");
 	$("#progresstext").html("Step-2");

 });

  $("#mnext2").click(function()
 {
 	$("#mpage1").hide();
 	$("#mpage2").hide();
 	$("#mpage3").show();
 	$("#progressbar_main").css("width","100%");
 	$("#progresstext").html("Step-3");

 });

 $("#mback2").click(function(){

	$("#mpage1").show();
 	$("#mpage2").hide();
 	$("#mpage3").hide();
 	$("#progressbar_main").css("width","20%");
 	$("#progresstext").html("Step-1");
 });

$("#mback3").click(function(){

	$("#mpage1").hide();
 	$("#mpage3").hide();
 	$("#mpage2").show();
 	$("#progressbar_main").css("width","60%");
 	$("#progresstext").html("Step-2");
 });
}) ;

 function getLocation1(l1)
 {
 	var obj1;
 	if(window.XMLHttpRequest)
 	{
 		obj1=new XMLHttpRequest();
 	}
 	else
 	{
 		obj1=new AxtiveXObject("Microsoft.XMLHTTP");
 	}
 	 obj1.onreadystatechange=function()
            {
                if(obj1.readyState==4 && obj1.status==200)
                {
                    document.getElementById("collegeList1").innerHTML=
                    obj1.responseText;
                }
            }
 	 obj1.open("GET","college.php?key="+l1,true);
     obj1.send();
 }

 function getLocation2(l2)
 {
 	var obj2;
 	if(window.XMLHttpRequest)
 	{
 		obj2=new XMLHttpRequest();
 	}
 	else
 	{
 		obj2=new AxtiveXObject("Microsoft.XMLHTTP");
 	}
 	 obj2.onreadystatechange=function()
            {
                if(obj2.readyState==4 && obj2.status==200)
                {
                    document.getElementById("collegeList2").innerHTML=obj2.responseText;
                }
            }
 	 obj2.open("GET","college.php?key="+l2,true);
     obj2.send();
 }

 function getLocation3(l3)
 {
 	var obj3;
 	if(window.XMLHttpRequest)
 	{
 		obj3=new XMLHttpRequest();
 	}
 	else
 	{
 		obj3=new AxtiveXObject("Microsoft.XMLHTTP")
 	}
 	 obj3.onreadystatechange=function()
            {
                if(obj3.readyState==4 && obj3.status==200)
                {
                    document.getElementById("collegeList3").innerHTML=obj3.responseText;
                }
            }
 	 obj3.open("GET","college.php?key="+l3,true);
     obj3.send();
 }

var validating = false; //<-- IMPORTANT
var letters= /^[A-Za-z]+$/;	
function blankField(enteredValue)
{
	
  //for blankspace
  if(enteredValue.value=='')
  {
  	if(validating==false)
  	{
  		validating=true;
    	alert("Field Required");
    	setTimeout(function()
   		 {
      		document.getElementById(enteredValue.id).focus();
    	 }, 3);
    }
  } 
 }

 function validCharacter(enteredValue)
 {
 	  	//for text only
  if(!enteredValue.value.match(letters))
  {
  	if(validating==false)
  	{
  		validating=true;
    	alert("Enter valid information");
    	setTimeout(function()
   		 {
      		document.getElementById(enteredValue.id).focus();
    	 }, 3);
    }
  }
 }


</script> 
<?php
include("footer.php");
?>
