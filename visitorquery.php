<?php
if(isset($_REQUEST['key']))
{
	include("connect.php");
	$key=$_REQUEST['key'];
	$college=mysqli_query($conn,"select * from college where collegeid='$key'");
	$row=mysqli_fetch_assoc($college);
	include("header.php");
	
	?>
		<div class="container mt-5">
			<div class="row">
				<?php
					if(isset($_POST['sendquery']))
					{
						$name=(isset($_POST['name']))?($_POST['name']):"";
						$mobile=(isset($_POST['mobile']))?$_POST['mobile']:"";
						$concern_college=(isset($_POST['concerncollege']))?$_POST['concerncollege']:"";
						$concern_location=(isset($_POST['location']))?$_POST['location']:"";
            			$query=(isset($_POST['query']))?$_POST['query']:"";

            			$result=mysqli_query($conn,"insert into  visitor_query(name,mobile,concern_college,location,query) values('$name','$mobile','$concern_college','$concern_location','$query')");

            			if(mysqli_affected_rows($conn)==1)
            				 {
              				  echo "<p class='alert alert-success'>Query sent Successfully!</p>";
         				    }
           				  else
           					  {
           					     echo "<p class='alert alert-danger'>Sorry! Unable to send your query try again</p>";
           					  }
					}
					
				?>
				<div class="col-md-12">
					<div class="card">
						<div class="card-title bg-dark text-light">
							<h4>Drop your queries here!</h4>
						</div>
						<form method="post" action="">
						<div class="card-body">
							<div class="form-group">
                       		 <input type="text" name="name"  id="visitorname" class="form-control" placeholder="Your Name">
                    		</div>
                    		<div class="form-group">
                       		 <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Your Contact Number">
                    		</div>
                    		<div class="form-group">
                       		 <input type="text" name="concerncollege" id="concerncollege" class="form-control" value="<?php echo $row['college_name']?>">
                    		</div>
                    		<div class="form-group">
                       		 <input type="text" name="location" id="location" class="form-control" value="<?php echo $row['location']?>">
                    		</div>
                   			 <div class="form-group">
                     		   <textarea rows="4" class="form-control" name="query" placeholder="Description"></textarea>
                   			 </div>
                   			 <div class="form-group">
                   			 	<a href="#" class="btn btn-dark" data-dismiss="modal">Close</a>
                   			 <input type="submit" value="Send Query" name="sendquery" class="btn btn-primary">
                  			  </div>
                    		
               			 </div>
               			 </form>
						<div class="card-footer bg-dark text-light">
							<h4>Thankyou! Will get back to you soon</h4>	
                   		</div>
						
					</div>
				</div>
				
			</div>
		</div>

	<?php
}
else
{
	echo "Invalid Resource";
}
?>