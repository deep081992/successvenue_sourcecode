<?php
session_start();
if(isset($_SESSION['logintrue']))
{
	include("admin_header.php");
	include("../connect.php");
	$res=mysqli_query($conn,"select * from landing_page");
	//print_r($res);
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
<div class="row mb-5">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<button id="createEvent" class="btn bg-aqua font-bold ">Create Event</button>

		<button id="viewEvent" class="btn bg-deepskyblue font-bold">View Event</button>
	</div>
</div>

      <!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->
</div>
<script>
	$(document).ready(function() {
		
		
		$('#createEvent').click(function(){
			window.location="createevent.php";
		});

		$('#viewEvent').click(function(){
			
			window.location="viewevent.php";
		});
	});
</script>
<?php	
}
else
{
	echo "No permission to asscess this page!.";
}

?>
