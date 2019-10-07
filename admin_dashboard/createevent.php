<?php
session_start();
if(isset($_SESSION['logintrue']))
{
	include("../connect.php");
	include("externalheaderfiles.php");
	$res=mysqli_query($conn,"select * from landing_page");
	//print_r($res);
}
?>

<br><br>
<div class="container">
	<div class="row " >
		<div class="col-xs-12 col-sm-12 col-md-12 ">
			<div class="form-group bg-mistyrose" style="border-left:5px solid tomato;">
				<p class="font-bold-medium">Create Your Events here!..</p>
			</div>
		</div>
	</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 text-white p-5">
<?php
if(isset($_POST['submiteventdata']))
{
	if(is_uploaded_file($_FILES['eventbanner']['tmp_name']))
		{
			
			$fname=$_FILES['eventbanner']['name'];
			$newname=time()."_".$fname;
			$ftype=$_FILES['eventbanner']['type'];
			$ftname=$_FILES['eventbanner']['tmp_name'];
			$fsize=$_FILES['eventbanner']['size'];

			//upload only jpeg,jpg,png image types

			$image_types=array("image/jpeg","image/jpg","image/png");
			if(in_array($ftype,$image_types))
			{
			$status_images=move_uploaded_file($ftname,
				"../other/assets/img/landing_page_banner/$newname");
			}
			else
			{
				echo "file not found";
			}
		}
		$eventname=(isset($_POST['eventname']))?($_POST['eventname']):"";
	$eventdesc=(isset($_POST['event_detail']))?($_POST['event_detail']):"";
	date_default_timezone_set("Asia/Calcutta");
	$date=date("Y-m-d h:i:s");
	$token=md5(str_shuffle($eventname.$date));

	$createevent=mysqli_query($conn,"insert into landing_page(event_name,description,	image,date,token) values('$eventname','$eventdesc','$newname','$date','$token')");
	$row=mysqli_fetch_assoc($createevent);
	//print_r($row);

	//echo mysqli_error($conn);
	if(mysqli_affected_rows($conn)==1)
	{
		$_SESSION['activetrue']=$row['token'];
		echo "<p class='alert alert-success'>Event Created Successfully</p>";
		header("location:landing_page.php");
	}
	else
	{
		echo "<p class='alert alert-success'>Unable to create Event please try again! Thankyou</p>";
	}
}
?>                               					
  
        <form method="post" action="" enctype="multipart/form-data" class="mt-5">
           <div class="form-group">
            <input type="text" placeholder="Event Name" name="eventname" id="eventname" class="form-control">
            <h5 id="checkeventname" class="text-danger"></h5>
            </div>

            <div class="form-group">
            <textarea name="event_detail" id="event_detail" class="form-control"></textarea>
            <h5 id="checkeventdesc" class="text-danger"></h5>
             </div>                   							
            <div class="form-group">
            <input type="file" name="eventbanner" id="eventbanner" class="form-control">
            <h5 id="checkeventbanner" class="text-danger"></h5>
             </div>

             <div class="form-group">                   								
         	<input type="submit" name="submiteventdata" id="submiteventdata" value="Create Event" class="btn bg-tomato font-bold">
         	
             </div>                   							
        </form>
                                					
                                				</div>
                                			</div>
                                		</div>
                                	</div>
                             
   
<script>
	$(document).ready(function(){
		var name=true;
		var desc=true;
		var banner=true;

		$("#eventname").keyup(function() {
			check_eventname();
		});

		$("#backbtn").click(function(){
			//alert("hello");
			//document.location="landing_page.php";
		});

		function check_eventname()
		{
			var entered_eventname=$("#eventname").val();
			if(entered_eventname.length=='')
			{
				$("#checkeventname").show();
				$("#checkeventname").html("**Please enter Event Name");
				$("#checkeventname").focus();
				$("#checkeventname").css('color','red');
				name=false;
				return false;
			}
			else
			{
				$("#checkeventname").hide();
			}
		}

		/*$("#submiteventdata").click(function(){
			name=true;
		 	check_eventname();
			if((name==true))
			{
				return true;
			}
			else
			{
				return false;
			}
		});*/
	});
</script>                            