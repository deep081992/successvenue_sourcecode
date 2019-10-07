<?php
session_start();
if(isset($_SESSION['logintrue']) AND ($_SESSION['loginid']))
{
	include("header.php");
	$token=$_SESSION['logintrue'];
	$studentid=$_SESSION['loginid'];
	
	$res=mysqli_query($conn,"select * from college");
	$search_location_radio=mysqli_query($conn,"select distinct location from college ");
	$res1=mysqli_query($conn,"select * from student_personal_data where 
	studentid='$studentid'");
	$row=mysqli_fetch_assoc($res1);
	//mysqli_error($conn);
	//print_r($row);
	
?>
<div class="container mt-5" id="colleges">
	<div class="row">
		<div class="col-md-9 col-sm-9 col-lg-9" id="management">
		<?php 
			if(mysqli_num_rows($res)>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
		?>
				 	<div class="container mt-3 p-4" style="border:1px solid grey;border-top:6px solid darkslategray;">
					<div class="row">
					<div class="col-md-4 text-center p-3">
						<img src="img/aims-logo.png" width="80%" height="100%">
					</div>
					<div class="col-md-8 p-2">
						<div class="mt-1">
						<span style="font-family:Times New Roman;  color:darkslategray; font-size: 28px;font-weight: bold">
							<strong><?php echo $row['college_name']?></strong>
						</span>
						</div>
					<div>
					<span>
					<span style="font-family: Calibri;  color: darkgray; font-size: 20px;">
						<strong>
							Course Name:
						</strong>
					</span>
					<span style="font-family: Calibri;  color: darkgray; font-size: 18px;">
						<?php echo $row['course_name']?>
					</span>
					</span>
					</div>
					<div>
						<span>
							<span style="font-family: Calibri;  color: darkgray; font-size: 20px;">
								<strong>
							Course Details:
								</strong>
							</span>
						<span style="font-family: Calibri;  color: darkgray; font-size: 18px;">
							<?php echo $row['course_detail']?>
						</span>
						</span>
					</div>
					<div>
						<span>
							<span style="font-family: Calibri;  color: darkgray; font-size: 20px;">
								<strong>
							Examination Accepted:
								</strong>
						</span>
						<span style="font-family: Calibri;  color: darkgray; font-size: 18px;">
						<?php echo $row['examination_accepted']?>
						</span>
						</span>
					</div>
					<div>
						<span>
							<span style="font-family: Calibri;  color: darkgray; font-size: 20px;">
								<strong>
							Course Fee:
								</strong>
						</span>
						<span style="font-family: Calibri;  color: darkgray; font-size: 18px;">
						<?php echo $row['course_fee']?>
						</span>
						</span>
					</div>
					<div>
					<span>
					<span style="font-family: Calibri;  color: darkgray; font-size: 20px;">
						<strong>
							City:
						</strong>
					</span>
					<span style="font-family: Calibri;  color: darkgray; font-size: 18px;">
						<?php echo $row['location']?>
					</span>
					</span>
					</div>
					<br>
					
				</div>
			
		</div>
		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-8 text-left">
				<a class="btn-link btn-dark text-light btn-lg" href="visitorquery.php?key=<?php echo $row['collegeid']?>" >Send Query</a>
				<a  class="btn-link btn-danger text-light btn-lg">Apply Now</a>
			</div>
		</div>
		</div>



				<?php
				}
			}
		?>
</div>
<div class="col-md-3 mt-3">
	<?php 
		if(mysqli_num_rows($search_location_radio)>0)
		{
			?>

			<form>
		<table class="table">
			<th class="bg-dark text-light">Search by Location</th>
			
			<?php while($row1=mysqli_fetch_assoc($search_location_radio)){?>
				
			<tr>
			<td>
				<input type="radio" name="search_location" id="search_location" 
				value="<?php echo $row1['location']?>"onclick="displayCollegesByLocation(this.value)" >
				<?php 
				echo $row1['location'];?>
			</td>
			</tr>
		<?php }?>
		</table>

	</form>

			<?php
		}
	?>
	
</div>
</div>

</div>
<div class="container" id="display_bylocation">
	
</div>

<script>
function displayCollegesByLocation(v)
{

	document.getElementById("colleges").style.display = "none";

	var object;
	if(window.XMLHttpRequest)
	{
		object=new XMLHttpRequest();
	}
	else
	{
		object=new AxtiveXObject("Microsoft.XMLHTTP");
	}

	object.onreadystatechange=function()
	{
		if(object.readyState==4 && object.status==200)
		{
			document.getElementById("display_bylocation").innerHTML=object.responseText;
		}
	}

	object.open("GET","display_college.php?location="+v,true);
	object.send();
}
</script>
<?php
include("footer.php");
?>
<?php	
}
else
{
	include("header.php");
	$res=mysqli_query($conn,"select * from college");
	$search_location_radio=mysqli_query($conn,"select distinct location from college ");
	//print_r($search_location_radio);
	//print_r($res);
	mysqli_error($conn);
?>
<div class="container mt-5" id="colleges">
	<div class="row">
		<div class="col-md-9" id="management">
		<?php 
			if(mysqli_num_rows($res)>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
		?>
				 	<div class="container mt-3 p-4" style="border:1px solid grey;border-top:6px solid darkslategray;">
					<div class="row">
					<div class="col-md-4 text-center p-3">
						<img src="img/aims-logo.png" width="80%" height="100%">
					</div>
					<div class="col-md-8 p-2">
						<div class="mt-1">
						<span style="font-family:Times New Roman;  color:darkslategray; font-size: 28px;font-weight: bold">
							<strong><?php echo $row['college_name']?></strong>
						</span>
						</div>
					<div>
					<span>
					<span style="font-family: Calibri;  color: darkgray; font-size: 20px;">
						<strong>
							Course Name:
						</strong>
					</span>
					<span style="font-family: Calibri;  color: darkgray; font-size: 18px;">
						<?php echo $row['course_name']?>
					</span>
					</span>
					</div>
					<div>
						<span>
							<span style="font-family: Calibri;  color: darkgray; font-size: 20px;">
								<strong>
							Course Details:
								</strong>
							</span>
						<span style="font-family: Calibri;  color: darkgray; font-size: 18px;">
							<?php echo $row['course_detail']?>
						</span>
						</span>
					</div>
					<div>
						<span>
							<span style="font-family: Calibri;  color: darkgray; font-size: 20px;">
								<strong>
							Examination Accepted:
								</strong>
						</span>
						<span style="font-family: Calibri;  color: darkgray; font-size: 18px;">
						<?php echo $row['examination_accepted']?>
						</span>
						</span>
					</div>
					<div>
						<span>
							<span style="font-family: Calibri;  color: darkgray; font-size: 20px;">
								<strong>
							Course Fee:
								</strong>
						</span>
						<span style="font-family: Calibri;  color: darkgray; font-size: 18px;">
						<?php echo $row['course_fee']?>
						</span>
						</span>
					</div>
					<div>
					<span>
					<span style="font-family: Calibri;  color: darkgray; font-size: 20px;">
						<strong>
							City:
						</strong>
					</span>
					<span style="font-family: Calibri;  color: darkgray; font-size: 18px;">
						<?php echo $row['location']?>
					</span>
					</span>
					</div>
					<br>
					
				</div>
			
		</div>
		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-8 text-left">
				<a class="btn-link btn-dark text-light btn-lg" href="visitorquery.php?key=<?php echo $row['collegeid']?>" >Send Query</a>
				<a  class="btn-link btn-danger text-light btn-lg">Apply Now</a>
			</div>
		</div>
		</div>



				<?php
				}
			}
		?>
</div>
<div class="col-md-3 mt-3">
	<?php 
		if(mysqli_num_rows($search_location_radio)>0)
		{
			?>

			<form>
		<table class="table">
			<th class="bg-dark text-light">Search by Location</th>
			
			<?php while($row1=mysqli_fetch_assoc($search_location_radio)){?>
				
			<tr>
			<td>
				<input type="radio" name="search_location" id="search_location" 
				value="<?php echo $row1['location']?>"onclick="displayCollegesByLocation(this.value)" >
				<?php 
				echo $row1['location'];?>
			</td>
			</tr>
		<?php }?>
		</table>

	</form>

			<?php
		}
	?>
	
</div>
</div>

</div>
<div class="container" id="display_bylocation">
	
</div>

<script>
function displayCollegesByLocation(v)
{

	document.getElementById("colleges").style.display = "none";

	var object;
	if(window.XMLHttpRequest)
	{
		object=new XMLHttpRequest();
	}
	else
	{
		object=new AxtiveXObject("Microsoft.XMLHTTP");
	}

	object.onreadystatechange=function()
	{
		if(object.readyState==4 && object.status==200)
		{
			document.getElementById("display_bylocation").innerHTML=object.responseText;
		}
	}

	object.open("GET","display_college.php?location="+v,true);
	object.send();
}
</script>
<?php
include("footer.php");
}
?>


