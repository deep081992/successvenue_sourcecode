<?php
session_start();
if(isset($_SESSION['logintrue']))
{
	include("../connect.php");
	
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
INNER JOIN student_academics ON student_academics.student_id=student_additional_information.studentid");
	
	//$row=mysqli_fetch_assoc($result);
	//echo mysqli_error($conn);
	//print_r($row);
	include("admin_header.php");
?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome Admin , Love to see you back. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />

                <div class="row" >
                   
                    <div class="col-md-12 col-sm-12 col-xs-12">
 					<div class="card">
 						<div class="card-header bg-primary">
 							<p>List of students who submitted Common Application Form</p>
 						</div>
 						<div class="card-body">
 							<table class="table">
 								<thead>
 								<tr>

 									<th>Name of Applicant</th>
 									<th>Applied program</th>
 									<th>Select Applied program</th>
 									
 									
 								</tr>
 								</thead>

 								<?php

 								if(mysqli_num_rows($result)>0)
 								{
 									while($row=mysqli_fetch_assoc($result))
 									{
 										
 									?>

 										<tbody>
 											<tr>
 											<td><?php echo $row['firstname']?></td>
 											<td><?php echo $row['intrested_program']?></td>
 											<td>
 												<input class="font-weight-bold" type="radio" name="applied_program" value="<?php echo $row['studentid']?>"
 												 id="mgt" onclick="openmgtform(this.value)">Management
 												 <input class="font-weight-bold"type="radio" name="applied_program" value="<?php echo $row['studentid']?>"
 												 id="eng" onclick="openengform(this.value)">Engineering
 												 <input class="font-weight-bold" type="radio" name="applied_program" value="<?php echo $row['studentid']?>"
 												 id="grad" onclick="opengradform(this.value)">Graduation
 											</td>
 											
 											</tr>
 										</tbody>
 									<?php
 									}
 								}	
 								?>
 								
 							</table>
 						</div>
 					</div>
                    
                    </div>
                </div>
               
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
        <script>
        	function openmgtform(e)
        	{
				document.location="mgtapplicationform.php?selectedstudentvalue="+e;
        	}
        	function openengform(e)
        	{
        		document.location="engapplicationform.php?selectedstudentvalue="+e;
        	}
        	function opengradform(e)
        	{
        		document.location="gradapplicationform.php?selectedstudentvalue="+e;
        	}
        </script>

<?php
}
else
{
	echo "Invalid Resource";
}
?>