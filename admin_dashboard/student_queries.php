<?php 
session_start();
if(isset($_SESSION['logintrue']))
{
  include("../connect.php");
  $res=mysqli_query($conn,"select * from  visitor_query");
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
               
                    <div class="panel panel-default bg-warning">
                        <div class="panel-heading font-weight-bold ">
                           Queries sent by Visitor's
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>contact Number</th>
                                            <th>Concern College</th>
                                            <th>Concern Location</th>
                                            <th>Student Quries</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                      <?php
                        if(mysqli_num_rows($res)>0)
                        {
                          while($row=mysqli_fetch_assoc($res))
                          {
                            
                            ?>
                                    <tbody>
                                       
                                         <tr>
                              <td><?php echo $row['name']?></td>
                              <td><?php echo $row['mobile']?></td>
                              <td><?php echo $row['concern_college']?></td>
                              <td><?php echo $row['location']?></td>
                              <td><?php echo $row['query']?></td>
                              <td>
                                <?php
                                 $id=$row['visitor_id'];
                                 $form_status=$row['followup_status'];
                                  if($form_status=='0')
                                  {
                                    
                                    ?>
                                    <a href="admin_updatequery_status.php?key=<?php echo $row['visitor_id']?>" class="btn btn-warning">Viewed Query</a>
                                    <?php
                                  }   
                                  else
                                  {
                                    ?>
                                      <button class="btn btn-success" disabled="">Done</button>
                                      <?php
                                  }               
                                  ?>
                                
                              </td>
                            </tr>
                               <?php
                          
                        }
                      }
                        ?>
                                    </tbody>
                                </table>
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
    include("admin_footer.php");

}
 ?>
