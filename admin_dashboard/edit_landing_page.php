<?php
session_start();
if(isset($_REQUEST['key']))
{
		$key=$_REQUEST['key'];
		include("admin_header.php");
		include("../connect.php");
		$res=mysqli_query($conn,"select * from landing_page where landing_pageid='$key'");
		$row=mysqli_fetch_assoc($res);
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
               
                    <div class="panel panel-default bg-warning">
                        <div class="panel-heading font-weight-bold ">
                          
                        </div>
                        <div class="panel-body">
                            <div class="container">
	<div class="row">
		<div class="col-xs-10 col-sm-10 col-md-10">

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
				"assets/img/landing_page_banner/$newname");
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

	$createevent=mysqli_query($conn,"update landing_page set event_name='$eventname',description='$eventdesc',image='$newname' where landing_pageid='$key'");

	echo mysqli_error($conn);
	if(mysqli_affected_rows($conn)==1)
	{
		echo "<p class='alert alert-success'>Event Updated Successfully</p>";
	}
	else
	{
		echo "<p class='alert alert-success'>Unable to update Event please try again! Thankyou</p>";
	}
}

?>                               					
  
			<form method="post" action="" enctype="multipart/form-data">
           <div class="form-group">
            <input type="text" placeholder="Event Name" name="eventname" id="eventname" class="form-control" value="<?php echo $row['event_name']?>">
            <h5 id="checkeventname" class="text-danger"></h5>
            </div>

            <div class="form-group">
            <textarea name="event_detail" id="event_detail" class="form-control" value="<?php echo $row['description']?>">
            	<?php echo $row['description']?>
            </textarea>
           
             </div>                 

             <div class="form-group">
             	<img src="assets/img/landing_page_banner/<?php echo $row['image']?>" height="280" width="400">
             </div>  							
            <div class="form-group">
            <input type="file" name="eventbanner" id="eventbanner" class="form-control">
            <h5 id="checkeventbanner" class="text-danger"></h5>
             </div>

             <div class="form-group">                   								
         	<input type="submit" name="submiteventdata" id="submiteventdata" value="Update Event" class="btn bg-tomato font-white">
         	<a class="btn btn-primary text-white" href="viewevent.php">Back</a>
             </div>                   							
        </form>
		</div>
	</div>
</div>
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
     



		<?php
}
else
{
	echo "No permission to visit this page";
}
?>
