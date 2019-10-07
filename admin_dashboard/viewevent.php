 <?php
session_start();
if(isset($_SESSION['logintrue']))
{
   include("externalheaderfiles.php");
   include("../connect.php");
   $res=mysqli_query($conn,"select * from landing_page");
   //print_r($res);
?>
<br><br><br>
 <section id="view">
<div class="container">
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 font-white" >

         <p><span class="bg-tomato">Important Note:</span>Admin! Please make sure that only one event can be ACTIVE at a time</p>
         <small class="bg-primary">Otherwise you will get error</small>
      </div>
   </div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 font-white">
   <table class="table">
   	<tr>
   		<th>Event Name</th>
   		<th>Created Date</th>
   		<th>Status</th>
   		<th>Operation</th>
   	</tr>
   	<?php
   	if(mysqli_num_rows($res)>0)
   	{
   		while($row=mysqli_fetch_assoc($res))
   		{
   			?>
   			<tr>
   				<td><?php echo $row['event_name']?></td>
   				
   				<td><?php echo $row['date']?></td>
   				
               <td>
                                <?php
                                 
                                 $form_status=$row['status'];
                                  if($form_status=='inactive')
                                  {
                                    
                                    ?>
                                    
                                    

                                     <button id="inactivebtn" class="btn bg-tomato" 
                                     onclick="updateStatus_active(<?php echo 
                                       $row['landing_pageid']?>)"><?php echo $row['status']?></button>
                                    <?php
                                  }   
                                  else
                                  {
                                    ?>
                                      
                                     
                                      <button id="activebtn" class="btn bg-mistyrose" onclick="updateStatus_inactive(<?php echo $row['landing_pageid']?>)"><?php echo $row['status']?>
                                         </button>
                                      <?php
                                  }               
                                  ?>
                                
                              </td>
   				<td>
                  <a href="edit_landing_page.php?key=<?php echo $row['landing_pageid']?>" class="btn bg-mediumspringgreen font-white">Edit</a>

                  <a href="javascript:void(0)" onclick="deleteRecord(<?php echo $row['landing_pageid']?>)" class="btn bg-aquamarine">Delete</a>
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
</section>
<script>
   function deleteRecord(id)
   {
           
            var c=confirm("Do You want to delete?");
            if(c==true)
            {
                window.location="delete_event.php?key="+id
            }
   }
  function updateStatus_inactive(id)
  {
  
   window.location="updatestatus_landingpage_inactive.php?key="+id;
  }
  function updateStatus_active(id)
  {
  
   window.location="updatestatus_landingpage_inactive.php?key="+id;
  }

</script>
<?php
}
include("externalfooterfile.php");
?>
                            