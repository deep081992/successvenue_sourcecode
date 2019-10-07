<?php 
include("header.php");
include("connect.php");
$res=mysqli_query($conn,"select * from college");
?>
<div class="container mt-5">
			<div class="row">
				<button type="button" class="btn-warning btn-sm font-weight-bold" onclick="addCollege()">Add College</button>
				<div class="col-md-15">
					<table class="table ">
						<tr class="bg-secondary">
							<th>College ID</th>
							<th>College Name</th>
							<th>Location of College</th>
							<th>Course Name</th>
							<th>Course Details</th>
							<th>Examination Accepted</th>
							<th>Course Fee</th>
							<th>College Logo</th>
							<th>Operation</th>
						</tr>
						<?php
							if(mysqli_num_rows($res)>0)
							{
								while($row=mysqli_fetch_assoc($res))
								{
									?>
										<tr>
										<td><?php echo $row['collegeid']?></td>
										<td><?php echo $row['college_name']?></td>
										<td><?php echo $row['location']?></td>
										<td><?php echo $row['course_name']?></td>
										<td><?php echo $row['course_detail']?></td>
										<td><?php echo $row['examination_accepted']?></td>
										<td><?php echo $row['course_fee']?></td>
										<td><img src="<?php echo $row['college_logo']?>"></td>
										<td>
											<a class="btn-link bg-primary p-1 text-light" href="edit_collegeInfo.php?key=<?php echo $row['collegeid']?>"><i class="fas fa-edit"></i></a>
											<a class="btn-link bg-danger text-light p-1" href="javascript:void(0)" onclick="deleteCollege(<?php echo $row['collegeid']?>)"><i class="fas fa-trash-alt"></i></a>
										</td>
										</tr>
									<?php
								}
							}
						?>
						
					</table>
				</div>
			</div>
		</div>
		<script>
			function deleteCollege(id)
			{
				var c=confirm("Do You want to delete?");
				if(c==true)
				{
					window.location="delete_college_data.php?key="+id
				}
			}
			function addCollege()
			{
				window.location="add_college.php";
			}
		</script>
<?php
include("footer.php");
?>